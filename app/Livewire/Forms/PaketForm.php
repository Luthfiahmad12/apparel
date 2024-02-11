<?php

namespace App\Livewire\Forms;

use App\Models\Fitur;
use App\Models\Paket;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PaketForm extends Form
{
    public \App\Models\Paket $paket;


    public $nama, $fitur_id = [], $harga;

    public $fiturs;

    #[Rule([
        'nama' => ['required'],
        'fitur_id' => 'nullable',
        'harga' => ['required', 'numeric']
    ], message: [
        'required' => 'harap isi kolom',
        // 'unique.nama' => 'nama paket sudah ada',
        'numeric' => 'nilai harus berupa angka'
    ])]

    public function detail(Paket $paket)
    {
        $this->paket = $paket;

        $this->nama = $paket->nama;
        $this->harga = $paket->harga;
        $this->fitur_id = json_decode($paket->fitur_id);
        $this->fiturs = Fitur::where('is_active', true)->get();
    }

    public function create()
    {
        $fitur = json_encode($this->fitur_id);

        \App\Models\Paket::create([
            'nama' => $this->nama,
            'harga' => $this->harga,
            'fitur_id' => $fitur
        ]);
    }

    public function update()
    {
        $this->paket->update($this->except(['paket', 'fiturs']));
    }

    public function formReset()
    {
        $this->nama = '';
        $this->harga = '';
        $this->fitur_id = '';
    }
}
