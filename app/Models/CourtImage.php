<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtImage extends Model
{
    /** @use HasFactory<\Database\Factories\CourtImageFactory> */
    use HasFactory, UUID;

    protected $table = 'court_images';

    protected $fillable = [
        'court_id',
        'order',
        'file_path'
    ];
}
