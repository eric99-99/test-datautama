<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    protected $with = ['products'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
