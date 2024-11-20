<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmbinfo extends Model
{
    use HasFactory;
    protected $table = 'pmb_info';
    protected $primaryKey = 'id_info';
    protected $guarded = ['id_info'];
    public $timestamps = false;
}
