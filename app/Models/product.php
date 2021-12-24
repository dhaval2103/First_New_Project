<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    public function watch()
    {
        return $this->hasOne(product::class, 'id', 'watch_id');
    }
    
}
