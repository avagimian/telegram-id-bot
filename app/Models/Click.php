<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App/Models/Click
 *
 * @property int $id;
 * @property int $count;
 */

class Click extends Model
{
    use HasFactory;

    protected $fillable = [
        'count',
    ];
}
