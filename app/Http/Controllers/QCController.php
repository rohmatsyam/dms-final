<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lazada\LazopClient;
use Lazada\LazopRequest;

class QCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $url = "https://api.lazada.co.id/rest";    
    public function index(Request $request)
    {
        $seller_id = $request->seller_id;
        $products = DB::table('seller_products')->where('seller_id',$seller_id)->get();        
        return view('qc',compact('products'));
    }

    public function getqc(Request $req){
        $c = new LazopClient($this->url,env('LAZADA_KEY'), env('LAZADA_SECRET'));
        $request = new LazopRequest('/product/qc/status/get','GET');
        $request->addApiParam('offset','1');
        $request->addApiParam('limit','100');
        $request->addApiParam('seller_skus',"[\"{$req->seller_skus}\"]");
        $response = $c->execute($request, $req->accessToken);
        $hasil = json_decode($response);
        $seller_id = $req->seller_id;
        $products = DB::table('seller_products')->where('seller_id',$seller_id)->get();
        return view('qc',['hasil'=>$hasil->data,'products'=>$products]);
    }
}
