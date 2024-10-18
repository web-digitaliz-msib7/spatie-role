<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class category extends Model
{
    use HasFactory, HasRoles ;

    protected $fillable = ['name'];

    public function scopeFilter($query, $params)
    {
        // search for budget item
        $query->when(@$params['search'], function ($query, $search) {
            $query->where('name', 'LIKE', "%{$search}%");
        });
    }

}

