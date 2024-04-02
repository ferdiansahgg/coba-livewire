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
                            <a wire:click="deleteConfirm({{$value->id}})" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$dataPendaftar->links()}}

        </div>
        <!-- AKHIR DATA -->
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    </div>
</div>
