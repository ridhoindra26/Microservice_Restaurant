<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MenuController extends Controller
{
    private $menu = [
        [
            'menu_id'=>1,
            'resto_id'=>1,
            'nama_menu'=>'Bakso',
            'harga'=>10000
        ],
        [
            'menu_id'=>2,
            'resto_id'=>1,
            'nama_menu'=>'Mie Ayam',
            'harga'=>15000
        ],
        [
            'menu_id'=>3,
            'resto_id'=>1,
            'nama_menu'=>'Mie Yamin',
            'harga'=>15000
        ],
        [
            'menu_id'=>4,
            'resto_id'=>2,
            'nama_menu'=>'Ketoprak',
            'harga'=>16000
        ],
        [
            'menu_id'=>5,
            'resto_id'=>2,
            'nama_menu'=>'Tahu Telor',
            'harga'=>10000
        ],
        [
            'menu_id'=>6,
            'resto_id'=>2,
            'nama_menu'=>'Gado-Gado',
            'harga'=>10000
        ],
        [
            'menu_id'=>7,
            'resto_id'=>3,
            'nama_menu'=>'Bakso Malang',
            'harga'=>15000
        ],
        [
            'menu_id'=>8,
            'resto_id'=>3,
            'nama_menu'=>'Mie Pangsit',
            'harga'=>13000
        ]
    ];

    function getMenu(){
        return response()->json($this->menu);
    }
}
