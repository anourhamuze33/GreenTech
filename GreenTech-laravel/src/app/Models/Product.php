<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $fillable = ['name','description', 'supplier', 'price', 'stock', 'category_id'];
    protected $casts = ['name'=>'string', 'description'=>'string', 'supplier'=>'string', 'price'=>'float', 'stock'=>'int', 'price'=>'int'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    public function userFavorite(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    // use SoftDeletes;
}
