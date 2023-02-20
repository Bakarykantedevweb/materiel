<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Agence;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterielRecupere extends Model
{
    use HasFactory;

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

     public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
