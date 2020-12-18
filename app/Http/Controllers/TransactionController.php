<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function  getAll(){
        $user = Auth::user();
        $transactions = $user->transactions;
        // dd($transactions);
        return view('transaction.index', compact('transactions'));
    }
}
