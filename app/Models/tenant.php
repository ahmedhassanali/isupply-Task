<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tenant extends Model 
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    
    //tenant HasMany Users
    public function user()
    {
     return $this->hasMany(user::class);
    }
}
