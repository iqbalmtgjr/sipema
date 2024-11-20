<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmbupload extends Model
{
    use HasFactory;
    protected $table = 'pmb_upload';
    protected $primaryKey = 'id_upload';
    protected $guarded = ['id_upload'];
    public $timestamps = false;
}
