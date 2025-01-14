<?php

namespace App\Exports;

use App\Models\Wallet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class WalletExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function view(): View
    {
        $data = Wallet::all();
        return view('export.wallet',compact('data'));
    }
}
