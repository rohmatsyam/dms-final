<?php

namespace App\Http\Controllers;

use App\Models\SellerLazada;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Lazada\LazopClient;
use Lazada\LazopRequest;

class LazopController extends Controller
{
    private $lazadaUrl = "https://api.lazada.com.my/rest";
    public function convertDate($date){
        $dateString = str_replace('-','/',$date);
        $dateExp = strtotime($dateString);
        return date('Y/m/d',$dateExp);
    }
    public function lazadaAuth(){
        $user_id = auth()->user()->id;
        $seller = DB::table('seller_lazadas')->where('user_id',$user_id)->first();        
        if(!empty($seller)){            
            $token_expires_at = $this->convertDate($seller->token_expires_at);
            $refresh_expires_at = $this->convertDate($seller->refresh_expires_at);
            $now = Carbon::now()->format('Y/m/d');            
            if($now < $token_expires_at){
                return response()->json([                        
                    'status' => true,
                    'message' => "Access token is available, valid until ".Carbon::parse($token_expires_at)->diffForHumans(),
                    'data' => $seller->access_token
                ],200);                
            }else{
                if($now < $refresh_expires_at){
                    // refresh access token
                    $lazOp = new LazopClient($this->lazadaUrl, env('LAZADA_KEY'), env('LAZADA_SECRET'));
                    $lazRequest = new LazopRequest('/auth/token/refresh');
                    $lazRequest->addApiParam('refresh_token',$seller->refresh_token);
                    $response = $lazOp->execute($lazRequest);
                    $hasil = json_decode($response);                                                
                    $access_token = $hasil->access_token;
                    $token_expires_at = Carbon::now()->addDays(7)->format('Y-m-d');                    
                    $refresh_token = $hasil->refresh_token;                    
                    SellerLazada::where('seller_id',$seller->seller_id)->update([                        
                        'access_token' => $access_token,
                        'token_expires_at' => $token_expires_at,
                        'refresh_token' => $refresh_token,                
                    ]);            
                    return response()->json([                        
                        'status' => true,
                        'message' => "Success update access token, valid until ".Carbon::parse($token_expires_at)->diffForHumans(),
                        'data' => $access_token
                    ],200);                  
                }else{
                    return redirect()->away("https://auth.lazada.com/oauth/authorize?response_type=code&force_auth=true&redirect_uri=".env('LAZADA_REDIRECT_URI')."&client_id=".env('LAZADA_KEY')."&redirect_auth=true");                    
                }
            }
        }else{
            return redirect()->away("https://auth.lazada.com/oauth/authorize?response_type=code&force_auth=true&redirect_uri=".env('LAZADA_REDIRECT_URI')."&client_id=".env('LAZADA_KEY')."&redirect_auth=true");            
        }
    }    
    
    public function callbackAuth(Request $request){        
        $code = $request->code;        
        $lazOp = new LazopClient($this->lazadaUrl, env('LAZADA_KEY'), env('LAZADA_SECRET'));
        $lazRequest = new LazopRequest('/auth/token/create');
        // Request Params
        $lazRequest->addApiParam('code', $code);        
        // Process API 
        $response = $lazOp->execute($lazRequest); // JSON response

        // save token
        $hasil = json_decode($response);        
        $seller_id = $hasil->country_user_info[0]->seller_id;
        $user_id = auth()->user()->id;
        $country = $hasil->country_user_info[0]->country;
        $access_token = $hasil->access_token;
        $token_expires_at = Carbon::now()->addDays(7)->format('Y-m-d');
        $refresh_token = $hasil->refresh_token;
        $refresh_expires_at = Carbon::now()->addDays(30)->format('Y-m-d');
        $seller = SellerLazada::create([                
            'seller_id' => $seller_id,
            'user_id' => $user_id,
            'country' => $country,
            'access_token' => $access_token,
            'token_expires_at' => $token_expires_at,
            'refresh_token' => $refresh_token,
            'refresh_expires_at' => $refresh_expires_at,
        ], 200);        
        return response()->json([                        
            'status' => true,
            'message' => "Success stored access token",
            'data' => $seller
        ],200);
    }
}
