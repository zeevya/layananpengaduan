<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPengaduan extends Model
{
    use HasFactory;
    protected $table = 'kategoripengaduan';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false; // Sesuaikan jika tabel tidak punya created_at & updated_at
}