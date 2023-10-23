<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_account_id',
        'purpose_code',
        'purpose_name',
        'price',
    ];

    public function accountRelations()
    {
        return $this->hasMany(\App\Models\AccountRelation::class, 'purpose_id', 'id');
    }
}
