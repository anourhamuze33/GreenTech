<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password'];

    public function favorites():BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
