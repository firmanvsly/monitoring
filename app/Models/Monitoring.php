<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $table = 'monitoring';

    protected $fillable = ['nama', 'nomer', 'alamat', 'meteran_bulan_ini', 'meteran_bulan_lalu'];
}
