<?php

namespace App\Services\AccountantServices\InvoiceServices;

class ChatOfAccountService
{
    // public function getSpecificLegerEntries(){
    //     return \App\Models\ChartsOfAccount::where('account_type' ,'=', 'Income')->get();
    // }

    // public function getLegerEntries(){
    //     return \App\Models\TuitionFee::with('chartOfAccount', 'user')->orderBy('created_at', 'desc')->get();
    // }

    public function getChartOfAccounts(){
        return \App\Models\ChartsOfAccount::orderBy('created_at', 'desc')->get();
    }
}