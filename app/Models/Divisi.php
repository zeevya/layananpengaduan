<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisi'; // Sesuai nama tabel di database
    protected $primaryKey = 'id_divisi'; // Primary key tabel
    public $timestamps = false; // Jika tidak ada created_at dan updated_at

    protected $fillable = [
        'nama_divisi'
    ];
}