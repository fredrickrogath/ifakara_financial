<?php

namespace App\Http\Controllers\Accountant\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountantServices\InvoiceServices\ChatOfAccountService;

class ChatOfAccountController extends Controller
{
    //
    public function getChartOfAccounts(ChatOfAccountService $chatOfAccountService){
        return response()->json(['data' => $chatOfAccountService->getChartOfAccounts()]);
    }
}
