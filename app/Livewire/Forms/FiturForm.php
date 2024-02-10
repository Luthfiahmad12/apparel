<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class FiturForm extends Form
{
    public \App\Models\Fitur $fitur;

    public $nama, $is_active, $value;

    #[Rule([
        'nama' => ['required', 'unique:fiturs,nama'],
        'value' => 'required'
    ], message: [
        'required' => 'kolom harap diisi',
        'unique' => 'Nama sudah digunakan, harap ganti yang lain'
    ])]

    public function create(): void
    {
        \App\Models\Fitur::create($this->except(['fitur', 'is_active'])); //is active default true
    }

    public function formReset(): void
    {
        $this->nama = '';
        $this->value = '';
    }
}
