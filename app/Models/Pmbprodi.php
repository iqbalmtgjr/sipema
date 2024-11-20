<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmbprodi extends Model
{
    use HasFactory;
    protected $table = 'pmb_prodi';
    protected $primaryKey = 'id_prodi_pmb';
    protected $guarded = ['id_prodi_pmb'];
    public $timestamps = false;
}
