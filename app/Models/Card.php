<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(["title", "description"])]
class Card extends Model
{
    public function images(): HasMany {
        return $this->hasMany(Image::class);
    }
}
