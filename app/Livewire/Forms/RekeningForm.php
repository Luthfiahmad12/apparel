<?php

namespace App\Livewire\Forms;

use App\Models\Rekening;
use Illuminate\Validation\Rules\Exists;
use Livewire\Attributes\Rule;
use Livewire\Form;

class RekeningForm extends Form
{
    public \App\Models\Rekening $rekening;

    public $id_bank, $nama, $no_rekening;
    #[Rule([
        'id_bank' => 'required',
        'nama' => ['required', 'string'],
        'no_rekening' => ['required', 'numeric'],
    ], message: [
        'required' => 'harap isi kolom!',
        'numeric' => 'input harus berupa angka!'
    ])]

    public function detail(Rekening $rekening)
    {
        $this->rekening = $rekening;

        $this->id_bank = $rekening->id_bank;
        $this->nama = $rekening->nama;
        $this->no_rekening = $rekening->no_rekening;
    }

    public function createOrder()
    {
        \App\Models\Rekening::create($this->except(['rekening']));
    }

    public function update()
    {

        $this->rekening->update($this->except(['rekening']));
    }

    public function resetForm()
    {
        $this->id_bank = '';
        $this->nama = '';
        $this->no_rekening = '';
    }
}
