<?php

namespace App\Livewire;

use Livewire\Component;

class Pendaftaran extends Component
{
    public $nama = 'Ferdiansah';
    public $email = 'Ferdiansah@gmail.com';
    public $alamat = 'Jalan bangka 2 no 3';
    public function render()
    {
        return view('livewire.pendaftaran');
    }
}
