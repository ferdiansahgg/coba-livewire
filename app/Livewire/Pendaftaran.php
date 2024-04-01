<?php

namespace App\Livewire;

use App\Models\Pendaftaran as ModelsPendaftaran;
use Livewire\Component;
use Livewire\WithPagination;

class Pendaftaran extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $nama;
    public $email;
    public $alamat;
    // public $dataPendaftar;
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
        $data = ModelsPendaftaran::orderBy('nama', 'ASC')->paginate(10);
        return view('livewire.pendaftaran', ['dataPendaftar' => $data]);
    }
}
