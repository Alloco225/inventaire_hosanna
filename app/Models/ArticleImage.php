<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    use HasFactory;

    protected $fillable = ["path", "article_id"];
    protected $appends = ["link"];

    public function getLinkAttribute() : string
    {
        return asset("/images/articles/" . $this->path);
    }
}
