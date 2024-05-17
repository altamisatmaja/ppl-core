<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'nama_testimoni',
        'deskripsi',
        'gambar',
        'id_user',
        'id_products',
        'membantu',
        'slug_testimonial'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'id_products', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
