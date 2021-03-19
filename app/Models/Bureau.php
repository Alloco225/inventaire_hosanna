<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bureau extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="bureaux";

    protected $guarded = [];

    public function directions()
    {
        return $this->belongsToMany(Direction::class);
    }
    public function pieces(){
        return $this->belongsToMany(Piece::class);
    }
    
}
