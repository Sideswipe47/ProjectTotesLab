<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function  getAll(){
        $user = Auth::user();
        $transactions = $user->transactions->toQuery()->orderBy('created_at', 'desc')->paginate(5);
        return view('transaction.index', compact('transactions'));
    }

    public function getTrack(Request $request) {
        $transaction = Transaction::findOrFail($request->id);
        return view('transaction.track', compact('transaction'));
    }

}
