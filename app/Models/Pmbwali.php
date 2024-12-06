<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmbwali extends Model
{
    use HasFactory;
    protected $table = 'pmb_wali';
    protected $primaryKey = 'id_wali';
    protected $guarded = ['id_wali'];
    public $timestamps = false;
}
