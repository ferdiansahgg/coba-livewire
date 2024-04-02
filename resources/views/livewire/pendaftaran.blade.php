<div>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            
        @endif
        <!-- START FORM -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <form>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model='nama'>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" wire:model='email'>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model='alamat'>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        @if ($updateData == false)
                        <button type="button" class="btn btn-primary" name="submit" wire:click="store">SIMPAN</button>
                        @else
                        <button type="button" class="btn btn-primary" name="submit" wire:click="update">UPDATE</button>
                        @endif
                        <button type="button" class="btn btn-secondary" name="submit" wire:click="clear">CLEAR DATA</button>

                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM -->

        <!-- START DATA -->
        <h1>Data Penerima Beasiswa</h1>
        {{-- {{$dataPendaftar->links()}} --}}
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-4">Nama</th>
                        <th class="col-md-3">Email</th>
                        <th class="col-md-2">Alamat</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPendaftar as $key => $value)
                    <tr>
                        <td>{{$dataPendaftar->firstItem() + $key}}</td>
                        <td>{{$value->nama}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->alamat}}</td>
                        <td>
                            <a wire:click="edit({{$value->id}})" class="btn btn-warning btn-sm">Edit</a>
                            <a wire:click="deleteConfirm({{$value->id}})" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$dataPendaftar->links()}}

        </div>
        <!-- AKHIR DATA -->
        <!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-muted">Apakah anda yakin ingin menghapus data ini, Tindakan ini tidak dapat dibatalkan dan akan menghapus data secara permanen.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="delete">Ya, Hapus</button>
        </div>
      </div>
    </div>
  </div>
    </div>
</div>
