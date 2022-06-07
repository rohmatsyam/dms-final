<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProduct extends Model
{
    use HasFactory;
    protected $primaryKey = 'item_id';
    protected $fillable = [
        'item_id',
        'seller_id',
        'shop_sku',
        'seller_sku',
        'sku_id',        
    ];            
}
