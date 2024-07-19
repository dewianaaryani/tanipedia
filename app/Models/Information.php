<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    public $table = "informations";
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'content',
        'source',        
    ]; 
}
