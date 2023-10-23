<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'sub_account_id',
        'purpose_id'
    ];

    public function account()
    {
        return $this->belongsTo(\App\Models\Account::class, 'account_id', 'id');
    }

    public function subAccount()
    {
        return $this->belongsTo(\App\Models\SubAccount::class, 'sub_account_id', 'id');
    }

    public function purpose()
    {
        return $this->belongsTo(\App\Models\Purpose::class, 'purpose_id', 'id');
    }
}
