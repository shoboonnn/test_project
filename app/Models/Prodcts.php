<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prodcts extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_name',
        'company_id',
        'price',
        'stock',
        'comment',
        'img_path'
    ];


}
