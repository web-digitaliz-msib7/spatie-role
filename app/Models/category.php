<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class category extends Model
{
    use HasFactory, HasRoles ;

    protected $fillable = ['name'];
}
