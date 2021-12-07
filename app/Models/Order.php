<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
       'order_id','dish_id','table_id','status'

    ];
        public function dish()
    {
        return $this->belongsTo(Dish::class, 'dish_id');
    }
}
