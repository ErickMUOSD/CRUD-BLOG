<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function article(){

        return $this->hasOne(Article::class, 'category_id');
    }
}
