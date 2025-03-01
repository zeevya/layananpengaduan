<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    public $timestamps = false; // Jika tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'id_user',
        'id_divisi',
        'id_kategori',
        'id_status',
        'nama_pengadu',
        'tanggal_lahir_pengadu',
        'alamat_pengadu',
        'jenis_kelamin',
        'tanggal_pengaduan',
        'deskripsi',
        'status',
    ];

    /**
     * Relasi ke User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    /**
     * Relasi ke Divisi
     */
    public function divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class, 'id_divisi', 'id_divisi');
    }

    /**
     * Relasi ke Kategori Pengaduan
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriPengaduan::class, 'id_kategori', 'id_kategori');
    }

    /**
     * Relasi ke Status Pengaduan
     */
    public function statusPengaduan(): BelongsTo
    {
        return $this->belongsTo(StatusPengaduan::class, 'id_status', 'id_status');
    }
}