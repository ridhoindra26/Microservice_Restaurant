<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class FavMenu extends Model
{
    use HasFactory;
    protected static $key = 'C4WqIkGfvOUYDcq7282Gq7kuV46945nAQ3YpmMOUs4YSDBce4SGdfd083wPnXcw8';

    public static function store_favorite($id_user,$id_menu)
    {
        try {

            $response = Http::withHeaders([
                'x-hasura-admin-secret' => self::$key
            ])->post("https://rare-jennet-39.hasura.app/api/rest/favMenu/{$id_user}/{$id_menu}");
            
            $data = $response->json('insert_favorit_menu_one');
            $data = FavMenu::hydrate($data)->flatten();

            return $data;

        } catch (\Exception $e) {
            return dd($e);
        }
    }
}
