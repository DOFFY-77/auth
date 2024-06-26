<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'establishment_id'];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
