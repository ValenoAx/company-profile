<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sandal;
use Illuminate\Support\Facades\Storage;


class SandalController extends Controller
{
   public function index()
    {
        $sandal = Sandal::latest()->paginate(5);
    return view('admin.pages.sandal.sandal', compact('sandal'));
    }

    public function create() {
        $sandal = Sandal::get();

        return view('admin.pages.formSandal', compact('sandal'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_sandal' => 'required|string|max:100',
        'gambar' => 'required|image|max:2048',
        'ukuran' => 'required|in:36,37,38,39,40,41,42,43',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
    ]);

    // Simpan file gambar
    $gambar = $request->file('gambar')
                      ->store('sandal', 'public');

    // Simpan data ke database
    Sandal::create([
        'nama_sandal' => $request->nama_sandal,
        'gambar' => $gambar,
        'ukuran' => $request->ukuran,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'stok' => $request->stok,
    ]);

    return redirect()
        ->route('admin.sandal.index')
        ->with('success', 'Data Sandal Berhasil Ditambahkan');
}

public function edit($id) {
        $sandal =Sandal::find($id);
        return view('Admin.pages.updateSandal', compact('sandal'));
    }

    public function update(Request $request, Sandal $sandal)
{
    $request->validate([
        'nama_sandal' => 'required|max:100',
        'gambar'      => 'nullable|image|max:2048',
        'ukuran'      => 'required|in:36,37,38,39,40,41,42,43',
        'deskripsi'   => 'required|string',
        'harga'       => 'required|numeric',
        'stok'        => 'required|numeric',
    ]);

    $gambar = $sandal->gambar;

    if ($request->hasFile('gambar')) {

        // Hapus gambar lama jika ada
        if ($sandal->gambar && Storage::disk('public')->exists($sandal->gambar)) {
            Storage::disk('public')->delete($sandal->gambar);
        }

        // Simpan gambar baru
        $gambar = $request->file('gambar')->store('sandal', 'public');
    }

    $sandal->update([
        'nama_sandal' => $request->nama_sandal,
        'gambar'      => $gambar,
        'ukuran'      => $request->ukuran,
        'deskripsi'   => $request->deskripsi,
        'harga'       => $request->harga,
        'stok'        => $request->stok,
    ]);

    return redirect()
        ->route('admin.sandal.index')
        ->with('success', 'Data Sandal Berhasil Diubah');
}
        public function destroy(Sandal $sandal)
    {
        //hapus gambar
        if (Storage::disk('public')->exists($sandal->gambar)) {
            Storage::disk('public')->delete($sandal->gambar);
        }

        $sandal->delete();

        return redirect()->route('admin.sandal.index')->with('success', 'Data anda berhasil dihapus');
    }

}
