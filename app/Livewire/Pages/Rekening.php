<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\RekeningForm;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Rekening extends Component
{

    use WithPagination;

    public RekeningForm $form;

    public $selectId;

    public $page = 5;

    public function create()
    {
        $this->form->validate();

        $this->form->createOrder();

        $this->form->resetForm();

        $this->dispatch('Toastify', status: 'success', message: 'Rekening Berhasil Ditambah');

        $this->dispatch('close-modal', 'create-data');
        // penjelasan
        // 1. setlah sukses reset form yang dihandle oleh form:RekeningForm
        // 2.mengirim event close modal 'create-data' sesuai dengan name yang digunkaan pada modal
    }

    public function edit(\App\Models\Rekening $rekening)
    {
        // dd($rekening);
        $this->form->detail($rekening);

        $this->dispatch('open-modal', 'edit-data');
    }

    public function update()
    {
        // $checkData = \App\Models\Rekening::where('id_bank', $this->form->id_bank)
        //     ->where('nama', $this->form->nama)
        //     // ->where('id', '!=', $this->form->rekening->id) // Exclude the current record from the check
        //     ->first();

        // if ($checkData) {
        //     $this->dispatch('Toastify', status: 'error', message: 'Combination of id_bank and nama already exists.');
        //     return;
        // }

        $this->form->update();

        $this->dispatch('Toastify', status: 'info', message: 'Rekening Berhasil Diupdate');
        $this->dispatch('close-modal', 'edit-data');
    }

    public function confirmDelete($id)
    {
        $this->selectId = $id;

        $this->dispatch('open-modal', 'delete-data');
    }

    public function delete(\App\Models\Rekening $rekening)
    {
        $rekening->delete();

        $this->dispatch('Toastify', status: 'success', message: 'Rekening Berhasil Dihapus');

        $this->dispatch('close-modal', 'delete-data');
    }

    public function render()
    {
        return view('livewire.pages.rekening', [
            'banks' => \App\Models\Bank::all(),
            'rekenings' => \App\Models\Rekening::with('bank')->orderBy('created_at', 'desc')->paginate($this->page)
        ]);
    }
}
