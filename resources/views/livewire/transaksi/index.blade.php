<div class="page-wrapper">
    <div class="flex justify-between">
        {{-- <input type="date" class="input input-bordered" wire:model.live="date"> --}}

        <div class="relative max-w-sm" x-data x-init="flatpickr($refs.datepicker, {
            dateFormat: 'd-m-Y',
            onChange: function(selectedDates, dateStr) {
                @this.set('date', dateStr);
            }
        });">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <x-tabler-calendar-search />
            </div>
            <input id="datepicker-format" x-ref="datepicker" type="text" class="input input-bordered w-full ps-10 p-2.5"
                placeholder="Select date" readonly wire:model.defer="date">
        </div>



        <a href="{{ route('transaksi.export') }}" class="btn btn-primary" wire:navigate>
            <x-tabler-printer class="size-5" />
            <span class="hidden md:block">Export Transaksi</span>
        </a>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Waktu Transaksi</th>
                <th>Keterangan</th>
                <th>Customer</th>
                <th>Harga</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->created_at->diffForHumans() }}</td>
                        <td>{{ $transaksi->desc }}</td>
                        <td>{{ $transaksi->customer?->name }}</td>
                        <td>Rp. {{ number_format($transaksi->price, 0, ',', '.') }}</td>
                        <td>
                            <input type="checkbox" class="toggle toggle-sm toggle-primary" @checked($transaksi->done)
                                wire:change="toggleDone({{ $transaksi->id }})" />
                        </td>
                        <td>
                            <div class="flex justify-center gap-2">
                                <button class="btn btn-xs btn-square"
                                    wire:click="$dispatch('detailTransaksi', {transaksi : {{ $transaksi->id }}})">
                                    <x-tabler-folder class="size-4" />
                                </button>
                                <a href="{{ route('transaksi.edit', $transaksi) }}" class="btn btn-xs btn-square"
                                    wire:navigate><x-tabler-edit class="size-4" /></a>
                                <button class="btn btn-xs btn-square"
                                    wire:click="deleteTransaksi({{ $transaksi->id }})">
                                    <x-tabler-trash class="size-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('transaksi.detail')

</div>
