<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lazada\LazopClient;
use Lazada\LazopRequest;

class ProductController extends Controller
{    
    protected $url = "https://api.lazada.co.id/rest";
    public function getAllProduct(Request $request){ 
        $req = $request->all();        
        $c = new LazopClient($this->url,env('LAZADA_KEY'), env('LAZADA_SECRET'));
        $request = new LazopRequest('/products/get','GET');
        $response = $c->execute($request,$req['access_token']);
    
        $hasil = json_decode($response);
        if($hasil->code == "0"){
            return view('products',['products'=>$hasil->data->products]);
        }
        dd($hasil);
    }
}
