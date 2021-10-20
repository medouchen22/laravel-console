<?php

namespace App\Models;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function posts(){

        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    public function scopeDernier(Builder $query){

        return $query->orderBy(static::UPDATED_AT, 'desc');
        
    }


    protected static function booted()
    {
        
        parent::boot();
        static::addGlobalScope(new LatestScope);

    }
}
