<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_code',
        'account_name',
        'account_category'
    ];

    public function subAccounts()
    {
        return $this->hasMany(\App\Models\SubAccount::class, 'account_id', 'id');
    }

    public function accountRelations()
    {
        return $this->hasMany(\App\Models\AccountRelation::class, 'account_id', 'id');
    }

    public function purposes()
    {
        return $this->hasManyThrough(\App\Models\Purpose::class, \App\Models\AccountRelation::class, 'account_id', 'id', 'id', 'purpose_id');
    }
}
