<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;

    // Once the relationship has been defined, we can retrieve a comment's parent post by accessing the post "dynamic relationship property": https://laravel.com/docs/8.x/eloquent-relationships#one-to-many-inverse
    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
}
