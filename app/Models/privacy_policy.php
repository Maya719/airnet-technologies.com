<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class privacy_policy extends Model
{
    use HasFactory;

    protected $table ='privacy_policies';
    protected $fillable = ['language', 'policy'];

    public $timestamps = true;


}
