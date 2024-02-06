<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TopUp;
use App\Models\Produk;
use App\Models\Wallet;
use App\Models\Withdrawl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function kantinIndex()
    {
        $title = 'Metmart | Kantin';
        $kantin = Produk::all();
        return view('kantin.index', compact('title', 'kantin'));
    }

    public function produkIndex()
    {
        $title = 'MetMart | Produk';
        $kantin = Produk::all();
        return view('produk.index', compact('title', 'kantin'));
    }

    public function bankIndex()
    {
        $title = 'MetMart | Bank';
        $customers = User::where('role', 'customer')->get();
        $wallets = Wallet::all();
        $requestTopups = TopUp::where('status', 'menunggu')->get();
        $requestWithdrawls = Withdrawl::where('status', 'menunggu')->get();
        return view('bank.index', compact('title', 'customers', 'wallets', 'requestTopups', 'requestWithdrawls'));
    }

    public function customerIndex()
    {
        $title = 'MetMart | Customer';
        $wallet = Wallet::where('id_user', auth()->user()->id)->first();
        return view('customer.index', compact('title', 'wallet'));
    }
}
