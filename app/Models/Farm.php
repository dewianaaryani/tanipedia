<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Village;
use App\Models\Product;
class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'lt',
        'ld',
        'location',
        'luas',
        'kualitas_air',
        'kualitas_udara',
        'kualitas_tanah',
        'contact',
        'image',
    ];
    public function user(){
        return $this->belongsTo(User::class)
            ->where('users.type', '=', 0);
    }
    public function userIndex(){
        return $this->belongsTo(User::class);
    }

    public function village(){
        return $this->belongsTo(Village::class, 'location', 'post_code');        
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
