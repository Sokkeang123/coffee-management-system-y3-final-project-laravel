<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function coffees()
    {
        return $this->hasMany(Coffee::class, 'category_id', 'categoryId');
    }
}
