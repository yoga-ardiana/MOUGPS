@extends('main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <h5 class="card-header">Create MOU Pelanggan</h5>
                <div class="card-body">
                    <form action="{{ route('mouPelanggan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="telp" name="telp" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsiProduk" class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" id="deskripsiProduk" name="deskripsiProduk" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control" id="note" name="note" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection