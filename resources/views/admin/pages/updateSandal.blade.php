 @extends('admin.index')
 @section('content')
<div>
        <div></div>
    <h1>Form Edit Sandal</h1>
    <a href="{{ route('admin.sandal.index') }}" class="btn btn-secondary">Kembali</a>
<form action="{{ route('admin.sandal.update', $sandal->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   <div class="mb-3">
            <label for="nama_sandal" class="form-label-custom">Nama Sandal</label>
            <input type="text" class="form-control-custom" name="nama_sandal" id="nama_sandal" value="{{ $sandal->nama_sandal }}" placeholder="Nama Sandal">
          </div>
<p>Gambar saat ini:</p>

<img src="{{ asset('storage/' .$sandal->gambar) }}" width="150" alt="{{ $sandal->gambar }}">

<p>Upload gambar baru (opsional):</p>
<div class="mb-0">
            <label for="gambar" class="form-label-custom">Gambar</label>
            <input type="file" class="form-control-custom" name="gambar" id="gambar" value="This field is read-only" readonly>
          </div>
     <div class="mb-3">
            <label for="ukuran" class="form-label-custom">Ukuran</label>
            <select class="form-select-custom" name="ukuran" id="ukuran">
              <option selected disabled>Pilih Ukuran...</option>
              <option value="36" {{$sandal->ukuran == '36' ? 'selected' : ''}} >36</option>
              <option value="37" {{$sandal->ukuran == '37' ? 'selected' : ''}} >37</option>
              <option value="38" {{$sandal->ukuran == '38' ? 'selected' : ''}} >38</option>
              <option value="39" {{$sandal->ukuran == '39' ? 'selected' : ''}} >39</option>
              <option value="40" {{$sandal->ukuran == '40' ? 'selected' : ''}} >40</option>
              <option value="41" {{$sandal->ukuran == '41' ? 'selected' : ''}} >41</option>
              <option value="42" {{$sandal->ukuran == '42' ? 'selected' : ''}} >42</option>
              <option value="43" {{$sandal->ukuran == '43' ? 'selected' : ''}} >43</option>
            </select>
          </div>

    <div class="mb-3">
            <label for="deskripsi" class="form-label-custom">Deskripsi</label>
            <textarea class="form-control-custom" name="deskripsi" id="deskripsi" rows="3"
              placeholder="Deskripsi...">{{ $sandal->deskripsi }}</textarea>
          </div>
    <div class="mb-3">
            <label for="harga" class="form-label-custom">Harga</label>
            <input type="number" class="form-control-custom" name="harga" id="harga" value="{{ $sandal->harga }}" placeholder="Harga">
          </div>
    <div class="mb-3">
            <label for="stok" class="form-label-custom">Stok</label>
            <input type="number" class="form-control-custom" name="stok" id="stok" value="{{ $sandal->stok }}" placeholder="Stok">
          </div>
    <button type="submit" class="btn btn-warning">Edit</button>
</form>
</div>
 @endsection

