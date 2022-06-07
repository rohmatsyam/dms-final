<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lazada\LazopClient;
use Lazada\LazopRequest;

class ProductController extends Controller
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
        return view('product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        if($hasil->code == "0"){
            return view('product',['hasil'=>$hasil->data,'products'=>$products]);
        };
    }
}
