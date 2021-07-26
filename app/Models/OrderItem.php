<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'menu_id'];

    public function storeData($request, $makeOrder)
    {
        for ($i = 0; $i < count($request->order_items); $i++) {
            $makeOrder->orderItem()->create([
                'order_id' => $makeOrder->id,
                'menu_id' => array_values($request->order_items)[$i]["menu_id"],
                'jumlah' => array_values($request->order_items)[$i]["jumlah"],
            ]);
        }
    }
}
