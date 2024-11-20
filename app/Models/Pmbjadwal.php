<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmbjadwal extends Model
{
    use HasFactory;
    protected $table = 'pmb_jadwal';
    protected $primaryKey = 'id_pmb_jadwal';
    protected $guarded = ['id_pmb_jadwal'];
    public $timestamps = false;
}
