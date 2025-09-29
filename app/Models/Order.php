<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'status'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}