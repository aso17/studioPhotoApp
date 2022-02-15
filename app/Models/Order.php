<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['qtyOrder', 'dateOrder', 'product_id', 'category_id', 'cutomer_id'];
};