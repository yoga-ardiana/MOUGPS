@extends('main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <h5 class="card-header">Memorandum of Understanding</h5>
                    <div class="card-body">
                        <p><strong>Nama Pelanggan:</strong> {{ $mou->namaPelanggan }}</p>
                        <p><strong>Email:</strong> {{ $mou->email }}</p>
                        <p><strong>Telepon:</strong> {{ $mou->telp }}</p>
                        <p><strong>Produk:</strong> {{ $mou->deskripsiProduk }}</p>
                        <p><strong>Catatan:</strong> {{ $mou->note }}</p>
                    </div>
                </div>
                {{-- Canvas Tanda Tangan --}}
                <div class="card">
                    <div class="card-header">
                        <h5>Tanda Tangan</h5>
                    </div>
                    <div class="card-body text-center">
                        <canvas id="signature-pad" class="border" width="400" height="200"></canvas>
                        <div class="mt-3">
                            <button id="clear-signature" class="btn btn-warning">Hapus</button>
                            <button id="save-signature" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="signature-form" action="{{ route('mouPelanggan.saveSignature', $mou->id) }}" method="POST"
        style="display:none;">
        @csrf
        <input type="hidden" name="signature" id="signature-input">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.5/dist/signature_pad.umd.min.js"></script>
    <script>
        const canvas = document.getElementById('signature-pad');
        const signaturePad = new SignaturePad(canvas);
        const clearBtn = document.getElementById('clear-signature');
        const saveBtn = document.getElementById('save-signature');
        const signatureInput = document.getElementById('signature-input');
        const form = document.getElementById('signature-form');

        clearBtn.addEventListener('click', function() {
            signaturePad.clear();
        });

        saveBtn.addEventListener('click', function() {
            if (signaturePad.isEmpty()) {
                alert('Silakan tanda tangan terlebih dahulu.');
            } else {
                const dataUrl = signaturePad.toDataURL(); // PNG base64
                signatureInput.value = dataUrl;
                form.submit();
            }
        });
    </script>
@endsection
