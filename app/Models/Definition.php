<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    /** @use HasFactory<\Database\Factories\DefinitionFactory> */
    use HasFactory, UUID;
}
