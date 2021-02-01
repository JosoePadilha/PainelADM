<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CLient extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'status',
        'avatar',
        'socialReason',
        'cnpj',
        'phone',
        'celPhone',
        'email',
        'city',
        'state',
        'neighborhood',
        'number',
        'password',
    ];
}
