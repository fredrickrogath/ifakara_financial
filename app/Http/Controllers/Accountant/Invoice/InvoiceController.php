<?php

namespace App\Http\Controllers\Accountant\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\AccountantServices\InvoiceServices\InvoiceService;

class InvoiceController extends Controller
{
    //
    public function invoiceFromSchool(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->invoiceFromSchool($request)]);
    }
}
