<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $table = 'municipalities';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'id',
        'fe_id'
    ];
}
