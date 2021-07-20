<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
       $clients = Client::all();
       return response($clients);
       }
    public function show( $id)
       {
            $clients = Client::findOrFail($id);
        return response($clients);
       }
}
