<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric'
        ]);
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));

        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => $request->post('amount'),
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);

        return [
            'clientSecret' => $paymentIntent->client_secret,
        ];

    }
}
