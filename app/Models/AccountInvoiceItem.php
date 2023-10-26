<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountInvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'description',
        'purpose_id',
    ];
}
