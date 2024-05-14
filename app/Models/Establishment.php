<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;

    protected $table = 'establishments';

    protected $fillable = [
        'name',
        'Complexe',
    ];

    public function classes()
    {
        return $this->hasMany('App\Models\Classe', 'establishment_id');
    }
}
