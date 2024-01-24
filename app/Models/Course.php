<?php

namespace App\Models;

use App\Enums\PublishedStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Naykel\Gotime\Casts\MoneyCast;

class Course extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => MoneyCast::class,
        'status' => PublishedStatus::class,
    ];
}
