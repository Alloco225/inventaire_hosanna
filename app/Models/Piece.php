<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Piece extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function bureaux()
    {
        return $this->belongsToMany(Bureau:: class);
    }
    
    public function etage()
    {
        return $this->belongsTo(Etage::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
