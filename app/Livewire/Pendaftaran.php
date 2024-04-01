<?php

namespace App\Livewire;

use App\Models\Pendaftaran as ModelsPendaftaran;
use Livewire\Component;

class Pendaftaran extends Component
{
    public $nama;
    public $email;
    public $alamat;
    public function store()
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ];
        $pesan = [
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ];
        $validatedData = $this->validate($rules, $pesan);
        ModelsPendaftaran::create($validatedData);
        session()->flash('message', 'Data berhasil disimpan');
    }
    public function render()
    {
        return view('livewire.pendaftaran');
    }
}
