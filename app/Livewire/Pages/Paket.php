<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\PaketForm;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Paket extends Component
{

    use WithPagination;

    public $selectId;

    public PaketForm $form;

    public function create()
    {
        $this->validate();

        try {
            $this->form->create();

            $this->dispatch('Toastify', status: 'success', message: 'Berhasil Tambah data Paket');

            $this->dispatch('close-modal', 'create-data');

            $this->form->formReset();
        } catch (\Throwable $th) {
            dd($th);
            abort(500);
        }
    }

    public function edit(\App\Models\Paket $paket)
    {
        $this->form->detail($paket);

        $this->dispatch('open-modal', 'edit-data');
    }

    public function update()
    {
        $this->form->validate();

        $this->form->update();

        $this->dispatch('Toastify', status: 'info', message: 'Data berhasil di Update');

        $this->dispatch('close-modal', 'edit-data');

        $this->form->formReset();
    }

    public function confirmDelete($id): void
    {
        $this->selectId = $id;

        $this->dispatch('open-modal', 'delete-data');
    }

    public function delete(): void
    {
        try {
            \App\Models\Paket::find($this->selectId)->delete();

            $this->dispatch('Toastify', status: 'success', message: 'Berhasil Tambah data Paket');
            $this->dispatch('close-modal', 'delete-data');

            $this->resetPage();
        } catch (\Throwable $th) {
            abort(500);
        }
    }

    public function render()
    {
        $fiturs = \App\Models\Fitur::where('is_active', true)->get();
        $pakets = \App\Models\Paket::paginate(5);
        $fiturArray = [];


        if ($fiturs) {
            foreach ($pakets as $value) {
                $array = json_decode($value->fitur_id);
                $fiturArray[] = implode(", ", json_decode(\App\Models\fitur::find($array)->pluck('nama')));
            }
            return view('livewire.pages.paket', compact('fiturs', 'pakets', 'fiturArray'));
        }



        return view('livewire.pages.paket', compact('fiturs', 'pakets'));
    }
}
