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
        $request->addApiParam('filter','all');
        $response = $c->execute($request,$req['access_token']);
        $hasil = json_decode($response);        
        if($hasil->code == "0"){
            if($hasil->data->products){
                return view('products',['products'=>$hasil->data->products]);
            }else{
                return redirect()->route('lazadahome');
            }
        }else{
            dd($hasil);
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
        if($hasil->code == "0"){
            return redirect()->route('producthome')->with("success","Item with id ".$item_id." deactivated successfully!");
        }else{
            return redirect()->route('producthome')->with("error",$hasil->message);            
        }
    }
    public function deleteProduct(Request $req){
        $req = $req->all();
        $item_id = $req['item_id'];        
        $sku_id = $req['sku_id'];        

        $c = new LazopClient($this->url,env('LAZADA_KEY'), env('LAZADA_SECRET'));
        $request = new LazopRequest('/product/remove');             
        $request->addApiParam('seller_sku_list',"[\"SkuId_{$item_id}_{$sku_id}\"]");        
        $hasil = $c->execute($request, $req['access_token']);
        $hasil = json_decode($hasil);
        if($hasil->code == "0"){
            return redirect()->route('producthome')->with("success","Item with id ".$item_id." deleted successfully!");                        
        }else{
            return redirect()->route('producthome')->with("error",$hasil->message);
        }
    }
}
