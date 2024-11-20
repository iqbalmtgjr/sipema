<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmbakun extends Model
{
    use HasFactory;
    protected $table = 'pmb_akun';
    protected $primaryKey = 'id_akun_siswa';
    protected $guarded = ['id_akun_siswa'];
    public $timestamps = false;
}
