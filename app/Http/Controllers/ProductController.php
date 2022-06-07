<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lazada\LazopClient;
use Lazada\LazopRequest;

class ProductController extends Controller
{    
    protected $url = "https://api.lazada.co.id/rest";
    public function getAllProduct(Request $req){ 
        $req = $req->all();        
        $c = new LazopClient($this->url,env('LAZADA_KEY'), env('LAZADA_SECRET'));
        $request = new LazopRequest('/products/get','GET');
        $response = $c->execute($request,$req['access_token']);
    
        $hasil = json_decode($response);
        if($hasil->code == "0"){
            return view('products',['products'=>$hasil->data->products]);
        }        
    }
    public function deactivateProduct(Request $req){
        $req = $req->all();
        $item_id = intval($req['item_id']);        
        $c = new LazopClient($this->url,env('LAZADA_KEY'), env('LAZADA_SECRET'));
        $request = new LazopRequest('/product/deactivate');
        $request->addApiParam('apiRequestBody','<Request><Product><ItemId>'.$item_id.'</ItemId></Product></Request>');

        $hasil = $c->execute($request, $req['access_token']);
        $hasil = json_decode($hasil);
        if($hasil->data->success){            
            return back()->with("success","Item with id ".$item_id." deactivated successfully!");
        }
    }
}
