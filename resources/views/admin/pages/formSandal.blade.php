@extends('admin.index')
@section('content')
<div>
    <h1>Form Input Sandal</h1>
    <a href="{{ route('admin.sandal.index') }}" class="btn btn-secondary" >Kembali</a>

@if ($errors->any())
    <div style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.sandal.store') }}" method="post" enctype="multipart/form-data">
    @csrf
<div class="mb-3">
            <label for="nama_sandal" class="form-label-custom">Nama Sandal</label>
            <input type="text" class="form-control-custom" name="nama_sandal" id="nama_sandal" placeholder="Nama Sandal">
          </div>    <input type="file" name="gambar" accept="image/*" required>

    <div class="mb-3">
            <label for="ukuran" class="form-label-custom">Ukuran</label>
            <select class="form-select-custom" name="ukuran" id="ukuran">
              <option selected disabled>Pilih Ukuran...</option>
              <option value="36">36</option>
              <option value="37">37</option>
              <option value="38">38</option>
              <option value="39">39</option>
              <option value="40">40</option>
              <option value="41">41</option>
              <option value="42">42</option>
              <option value="43">43</option>
            </select>
          </div>

<div class="mb-3">
            <label for="deskripsi" class="form-label-custom">Deskripsi</label>
            <textarea class="form-control-custom" name="deskripsi" id="deskripsi" rows="3"
              placeholder="Deskripsi..."></textarea>
          </div>
<div class="mb-3">
            <label for="harga" class="form-label-custom">Harga</label>
            <input type="number" class="form-control-custom" name="harga" id="harga" placeholder="Harga">
          </div>
          <div class="mb-3">
             <label for="stok" class="form-label-custom">Stok</label>
            <input type="number" class="form-control-custom" name="stok" id="stok" placeholder="Stok">
            </div>
    <button type="submit" class="btn btn-success">Tambah</button>
</form>
</div>
@endsection
