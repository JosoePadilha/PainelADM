<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    use HasFactory;

    protected $table = 'warnings';

    protected $fillable = [
        'title',
        'content',
        'class',
        'user_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
