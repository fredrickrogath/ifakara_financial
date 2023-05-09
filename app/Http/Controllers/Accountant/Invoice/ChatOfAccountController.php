<?php

namespace App\Http\Controllers\Accountant\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountantServices\InvoiceServices\ChatOfAccountService;

class ChatOfAccountController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    //
    public function getChartOfAccounts(ChatOfAccountService $chatOfAccountService){
        return response()->json(['data' => $chatOfAccountService->getChartOfAccounts()]);
    }

    public function addChartOfAccounts(Request $request, ChatOfAccountService $chatOfAccountService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $chatOfAccountService->addChartOfAccounts($request)]);
    }

    public function updateChartOfAccount(Request $request, ChatOfAccountService $chatOfAccountService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $chatOfAccountService->updateChartOfAccount($request)]);
    }

    public function deleteChartOfAccounts(Request $request, ChatOfAccountService $chatOfAccountService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $chatOfAccountService->deleteChartOfAccounts($request)]);
    }
}
