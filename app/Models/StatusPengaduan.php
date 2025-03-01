<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusPengaduan extends Model
{
    use HasFactory;

    protected $table = 'status_pengaduan';
    protected $primaryKey = 'id_status';
    public $timestamps = false;

    protected $fillable = ['nama_status'];

    /**
     * Relasi ke Pengaduan
     */
    public function pengaduan(): HasMany
    {
        return $this->hasMany(Pengaduan::class, 'id_status', 'id_status');
    }
}
