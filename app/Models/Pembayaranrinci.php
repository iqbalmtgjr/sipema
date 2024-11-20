<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaranrinci extends Model
{
    use HasFactory;
    protected $table = 'pembayaran_rinci';
    protected $primaryKey = 'id_pembayaran_rinci';
    protected $guarded = ['id_pembayaran_rinci'];
    public $timestamps = false;
}
