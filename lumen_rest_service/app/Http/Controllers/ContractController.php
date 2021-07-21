<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Client;
Use App\Models\Contract;

class ContractController extends Controller
{ 
   public function ContractsByClient($id){
      $contracts = Client::find($id)->contracts;
      return $contracts;

    /*  foreach ($contracts as $contract) {
      }*/
   }
   public function index(){
      $contracts = Contract::all();
      return $contracts;

   }
   public function showContractById($id){
      return Contract::find($id);
   }
   // Update a contract by id 
   // edit contract
   public function update(Request $request){
      $contract = Contract::FindOrFail($request->id);
      $contract->id = $request->input('id');
      $contract->energy=$request->input('energy');
      $contract->product=$request->input('product');
      $contract->gsrn=$request->input('gsrn');
      $contract->duration=$request->input('duration');
      $contract->codePromo=$request->input('codePromo');
      if($contract->save()){
         return response($contract);
      }
   }
}
