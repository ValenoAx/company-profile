@extends('admin.index')

@section('content')
<style>
    .table-data {
        margin: 20px;
    }
    table {
        border: 1px solid black;
        width: 100%;
        max-width: 1000px;
        border-collapse: collapse;
        text-align: center;
        margin-top: 10px;
    }
    tr, th, td {
        border: 1px solid black;
        padding: 10px 12px;
    }
    /* Merapikan pagination */
    .pagination-wrap {
        margin-top: 15px;
        max-width: 1000px;
    }
    .pagination-wrap svg {
        width: 20px;
        height: 20px;
    }
</style>

<h1>Sandal</h1>
<div class="pembungkus">
    <div class="tombol-tambah">
        <a href="{{ route('admin.sandal.create') }}" class="btn btn-success">Tambah Sandal</a>
    </div>

    <div class="tabel-data">
        <table>
            <tr>
                <th>No</th>
                <th>Nama Sandal</th>
                <th>Gambar</th>
                <th>Ukuran</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            @forelse ($sandal as $item)
            <tr>
                {{-- Nomor lanjut antar halaman: 1-5, 6-10, dst --}}
                <td>{{ $sandal->firstItem() + $loop->index }}</td>
                <td>{{ $item->nama_sandal }}</td>
                <td><img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_sandal }}" width="150"></td>
                <td>{{ $item->ukuran }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    <a href="{{ route('admin.sandal.edit', $item->id) }}" class="btn btn-warning">Update</a>
                    <form action="{{ route('admin.sandal.delete', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-3"
                                onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">Data Tidak Diketahui</td>
            </tr>
            @endforelse
        </table>

        {{-- Pagination --}}
        <div class="pagination-wrap">
            {{ $sandal->links() }}
        </div>
    </div>
</div>
@endsection
