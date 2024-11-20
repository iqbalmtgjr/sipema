<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmbortu extends Model
{
    use HasFactory;
    protected $table = 'pmb_ortu';
    protected $primaryKey = 'id_ortu';
    protected $guarded = ['id_ortu'];
    public $timestamps = false;
}
