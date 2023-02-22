<?php

namespace App\Models;

use App\Models\Materiel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';
    protected $fillable = ['libelle'];

    public function materiels()
    {
        return $this->hasMany(Materiel::class);
    }
}
