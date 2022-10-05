<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'purchase_price',
        'sale_price',
        'quantity',
        'created_by_user_id',
    ];
    
    //Global Scope
    protected static function booted()
    {
        parent::boot();
        
        static::addGlobalScope('created_by_user_id', function(Builder $builder){
            if (auth()->check()) {
                return $builder->where('created_by_user_id',auth()->id());
            }
        });
    }

    //product belongTo user
    public function user()
    {
       return $this->belongsTo(user::class);
    }
}
