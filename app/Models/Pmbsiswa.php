<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmbsiswa extends Model
{
    use HasFactory;
    protected $table = 'pmb_siswa';
    protected $primaryKey = 'id_siswa';
    protected $guarded = ['id_siswa'];
    public $timestamps = false;
}
