<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class TestController extends Controller
{
    function test()
{
   $user = User::find(1);

   //var_dump($user);
   return view('inicio',['user' => $user]);
   //echo "Hola Mundo Secretaria de Finanzas ";
}

}