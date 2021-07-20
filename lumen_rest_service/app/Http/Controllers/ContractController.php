<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Client;
Use App\Models\Contract;

class ContractController extends Controller
{ 
   public function ContractsByClient($id){
      $contracts = Client::findOrFail($id)->contracts;
      return $contracts;

    /*  foreach ($contracts as $contract) {
       
      }*/
   }
}
