<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // Atur field mana yang boleh diisi
protected $fillable = [
    'judul',
    'keterangan',
    'selesai',
    'tanggal_selesai',
    'tanggal_mulai',
    'deadline',
    ];
}