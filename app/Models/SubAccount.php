<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_code',
        'account_name',
        'account_id'
    ];

    public function account()
    {
        return $this->belongsTo(\App\Models\Account::class, 'account_id', 'id');
    }

    public function accountRelations()
    {
        return $this->hasMany(\App\Models\AccountRelation::class, 'sub_account_id', 'id');
    }

    public function purposes()
    {
        return $this->hasMany(\App\Models\Purpose::class, 'sub_account_id', 'id');
    }
}
