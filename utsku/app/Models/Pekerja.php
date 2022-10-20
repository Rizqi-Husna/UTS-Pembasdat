<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerja extends Model
{
    use HasFactory;

    protected $table = 'pekerjas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Id_Pekerja','NamaPekerja','Alamat'
    ];
}
