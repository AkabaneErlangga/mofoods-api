<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Set status to Pending
     *
     * @return void
     */
    public function setStatusPending()
    {
        $this->attributes['status'] = 'pending';
        self::save();
    }

    /**
     * Set status to Success
     *
     * @return void
     */
    public function setStatusSuccess()
    {
        $this->attributes['status'] = 'success';
        self::save();
    }

    /**
     * Set status to Failed
     *
     * @return void
     */
    public function setStatusFailed()
    {
        $this->attributes['status'] = 'failed';
        self::save();
    }

    /**
     * Set status to Expired
     *
     * @return void
     */
    public function setStatusExpired()
    {
        $this->attributes['status'] = 'expired';
        self::save();
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function storeData($request)
    {
        return Order::create([
            'transaction_id' => Str::uuid(),
            'meja_id' => $request->meja_id,
            'tanggal' => now(),
            'harga' => $request->harga,
        ]);
    }

    public function generateSnapToken($payload)
    {
        return \Midtrans\Snap::getSnapToken($payload);
    }

    public function setPayload($request, $makeOrder)
    {
        return [
            'transaction_details' => [
                'order_id'      => $makeOrder->transaction_id,
                'gross_amount'  => floatval($request->harga),
            ],
        ];
    }

    public function setSnapToken($makeOrder, $snapToken)
    {
        $makeOrder->snap_token = $snapToken;
        $makeOrder->save();
    }
}
