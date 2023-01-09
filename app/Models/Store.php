<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded;

    protected $with = ['stockAllocations'];

    public function stockAllocations()
    {
        return $this->hasMany(StoreStockAllocation::class);
    }
}