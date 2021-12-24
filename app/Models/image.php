<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'product_id'
    ];

    public function getImageAttribute($value)
    {
        return $value ? asset('images' . '/' . $value) : NULL;
    }
    public function image()
    {
        return $this->hasMany(image::class, 'product_id', 'id');
    }
}
