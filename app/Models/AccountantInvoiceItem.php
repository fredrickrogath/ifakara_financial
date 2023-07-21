<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountantInvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'accountant_invoice_id',
    ];
}
