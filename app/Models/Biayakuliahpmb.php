<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biayakuliahpmb extends Model
{
    use HasFactory;
    protected $table = 'biaya_kuliah_pmb';
    protected $primaryKey = 'id_biayakuliahpmb';
    protected $guarded = ['id_biayakuliahpmb'];
    public $timestamps = false;
}
