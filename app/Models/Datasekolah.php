<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasekolah extends Model
{
    use HasFactory;
    protected $table = 'data_sekolah';
    protected $primaryKey = 'id_data_sekolah';
    protected $guarded = ['id_data_sekolah'];
    public $timestamps = false;
}
