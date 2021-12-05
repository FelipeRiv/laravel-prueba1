<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;
    // to delete 
    // use SoftDeletes;

    // 1 to many relation https://laravel.com/docs/8.x/eloquent-relationships#one-to-many
    
    /**
     * relationship with cliente to direcciones hasMany https://laravel.com/docs/8.x/eloquent-relationships#one-to-many
     */
    public function direcciones() {
        return $this->hasMany(Direcciones::class);
    }

}
