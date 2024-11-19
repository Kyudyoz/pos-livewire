<div class="page-wrapper">
    <div class="grid lg:grid-cols-2 gap-6">
        <div class="card card-divide h-fit mr-10 lg:mr-0">
            <div class="card-body">
                <input type="search" class="input input-bordered" placeholder="Search" wire:model.live="search">
            </div>

            @foreach ($menus->sortBy(function ($order) {
        return $order->first()->type == 'Makanan' ? 0 : 1;
    }) as $type => $menu)
                <div class="card-body">
                    <h3 class="card-title">{{ $type }}</h3>
                    <div class="grid xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-3 sm:grid-cols-2 grid-cols-2 gap-2">
                        @foreach ($menu as $item)
                            <button class="avatar" wire:click="addItem({{ $item->id }})">
                                <div class="w-full rounded-lg relative">
                                    <img src="{{ $item->gambar }}" />
                                </div>

                                <span class="text-xs badge badge-ghost absolute top-2 left-2 mr-2 line-clamp-1">
                                    {{ $item->name }}
                                </span>
                                <span class="text-xs badge badge-ghost absolute bottom-2 left-2 mr-2">
                                    {{ $item->harga }}
                                </span>

                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card h-fit mr-10 lg:mr-0">
            <form class="card-body space-y-4" wire:submit="simpan">
                <h3 class="card-title">Detail Transaksi</h3>
                <div @class(['table-wrapper', 'border-error' => $errors->first('items')])>
                    <table class="table">
                        <thead>
                            <th>Nama</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($items ?? [] as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value['qty'] }}</td>
                                    <td>Rp. {{ number_format($value['price'], 0, ',', '.') }}</td>
                                    <td class="flex gap-2">
                                        <button type="button" class="btn btn-xs btn-square">
                                            <x-tabler-minus class="size-5"
                                                wire:click="removeItem('{{ $key }}')" />
                                        </button>
                                        <button type="button" class="btn btn-xs btn-square">
                                            <x-tabler-plus class="size-5"
                                                wire:click="plusItem('{{ $key }}')" />
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <select class="select select-bordered" wire:model="form.customer_id">
                    <option value="" hidden>Pilih Customer</option>
                    @foreach ($customers as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <textarea class="textarea textarea-bordered" placeholder="Keterangan transaksi" rows="3" wire:model="form.desc"></textarea>

                <div class="card-actions justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs">Total Harga</div>
                        <div @class(['card-title', 'text-error' => $errors->first('items')])>Rp. {{ number_format($this->getTotalPrice(), 0, ',', '.') }}
                        </div>
                    </div>
                    <button class="btn btn-primary">
                        <x-tabler-check class="size-5" />
                        <span>Simpan</span>
                    </button>
                </div>

            </form>
        </div>


    </div>
</div>
