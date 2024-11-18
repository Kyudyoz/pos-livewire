<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{

    public $show = false;
    public $photo;
    public CustomerForm $form;

    #[On('createCustomer')]
    public function createCustomer()
    {
        $this->show = true;
    }

    public function simpan()
    {

        if (isset($this->form->customer)) {
            $this->form->update();
        } else {
            $this->form->store();
        }

        $this->closeModal();

        $this->dispatch('reload');
    }


    #[On('editCustomer')]
    public function editCustomer(Customer $customer)
    {
        $this->show = true;
        $this->form->setCustomer($customer);
    }
    #[On('deleteCustomer')]
    public function deleteCustomer(Customer $customer)
    {
        $customer->delete();
        $this->dispatch('reload');
    }


    public function closeModal()
    {
        $this->show = false;
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.customer.actions');
    }
}
