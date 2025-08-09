<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Deskripsi Produk</th>
                <th>Note</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mouPelanggans as $mouPelanggan)
                <tr>
                    <td>{{ $mouPelanggan->id }}</td>
                    <td>{{ $mouPelanggan->namaPelanggan }}</td>
                    <td>{{ $mouPelanggan->email }}</td>
                    <td>{{ $mouPelanggan->telp }}</td>
                    <td>{{ $mouPelanggan->deskripsiProduk }}</td>
                    <td>{{ $mouPelanggan->note }}</td>
                    <td>
                        <a href="{{ route('mouPelanggan.linkInfo', $mouPelanggan->id) }}" class="btn btn-info">
                            Show Link
                        </a>
                        <a href="{{ route('mouPelanggan.edit', $mouPelanggan->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('mouPelanggan.destroy', $mouPelanggan->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
