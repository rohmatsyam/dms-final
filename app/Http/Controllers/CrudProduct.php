<?php

namespace App\Http\Controllers;

use App\Models\SellerProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Lazada\LazopClient;
use Lazada\LazopRequest;

class CrudProduct extends Controller
{    
    protected $url = "https://api.lazada.co.id/rest";        

    public function GetCategoryAttributes(Request $r){        
        $c = new LazopClient($this->url,env('LAZADA_KEY'),env('LAZADA_SECRET'));
        $request = new LazopRequest('/category/attributes/get','GET');
        $request->addApiParam('primary_category_id',$r->categoryattr);
        $request->addApiParam('language_code','id_ID');
        $hasil = $c->execute($request);
        $dataEncode = json_decode($hasil);
        Storage::disk('public')->put('attributes.json', json_encode($dataEncode->data));

        $productName = $r->productName;       
        $categoryId = $r->categoryId; 
        view()->share(['productName'=>$productName,'categoryId'=>$categoryId]);        
        return view('createproduct');        
    }

    public function CreateProduct(Request $r){    
        $payload = $this->makePayload($r->all());        
        $c = new LazopClient($this->url,env('LAZADA_KEY'),env('LAZADA_SECRET'));
        $request = new LazopRequest('/product/create');
        $request->addApiParam('payload', $payload);
        $response = $c->execute($request, $r->accessToken);
        $hasil = json_decode($response);
        
        if($hasil->code == "0"){          
          return view('lazada',['message'=>"Success stored a product"]);
        }else{
          return redirect()->route('lazadahome',['message' => "Can't store product because ".$hasil->message]);
        }        
    }
    protected function makePayload($r){             
      $payloadArray = Array (
        "Request" => Array (
          "Product" => Array(
            "PrimaryCategory" => "{$r['categoryId']}",
            "Images" => Array(
              "Image"=>["https://sg-live-02.slatic.net/p/357ae309dc5ada4b6ce2c55feb37ee06.jpg"]
            ),
            "Attributes" => Array(
              "name" => "{$r['name']}",
              "description" => "{$r['description']}",
              "brand" => "{$r['brand']}",
            ),
            "Skus" => Array(
              "Sku" => [
                Array(
                  "SellerSku" => "{$r['SellerSku']}",
                  "quantity" => "{$r['quantity']}",
                  "price" => "{$r['price']}",
                  "package_height"=> "{$r['package_height']}",
                  "package_length"=> "{$r['package_length']}",
                  "package_width"=> "{$r['package_width']}",
                  "package_weight"=> "{$r['package_weight']}",
                )
              ],
            ),
            "trialProduct" => "true",            
          )
        )
      );
      return json_encode($payloadArray);      
    }    
}