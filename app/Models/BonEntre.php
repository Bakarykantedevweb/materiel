<?php

namespace App\Models;

use App\Models\Materiel;
use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BonEntre extends Model
{
    use HasFactory;

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function materiels()
    {
        return $this->belongsToMany(Materiel::class);
    }
}
