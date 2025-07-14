<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $primaryKey = 'categoryId';
    public function coffees()
    {
        return $this->hasMany(Coffee::class, 'category_id', 'categoryId');
    }
}
