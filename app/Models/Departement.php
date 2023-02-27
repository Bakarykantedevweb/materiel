<?php

namespace App\Models;

use App\Models\BonSorti;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;

    protected $table = 'departements';

    protected $fillable = ['nom','statut'];

    public function bon_sortis()
    {
        return $this->hasMany(BonSorti::class);
    }
}
