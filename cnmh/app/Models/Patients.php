<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = ['nom','prenom','telephone','gender','handicape','date'];
}
