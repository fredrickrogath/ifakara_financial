<?php

namespace App\Services\AccountantServices\InvoiceServices;

class InvoiceService
{    
    public function invoiceFromSchool($request){
        return $request->all();
        // return \App\Models\ChartsOfAccount::create([
        //     'account_type' => $request->account_type,
        //     'level1' => $request->level1,
        //     'level2' => $request->level2,
        //     'level3' => $request->level3,
        //     'name' => $request->name,
        //     'description' => $request->description ,
        //     'notes' => $request->notes,

        // ]);
    }
}