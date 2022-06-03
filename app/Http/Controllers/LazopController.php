<?php

namespace App\Http\Controllers;

use App\Models\SellerLazada;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Lazada\LazopClient;
use Lazada\LazopRequest;

class LazopController extends Controller
{    
    private $lazadaUrl = "https://api.lazada.com.my/rest";
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
        SellerLazada::create([                
            'seller_id' => $hasil->country_user_info[0]->seller_id,
            'user_id' => auth()->user()->id,
            'country' => $hasil->country_user_info[0]->country,
            'access_token' => $hasil->access_token,
            'token_expires_at' => Carbon::now()->addDays(7)->format('Y-m-d'),
            'refresh_token' => $hasil->refresh_token,
            'refresh_expires_at' => Carbon::now()->addDays(30)->format('Y-m-d'),
        ], 200);
        return view('lazada',['access_token' => $hasil->access_token,'message'=>"Success stored access token"]);        
    }    
}
