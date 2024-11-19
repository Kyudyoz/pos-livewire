<div class="page-wrapper">
    <div class="flex justify-between">
        <input type="search" class="input input-bordered" placeholder="Search" wire:model.live="search">
        <button class="btn btn-primary" wire:click="$dispatch('createMenu')">
            <x-tabler-plus class="size-5" />
            <span class="hidden md:block">Tambah Menu</span>
        </button>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="flex gap-3 items-center">
                                <div class="avatar">
                                    <div class="w-12 rounded-lg">
                                        <img src="{{ $menu->gambar }}" />
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="font-bold">
                                        {{ $menu->name }}
                                    </div>
                                    <div class="text-sm">
                                        {{ $menu->type }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $menu->harga }}</td>
                        <td class="whitespace-normal w-80 ">
                            <div class="line-clamp-2">
                                {{ $menu->desc }}
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-center gap-2">
                                <button class="btn btn-xs btn-square"
                                    wire:click="$dispatch('editMenu',{'menu' : {{ $menu->id }}})">
                                    <x-tabler-edit class="size-5" />
                                </button>
                                <button class="btn btn-xs btn-square"
                                    wire:click="$dispatch('deleteMenu',{'menu' : {{ $menu->id }}})">
                                    <x-tabler-trash class="size-5" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('menu.actions')
</div>
