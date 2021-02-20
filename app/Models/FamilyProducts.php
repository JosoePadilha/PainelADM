<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyProducts extends Model
{
    use HasFactory;

    protected $table = 'familys';

    protected $fillable = [
        'name',
    ];

    public function documents()
    {
        return $this->hasMany(Family::class);
    }
}
