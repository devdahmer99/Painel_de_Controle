<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find()
 * @method static get()
 * @method static where(string $string, int|string $item)
 */
class Setting extends Model
{
    use HasFactory;

    public $timestamps = false;

}
