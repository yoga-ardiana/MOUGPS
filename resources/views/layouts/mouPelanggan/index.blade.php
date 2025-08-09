@extends('main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <h5 class="card-header">MOU Pelanggan</h5>
                    <div class="card-body">
                        @if (!empty(session('status')))
                            <div class="alert alert-info alert-dismissible" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <p class="mb-4">Berikut adalah daftar MOU Pelanggan yang telah dibuat.</p>
                        <a href="{{ route('mouPelanggan.create') }}" class="btn btn-primary mb-3">Tambah MOU Pelanggan</a>
                        @include('layouts.mouPelanggan.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
