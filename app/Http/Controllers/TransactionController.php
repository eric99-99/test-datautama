<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\Transactionresource;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::with('products');

        if(request('search')){
            $transaction = $transaction->where('reference_number', 'like', '%'.request('search') .'%' );
        }
        $transactions = $transaction->get();

        return response()->json([ 'data' => $transactions ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        $responseAPI = Http::withHeaders([
            'X-API-KEY' => 'DATAUTAMA'
        ])->post('https://sandbox.saebo.id/api/v1/transactions', [
            "quantity" => $request->quatity,
            "price" =>  $request->price,
            "payment_amount" =>  $request->payment_amount,
        ]);

        $result = $responseAPI->json();

        if($result['code'] == "20000"){
            $request['created_at'] = now();
            $request['reference_number'] = $result['data']['reference_no'];
            $transaction = Transaction::create($request->all());
            return new Transactionresource($transaction);
        }

        return response()->json([ 'data' => 'Transaction save failed' ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
