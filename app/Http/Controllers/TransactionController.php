<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Midtrans\Snap;
use Illuminate\Support\Str;
class TransactionController extends Controller
{
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

        $nama_lengkap = $request->input('name');
        $namaArray = explode(" ", $nama_lengkap);

        $namaDepan = $namaArray[0];

        $namaBelakang = implode(" ", array_slice($namaArray, 1));


        $params = [
            'transaction_details' => [
                'order_id' => Str::uuid(),
                'gross_amount' => $request->input('price'),
            ],
            'customer_details' => [
                'name' => $nama_lengkap,
                'first_name' => $namaDepan,
                'last_name' => $namaBelakang,
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'message' => $request->input('message'),
                'price' => $request->input('price'),
                'products' => $request->input('product_name'),
            ],
            'enabled_payments' => [
                'credit_card',
                'gopay',
                'bank_transfer',
                'echannel', 
                'bca_va',
                'bni_va',
                'bri_va',
                'permata_va',
                'other_va', 
                'qris',
            ],

            'vtweb' => [],
        ];

        $auth = base64_encode(env('MIDTRANS_SERVER_KEY') . ':' . env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $auth,
        ])->withOptions(['verify' => false])
        ->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $params);

        $snapToken = $response['token'];

        if ($response->successful()) {

            // Simpannnn saja di databaseeeess
            $id = $params['transaction_details']['order_id'];
            $transaction = new Transaction();
            $transaction->id = $id;
            $transaction->name = $params['customer_details']['name'];
            $transaction->email = $params['customer_details']['email'];
            $transaction->phone = $params['customer_details']['phone'];
            $transaction->message = $params['customer_details']['message'];
            $transaction->product_id = $request->input('product_id');
            $transaction->snap_token = $snapToken;
            $transaction->status = 'pending';
            $transaction->total = $params['transaction_details']['gross_amount'];
            $transaction->save();


            // return response()->json([
            //     'snap_token' => $snapToken,
            //     'redirect_url' => $response['redirect_url'],
            // ]);
            return redirect($response['redirect_url']);
        } else {

            return response()->json($response);
        }

       
    }


    public function callback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == "settlement") {
                $order = Transaction::find($request->order_id);
                $order->update(["status" => "success"]);
            }
        }
    }

    public function invoice($id)
    {
        $order = Transaction::find($id)->with('product')->first();
        $now = now();
        $data = [
            'order' => $order, 
            'now' => $now
        ];
        return view('clients.transactions.invoice', $data);
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
