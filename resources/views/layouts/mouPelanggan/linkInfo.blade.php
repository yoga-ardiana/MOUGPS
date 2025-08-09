@extends('main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <h5 class="card-header">Link MOU Pelanggan</h5>
                    <div class="card-body">
                        <h4>Link MOU untuk {{ $mou->namaPelanggan }}</h4>
                        <p>Bagikan link ini ke pelanggan agar mereka dapat melihat dan menandatangani MOU:</p>
                        <div class="input-group mb-3">
                            <input type="text" id="linkMou" value="{{ $link }}" class="form-control" readonly>
                            <button class="btn btn-primary" onclick="copyLink()">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function copyLink() {
            const input = document.getElementById('linkMou');
            input.select();
            document.execCommand('copy');
            alert('Link MOU berhasil disalin!');
        }
    </script>
@endsection
