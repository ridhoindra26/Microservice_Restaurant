<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Models\Favorit;

class FavoriteController extends Controller
{
    function getFavorite($id_user)
    {
        $data = Favorit::where('id_user', '=', $id_user)->get('id_menu');
        return response()->json($data);
    }

    function addFavorite($id_user,$id_menu)
    {
        $add = new Favorit([
            'id_user' => $id_user,
            'id_menu' => $id_menu,
        ]);
        $add->save();

        return response()->json(['status'=>'200']);
    }

    function deleteFavorite($id_user,$id_menu)
    {
        $data = Favorit::where([
            'id_user'=>$id_user,
            'id_menu'=>$id_menu])->delete();
            return response()->json(['status'=>'200']);
    }
}
