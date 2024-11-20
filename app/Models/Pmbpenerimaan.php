<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmbpenerimaan extends Model
{
    use HasFactory;
    protected $table = 'pmb_penerimaan';
    protected $primaryKey = 'id_penerimaan';
    protected $guarded = ['id_penerimaan'];
    public $timestamps = false;
}
