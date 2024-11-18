<?php

namespace App\Livewire\Transaksi;

use App\Models\Transaksi;
use Livewire\Component;

class Index extends Component
{
    public $date;
    public function toggleDone(Transaksi $transaksi)
    {
        $transaksi->done = !$transaksi->done;
        $transaksi->save();
    }

    public function deleteTransaksi(Transaksi $transaksi)
    {
        $transaksi->delete();
    }

    public function mount()
    {
        $this->date = now()->format('d-m-Y');
    }

    public function render()
    {
        $formattedDate = $this->date
            ? \Carbon\Carbon::createFromFormat('d-m-Y', $this->date)->format('Y-m-d')
            : null;
        return view('livewire.transaksi.index', [
            'transaksis' => Transaksi::when($formattedDate, fn($query) => $query->whereDate('created_at', $formattedDate))->latest()->get(),
        ]);
    }
}
