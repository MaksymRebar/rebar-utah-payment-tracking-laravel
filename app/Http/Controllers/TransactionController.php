<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use http\Client\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Requires authentication
        // Add additional middleware or authorization checks if needed
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transactions=Transaction::all();
        return view('transactions.index',['transactions'=>$transactions]);
    }

    public function read( string $id){
        $transaction=Transaction::findOrFail($id);
        return view('transactions.read',['transaction'=>$transaction]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function save(StoreTransactionRequest $request):RedirectResponse
    {
        //

//        Transaction::create($request->all());
        $newTransaction=new Transaction;
        $newTransaction->amount=$request->amount;
        $newTransaction->payer=$request->payer;
        $newTransaction->due_on=$request->due_on;
        $newTransaction->vat=$request->vat;
        $newTransaction->is_vat_inclusive=true;
        $newTransaction->save();
        return redirect()->route('transactions');
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
    public function store(StoreTransactionRequest $request)
    {
        //
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
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
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
