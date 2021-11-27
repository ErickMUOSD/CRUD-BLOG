<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{
    Use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function article()
    {
        return $this->hasMany(Article::class,'img_id');
    }

}
