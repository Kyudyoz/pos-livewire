<div class="page-wrapper">
    <div class="grid md:grid-cols-3 gap-2 md:gap-6">
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-calendar-month class="size-6 " />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Pendapatan bulan ini</div>
                    <div class="text-xl font-bold">Rp. {{ number_format($monthly, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-calendar-check class="size-6 " />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Pendapatan hari ini</div>
                    <div class="text-xl font-bold">Rp. {{ number_format($today->sum('price'), 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-list-check class="size-6 " />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Total pesanan hari ini</div>
                    <div class="text-xl font-bold">{{ $today->count() }} Pesanan</div>
                </div>
            </div>
        </div>
    </div>
</div>
