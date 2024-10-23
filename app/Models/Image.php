<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'path',
        'image_type_id',
        'name',
    ];

    protected $table = 'images';

    public function getFullPathAttribute()
    {
        return asset('storage/' . $this->path);
    }

    public function imageType()
    {
        return $this->belongsTo(ImageType::class);
    }
}
