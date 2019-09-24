<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'description', 'article', 'isActive'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
