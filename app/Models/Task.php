<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Li diem quins camps poden ser omplerts per l'usuari
    protected $fillable = ['titol', 'completada'];
}
