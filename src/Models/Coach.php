<?php

namespace Marcusmyers\TeamManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Marcusmyers\TeamManager\Database\Factories\CoachFactory;

class Coach extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'coaches';

    public function teams()
    {
        return $this->belongsToMany('Marcusmyers\TeamManager\Models\Team');
    }

    public function getFirstNameAttribute()
    {
        return ucfirst(collect(explode(' ', $this->name))->first());
    }

    public function getLastNameAttribute()
    {
        return ucfirst(collect(explode(' ', $this->name))->last());
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public static function newFactory()
    {
        return CoachFactory::new();
    }
}
