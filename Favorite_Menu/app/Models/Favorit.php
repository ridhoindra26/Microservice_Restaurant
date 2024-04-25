<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    protected $table = 'favorite_menu';
    protected $fillable = [
        'id_user',
        'id_menu'
    ];
    public $timestamps = false;
}
