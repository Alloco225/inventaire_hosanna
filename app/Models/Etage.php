<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etage extends Model
{
    protected $guarded=[];
    use HasFactory, SoftDeletes;
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
    public function appartements(){
        return $this->hasMany(Appartement::class);
    }
    public function directions(){
        return $this->hasManyThrough(Appartement::class,Direction::class);
    }
    public function pieces(){
        return $this->hasMany(Pieces::class);
    }
}
