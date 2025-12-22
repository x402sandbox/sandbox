<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use X402Sandbox\Sandbox\Repositories\MagicWallets;

class WalletController extends Controller
{
    public function index(MagicWallets $magicWallets): View
    {
        return view('wallets', [
            'magicWallets' => $magicWallets->all(),
        ]);
    }
}
