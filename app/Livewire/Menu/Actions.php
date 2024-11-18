<?php

namespace App\Livewire\Menu;

use App\Livewire\Forms\MenuForm;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use WithFileUploads;

    public $show = false;
    public $photo;
    public $photoUrl;
    public MenuForm $form;

    #[On('createMenu')]
    public function createMenu()
    {
        $this->show = true;
    }

    #[On('editMenu')]
    public function editMenu(Menu $menu)
    {
        $this->show = true;
        $this->form->setMenu($menu);
        $this->photoUrl = $menu->photo ? url('storage/' . $menu->photo) : null;
    }

    public function simpan()
    {
        // dd($this->form->menu->photo, $this->photoUrl, $this->photo, $this->form->photo);
        if ($this->photo) {
            if ($this->photoUrl == null || $this->photoUrl != url('storage/' . $this->photo->hashName('menu'))) {
                $this->form->photo = $this->photo->hashName('menu');
                $this->photo->store('menu');
            }
        }

        if (isset($this->form->menu)) {
            $this->form->update($this->photo);
        } else {
            $this->form->store();
        }

        $this->closeModal();

        // Clean the Livewire temp-upload folder
        \Illuminate\Support\Facades\File::cleanDirectory(\storage_path('app/public/livewire-tmp'));

        $this->dispatch('reload');
    }



    #[On('deleteMenu')]
    public function deleteMenu(Menu $menu)
    {
        if ($menu->photo) {
            Storage::delete($menu->photo);
        }

        $menu->delete();
        $this->dispatch('reload');
    }


    public function closeModal()
    {
        $this->show = false;
        $this->photo = null;
        $this->photoUrl = null;
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.menu.actions', [
            'types' => Menu::$types,
        ]);
    }
}
