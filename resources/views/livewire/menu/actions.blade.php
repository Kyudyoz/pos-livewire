<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="text-lg font-bold">Form Input Menu</h3>
            <div class="py-4 space-y-2">
                <div class="flex justify-center flex-col gap-2 items-center" x-data="{ isUploading: false, progress: 10 }"
                    x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <label for="pickphoto" class="avatar cursor-pointer flex-row">
                        <div class="w-24 rounded-xl">
                            <img src="{{ $photo ? $photo->temporaryUrl() : $photoUrl ?? url('img/no-img.jpg') }}" />
                        </div>
                    </label>
                    <input accept="image/*" type="file" class="hidden" id="pickphoto" wire:model="photo">
                    <div x-show="isUploading" class="w-56 text-center">
                        <progress x-bind:value="progress" value="25" max="100"
                            class="progress w-56"></progress>

                        <span x-text="progress + '%'"></span>

                    </div>
                </div>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama Menu</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Harga</span>
                    </div>
                    <input type="number" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.price'),
                    ])
                        wire:model="form.price" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Tipe</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.type'),
                    ]) wire:model="form.type">
                        @foreach ($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Keterangan</span>
                    </div>
                    <textarea placeholder="Tulis keterangan menu disini" @class([
                        'textarea textarea-bordered',
                        'textarea-error' => $errors->first('form.desc'),
                    ]) wire:model="form.desc"></textarea>
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" class="btn btn-ghost" wire:click="closeModal">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
