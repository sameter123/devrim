<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modules extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Timestamp;

    protected $table = 'modules';

    protected $fillable = [
        'name',
        'slug',
        'type',
        'status',
    ];
}
