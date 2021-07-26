<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function index(Request $request)
    {
        $order = new Order();
        $orderItem = new OrderItem();

        $storeOrderData = $order->storeData($request);
        $orderItem->storeData($request, $storeOrderData);

        $payload = $order->setPayload($request, $storeOrderData);
        $snapToken = $order->generateSnapToken($payload);
        $order->setSnapToken($storeOrderData, $snapToken);

        $this->response['snap_token'] = $snapToken;

        return response()->json($this->response);
    }

    public function notification(Request $request)
    {
      \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
      \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        $notif = new \Midtrans\Notification();

        DB::transaction(function() use($notif) {

          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $donation = Order::where('transaction_id', $orderId)->first();

          if ($transaction == 'capture') {
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {
                $donation->setStatusPending();
              } else {
                $donation->setStatusSuccess();
              }

            }
          } elseif ($transaction == 'settlement') {

            $donation->setStatusSuccess();

          } elseif($transaction == 'pending'){

              $donation->setStatusPending();

          } elseif ($transaction == 'deny') {

              $donation->setStatusFailed();

          } elseif ($transaction == 'expire') {

              $donation->setStatusExpired();

          } elseif ($transaction == 'cancel') {

              $donation->setStatusFailed();

          }

        });

        return;
    }
}
