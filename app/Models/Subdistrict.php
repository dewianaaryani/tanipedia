<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Village;

class Subdistrict extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function village(){
        return $this->belongsTo(Village::class);
    }
}
