<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Direction extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function appartements()
    {
        return $this->belongsToMany(Appartement::class);
    }
    public function bureaux(){
        return $this->belongsToMany(Bureau::class);
    }
    public function pieces(){
        return $this->hasManyThrough(Bureau::class,Piece::class);
    }

}
