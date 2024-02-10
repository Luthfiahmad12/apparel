<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\FiturForm;
use Livewire\Component;
use Livewire\WithPagination;

class Fitur extends Component
{
    use WithPagination;

    public FiturForm $form;

    public $selectId, $editId, $editnama, $editvalue;

    public function create(): void
    {
        $this->validate();

        try {
            $this->form->create();
            $this->dispatch('Toastify', status: 'success', message: 'Fitur Berhasil Ditambah');
            $this->form->formReset();
        } catch (\Throwable $th) {
            abort(500);
        }
    }

    public function toggle($id): void
    {
        try {
            $fitur = \App\Models\Fitur::find($id);
            $fitur->is_active = !$fitur->is_active;
            $fitur->save();
            $this->dispatch('Toastify', status: 'info', message: 'Fitur Berhasil Diupdate');
        } catch (\Throwable $th) {
            abort(500);
        }
    }

    public function edit($id): void
    {
        $this->editId = ($id);
        $this->editnama = \App\Models\Fitur::find($id)->nama;
        $this->editvalue = \App\Models\Fitur::find($id)->value;
    }

    public function cancel(): void
    {
        $this->reset('editId', 'editnama', 'editvalue');
    }

    public function update(): void
    {
        \App\Models\Fitur::find($this->editId)->update([
            'nama' => $this->editnama,
            'value' => $this->editvalue,
        ]);

        $this->dispatch('Toastify', status: 'info', message: 'Fitur Berhasil Diupdate');

        $this->reset('editId', 'editnama', 'editvalue');
    }

    public function confirmDelete($id): void
    {
        $this->selectId = $id;
        $this->dispatch('open-modal', 'delete-data');
    }

    public function delete(): void
    {
        try {
            \App\Models\Fitur::find($this->selectId)->delete();
            $this->dispatch('Toastify', status: 'success', message: 'Fitur Berhasil Dihapus');
            $this->dispatch('close-modal', 'delete-data');
        } catch (\Throwable $th) {
            abort(500);
        }
    }

    public function render()
    {
        return view('livewire.pages.fitur', [
            'fiturs' => \App\Models\Fitur::paginate(5),
        ]);
    }
}
