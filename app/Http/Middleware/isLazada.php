<?php

namespace App\Http\Middleware;

use App\Models\SellerLazada;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lazada\LazopClient;
use Lazada\LazopRequest;

class isLazada
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    private $lazadaUrl = "https://api.lazada.com.my/rest";
    private $categoryUrl = "https://api.lazada.co.id/rest";

    public function convertDate($date){
        $dateString = str_replace('-','/',$date);
        $dateExp = strtotime($dateString);
        return date('Y/m/d',$dateExp);
    }
    public function handle(Request $request, Closure $next)
    {
        $user_id = auth()->user()->id;
        $seller = DB::table('seller_lazadas')->where('user_id',$user_id)->first();
        if($seller){
            $token_expires_at = $this->convertDate($seller->token_expires_at);
            $refresh_expires_at = $this->convertDate($seller->refresh_expires_at);
            $now = Carbon::now()->format('Y/m/d');
            if($now < $token_expires_at){
                view()->share(['access_token' => $seller->access_token,'message'=>"Access token is available, valid until ".Carbon::parse($token_expires_at)->diffForHumans()]);
                
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
                    view()->share(['access_token' => $access_token,'message'=>"Success update access token, valid until ".Carbon::parse($token_expires_at)->diffForHumans()]);                    
                } 
            }           
        }else{
            return redirect()->away("https://auth.lazada.com/oauth/authorize?response_type=code&force_auth=true&redirect_uri=".env('LAZADA_REDIRECT_URI')."&client_id=".env('LAZADA_KEY')."&redirect_auth=true");
        }

        if($request->path() == "lazada/home"){
            $c = new LazopClient($this->categoryUrl,env('LAZADA_KEY'),env('LAZADA_SECRET'));
            $req = new LazopRequest('/category/tree/get','GET');
            $req->addApiParam('language_code','id_ID');
            $data = $c->execute($req);
            $category = json_decode($data);            
            view()->share('category',$category->data);
            return $next($request);            
        }
        return $next($request);
    }
}
