<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerLazada extends Model
{
    use HasFactory;
    protected $primaryKey = 'seller_id';
    protected $fillable = [
        'seller_id',
        'user_id',
        'country',
        'access_token',
        'token_expires_at',
        'refresh_token',
        'refresh_expires_at',
    ];
}
