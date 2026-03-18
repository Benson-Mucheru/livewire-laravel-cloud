<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Donot extends Model
{
    use HasUuids;
    protected $fillable = [
        'user_id', 'title', 'difficulty', 'time', 'description', 'position'
    ];
}
