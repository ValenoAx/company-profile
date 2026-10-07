<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sandal extends Model
{
    //merelasikan table
    use HasFactory;

    protected $table = 'sandal';

    protected $fillable = [
        'nama_sandal',
        'gambar',
        'ukuran',
        'deskripsi',
        'harga',
        'stok'
    ];
    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'id_sandal');
    }
}
