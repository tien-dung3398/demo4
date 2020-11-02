<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'status'
    ];
    public function product()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
