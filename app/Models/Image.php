<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'name',
    ];

    protected $table = 'images';

    public function getFullPathAttribute()
    {
        return asset('storage/' . $this->path);
    }
}
