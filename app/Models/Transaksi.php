<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_sandal',
        'id_pelanggan',
        'id_users',
        'total_bayar',
        'status'

    ];

    public function sandal()
    {
        return $this->belongsTo(Sandal::class, 'id_sandal');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
