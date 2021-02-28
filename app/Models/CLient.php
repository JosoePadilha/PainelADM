<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CLient extends Authenticatable
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'status',
        'type',
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


   protected $hidden = [
       'password',
       'remember_token',
   ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
