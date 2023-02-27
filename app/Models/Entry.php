<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'charts_of_accounts_id',
        'from',
        'amount',
        
    ];

    public function chartOfAccount()
    {
        return $this->belongsTo('App\Models\ChartsOfAccount','charts_of_accounts_id','id');
    }
}
