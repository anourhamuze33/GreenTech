<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name'];
    protected $casts = ['name'=>'string'];


    public function product(): HasMany
    {
        return $this->hasMany(Category::class);
    }
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
}
