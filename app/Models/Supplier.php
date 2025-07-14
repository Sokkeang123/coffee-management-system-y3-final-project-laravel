<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'supplierId';
    public function coffees()
    {
        return $this->hasMany(Coffee::class, 'supplier_id', 'supplierId');
    }
}
