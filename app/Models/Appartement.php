<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appartement extends Model
{
    protected $guarded = [];
    use HasFactory, SoftDeletes;

    public function etage()
    {
        return $this->belongsTo(Etage::class);
    }
    public function directions(){
        return $this->belongsToMany(Direction::class);
    }
    public function bureaux(){
        return $this->hasManyThrough(Direction::class,Bureau::class);
    }
}
