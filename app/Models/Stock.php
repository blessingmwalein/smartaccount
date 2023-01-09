<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded;

    protected $with = ["category", "supplier"];
    
    public function category()
    {
        return $this->belongsTo(StockCategory::class, 'stock_category_id','id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
