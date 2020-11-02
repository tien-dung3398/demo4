<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function hasProduct($id)
    {
        return NULL !== $this->product->where('category_id', $id)->first();
    }
}
