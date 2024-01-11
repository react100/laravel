<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'user_type'
    ];
    protected $hidden = [
        'create_at',
        'updated_at',
        'deleted_at',
    ];



}
