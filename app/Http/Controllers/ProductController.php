<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lazada\LazopClient;
use Lazada\LazopRequest;
use Throwable;

class ProductController extends Controller
{
    protected $url = "https://api.lazada.co.id/rest";
    public function getAllProduct(Request $req)
    {
        sleep(5);
        $req = $req->all();
        $c = new LazopClient($this->url, env('LAZADA_KEY'), env('LAZADA_SECRET'));
        $request = new LazopRequest('/products/get', 'GET');
        $request->addApiParam('filter', 'all');
        try {
            $response = $c->execute($request, $req['access_token']);
        } catch (Throwable $e) {
            if ($e->getMessage() == "6") {
                return redirect(route('dashboard'))->with('error', "You don't have internet connection");
            }
        }
        $hasil = json_decode($response);
        if ($hasil->code == "0") {
            // dd(empty($hasil->data));
            if (json_encode($hasil->data) == '{}') {
                return view('products', ['products' => 0]);
            } else {
                $products = $hasil->data->products;
                return view('products', compact('products'));
            }
        } else {
            return redirect(route('lazadahome'))->with("error", $hasil->message);
        }
    }
    public function deactivateProduct(Request $req)
    {
        $req = $req->all();
        $item_id = intval($req['item_id']);
        $c = new LazopClient($this->url, env('LAZADA_KEY'), env('LAZADA_SECRET'));
        $request = new LazopRequest('/product/deactivate');
        $request->addApiParam('apiRequestBody', '<Request><Product><ItemId>' . $item_id . '</ItemId></Product></Request>');

        $hasil = $c->execute($request, $req['access_token']);
        $hasil = json_decode($hasil);
        if ($hasil->code == "0") {
            return back()->with("success", "Item with id " . $item_id . " deactivated successfully!");
        } else {
            return back()->with("error", $hasil->message);
        }
    }
    public function deleteProduct(Request $req)
    {
        $req = $req->all();
        $item_id = $req['item_id'];
        $sku_id = $req['sku_id'];

        $c = new LazopClient($this->url, env('LAZADA_KEY'), env('LAZADA_SECRET'));
        $request = new LazopRequest('/product/remove');
        $request->addApiParam('seller_sku_list', "[\"SkuId_{$item_id}_{$sku_id}\"]");
        $hasil = $c->execute($request, $req['access_token']);
        $hasil = json_decode($hasil);
        if ($hasil->code == "0") {
            return back()->with("success", "Item with id " . $item_id . " deleted successfully!");
        } else {
            return back()->with("error", $hasil->message);
        }
    }
}
