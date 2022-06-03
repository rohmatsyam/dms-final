<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lazada\LazopClient;
use Lazada\LazopRequest;

class CrudProduct extends Controller
{
    // protected $url = "https://api.lazada.co.id/rest";
    protected $url = "https://api.lazada.co.id/rest";
    public function GetCategory(){
        $c = new LazopClient($this->url,env('LAZADA_KEY'),env('LAZADA_SECRET'));
        $request = new LazopRequest('/category/tree/get','GET');
        $request->addApiParam('language_code','id_ID');
        $data = $c->execute($request);
    }

    public function GetCategoryAttributes(Request $r){        
        $c = new LazopClient($this->url,env('LAZADA_KEY'),env('LAZADA_SECRET'));
        $request = new LazopRequest('/category/attributes/get','GET');
        $request->addApiParam('primary_category_id',$r->categoryattr);
        $request->addApiParam('language_code','id_ID');
        var_dump($c->execute($request));
    }

    public function CreateProduct(Request $r){        
        $c = new LazopClient($this->url,env('LAZADA_KEY'),env('LAZADA_SECRET'));
        $request = new LazopRequest('/product/create');
        $request->addApiParam('payload', '{
            "Request": {
              "Product": {
                "PrimaryCategory": "10100795",
                "Images": {
                  "Image": [
                    "https://sg-live-02.slatic.net/p/357ae309dc5ada4b6ce2c55feb37ee06.jpg"
                  ]
                },
                "Attributes": {
                  "name": "test",
                  "description": "",
                  "brand": "No Brand",
                  "model": "test",
                  "waterproof": "Waterproof",
                  "warranty_type": "Local seller warranty",
                  "warranty": "1 Month",
                  "short_description": "",
                  "Hazmat": "None",
                  "material": "Leather",
                  "laptop_size": "11 - 12 inches",
                  "delivery_option_express": "Yes",
                  "Delivery_Option_Instant": "Yes",
                  "delivery_option_economy": "Yes",
                  "delivery_option_standard": "YES",
                  "delivery_option_sof": "No"
                },
                "Skus": {
                  "Sku": [
                    {
                      "SellerSku": "chase test 4",
                      "quantity": "3",
                      "price": "35",
                      "package_height": "10",
                      "package_length": "10",
                      "package_width": "10",
                      "package_weight": "0.5",
                      "package_content": "laptop bag",
                      "Images": {
                        "Image": [
                          "https://sg-live-02.slatic.net/p/3d93a6653bb07463c937993b4868f52e.jpg"
                        ]
                      }
                    }
                  ]
                },
                "trialProduct": "false"
              }
            }
          }');
        var_dump($c->execute($request, $r->accessToken));
    }
}