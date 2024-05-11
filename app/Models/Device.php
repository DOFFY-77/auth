<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'info_device',
        'reference',
        'status',
        'establishment_id',
        'class_id',
        'marque_id',
        'type_id',
    ];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function class()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
