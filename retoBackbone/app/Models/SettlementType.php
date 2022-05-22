<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettlementType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'settlement_types';

    protected $fillable = [
        'name', 'id'
    ];
    
}
