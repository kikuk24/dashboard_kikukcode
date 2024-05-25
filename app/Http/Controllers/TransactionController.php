<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class TransactionController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
    }
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $products = Products::where('slug', $slug)->first();
        $data = [
            'product' => $products
        ];
        return view('clients.transactions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = [
            'transaction_details' => [
                'order_id' => Str::uuid(),
                'gross_amount' => $request->input('gross_amount'),
            ],
            'customer_details' => [
                'name' => $request->input('first_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'message' => $request->input('message'),
                'price' => $request->input('price'),
                'products' => $request->input('product_name'),
            ],
            'enabled_payments' => [
                'gopay',
                'bank_transfer',
                'permata_va',
                'bca_va',
                'bni_va',
                'bri_va',
                'mandiri_va',
                'qris',
            ],
            'vtweb' => [],
        ];
        $snapToken = Snap::getSnapToken($params);



        return response()->json($snapToken);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
