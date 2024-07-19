<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subdistrict;

class Village extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'post_code',
        'subdistrict_id',
    ];
    public function subdistrict(){
        return $this->belongsTo(Subdistrict::class);
    }
}
