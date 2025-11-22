<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    protected $fillable = [
        'nama',
    ];

    public function tpmodul()
    {
        return $this->belongsTo(Tpmodul::class, 'article_category', 'category_id', 'article_id');
    }
}
