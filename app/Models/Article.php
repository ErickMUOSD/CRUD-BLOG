<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'img',
        'subtitle',
        'body',
        'category_id',
        'img_id',
         'user_id'
    ];

    public  function category()
    {
        return $this->belongsTo(Category::class,'category_id');

    }

    public function image(){
        return $this->belongsTo(Images::class,  'img_id');
    }

    public function user(){
        return$this->belongsTo(User::class, 'user_id');
    }

}
