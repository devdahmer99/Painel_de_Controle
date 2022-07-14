<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static count()
 * @method static where(string $string, string $string1, string $dateLimit)
 * @method static select(string $string)
 */
class Visitor extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['visitor', 'data_access', 'page'];
}
