<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    protected $primaryKey = 'coffeeId';

    protected $fillable = [
        'name',
        'size',
        'price',
        'stock',
        'category_id',
        'supplier_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'categoryId');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplierId');
    }
}
