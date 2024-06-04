<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Menu extends Model
{
    use HasFactory;
    protected static $key = 'C4WqIkGfvOUYDcq7282Gq7kuV46945nAQ3YpmMOUs4YSDBce4SGdfd083wPnXcw8';

    public static function getMenu($id)
    {
        try {

            $response = Http::withHeaders([
                'x-hasura-admin-secret' => self::$key
            ])->get("https://rare-jennet-39.hasura.app/api/rest/getmenu/{$id}");
            
            $data = $response->json('menu');
            if ($data) {
                $data = Menu::hydrate($data)->flatten();

                return $data;
            }

            return $data;
            
        } catch (\Exception $e) {
            return dd($e);
        }
    }

    public static function getMenuById($id)
    {
        try {

            $response = Http::withHeaders([
                'x-hasura-admin-secret' => self::$key
            ])->get("https://rare-jennet-39.hasura.app/api/rest/getMenuByPK/{$id}");
            
            $data = $response->json('menu_by_pk');

            return $data;

        } catch (\Exception $e) {
            return dd($e);
        }
    }
}
