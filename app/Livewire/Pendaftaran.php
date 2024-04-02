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
    public $updateData = false;
    public $idPendaftar;
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
        $this->clear();
        session()->flash('message', 'Data berhasil disimpan');
    }
    public function edit($id)
    {
        $data = ModelsPendaftaran::find($id);
        $this->nama = $data->nama;
        $this->email = $data->email;
        $this->alamat = $data->alamat;
        $this->updateData = true;
        $this->idPendaftar = $id;
    }
    public function update()
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
        $data = ModelsPendaftaran::find($this->idPendaftar);
        $data->update($validatedData);
        session()->flash('message', 'Data berhasil diubah');
        $this->clear();
    }
    public function clear()
    {
        $this->nama = '';
        $this->email = '';
        $this->alamat = '';
        $this->updateData = false;
        $this->idPendaftar = '';
    }
    public function delete()
    {
        $id = $this->idPendaftar;
        ModelsPendaftaran::find($id)->delete();
        session()->flash('message', 'Data berhasil dihapus');
        $this->clear();
        return redirect()->to('/');
    }
    public function deleteConfirm($id)
    {
        $this->idPendaftar = $id;
    }
    public function render()
    {
        $data = ModelsPendaftaran::orderBy('nama', 'ASC')->paginate(10);
        return view('livewire.pendaftaran', ['dataPendaftar' => $data]);
    }
}
