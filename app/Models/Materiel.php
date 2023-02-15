<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materiel extends Model
{
    use HasFactory;

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
