<?php

namespace App\Livewire;

use App\Models\Transaksi;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $today = date('Y-m-d');
        [$tahun, $bulan] = explode("-", date('Y-m'));

        $transaksi = Transaksi::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun);
        return view('livewire.home', [
            'monthly' => $transaksi->get()->sum('price'),
            'today' => $transaksi->whereDate('created_at', $today)->get(),
        ]);
    }
}
