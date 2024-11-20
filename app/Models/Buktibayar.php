<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buktibayar extends Model
{
    use HasFactory;
    protected $table = 'bukti_bayar';
    protected $primaryKey = 'id_bukti_bayar';
    protected $guarded = ['id_bukti_bayar'];
    public $timestamps = false;
}
