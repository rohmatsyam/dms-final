<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Lazada\LazopClient;
use Lazada\LazopRequest;

class CrudProduct extends Controller
{
  protected $url = "https://api.lazada.co.id/rest";

  public function GetCategoryAttributes(Request $r)
  {
    $validator = Validator::make($r->all(), [
      'categoryId' => 'required',
    ]);

    if ($validator->fails()) {
      return back()->with("error", "Kategori kosong");
    }
    $c = new LazopClient($this->url, env('LAZADA_KEY'), env('LAZADA_SECRET'));
    $request = new LazopRequest('/category/attributes/get', 'GET');
    $request->addApiParam('primary_category_id', $r->categoryattr);
    $request->addApiParam('language_code', 'id_ID');
    $hasil = $c->execute($request);
    $dataEncode = json_decode($hasil);
    Storage::disk('public')->put('attributes.json', json_encode($dataEncode->data));

    $productName = $r->productName;
    $categoryId = $r->categoryId;
    view()->share(['productName' => $productName, 'categoryId' => $categoryId]);
    return view('createproduct');
  }

  public function CreateProduct(Request $r)
  {
    $validator = Validator::make($r->all(), [
      'Gambar' => 'required|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=330,min_height=330,max_width=5000,max_height=5000'
    ]);
    if ($validator->fails()) {
      return back()->with("error", $validator->errors()->first());
    }
    $file = $r->file("Gambar");
    $uploadFolder = 'img';
    $image_uploaded_path = $file->store($uploadFolder);
    Storage::disk('public')->url($image_uploaded_path);

    $linkGambar = $this->uploadImage($image_uploaded_path, $r->accessToken);

    $payload = $this->makePayload($r->all(), $linkGambar);
    $c = new LazopClient($this->url, env('LAZADA_KEY'), env('LAZADA_SECRET'));
    $request = new LazopRequest('/product/create');
    $request->addApiParam('payload', $payload);
    $response = $c->execute($request, $r->accessToken);
    $hasil = json_decode($response);

    if ($hasil->code == "0") {
      return redirect(route('producthome'))->with("success", "Success stored a product");
    } else {
      return redirect(route('lazadahome'))->with("error", "Can't store product because " . $hasil->message);
    }
  }
  protected function uploadImage($gambar, $accessToken)
  {
    $img = Storage::get($gambar);
    $c = new LazopClient($this->url, env('LAZADA_KEY'), env('LAZADA_SECRET'));
    $request = new LazopRequest('/image/upload');
    $request->addFileParam('image', $img);
    $response = $c->execute($request, $accessToken);
    $hasil = json_decode($response);
    if ($hasil->code == "0") {
      return $hasil->data->image->url;
    } else {
      return redirect(route('lazadahome'))->with("error", "Can't store product because " . $hasil->message);
    }
  }

  protected function makePayload($r, $linkGambar)
  {
    $payloadArray = array(
      "Request" => array(
        "Product" => array(
          "PrimaryCategory" => "{$r['categoryId']}",
          "Images" => array(
            "Image" => ["{$linkGambar}"]
          ),
          "Attributes" => array(
            "name" => "{$r['name']}",
            "description" => "{$r['description']}",
            "brand" => "{$r['brand']}",
          ),
          "Skus" => array(
            "Sku" => [
              array(
                "SellerSku" => "{$r['SellerSku']}",
                "quantity" => "{$r['quantity']}",
                "price" => "{$r['price']}",
                "package_height" => "{$r['package_height']}",
                "package_length" => "{$r['package_length']}",
                "package_width" => "{$r['package_width']}",
                "package_weight" => "{$r['package_weight']}",
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
