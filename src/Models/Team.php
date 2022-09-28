<?php

namespace Marcusmyers\TeamManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Marcusmyers\TeamManager\Database\Factories\TeamFactory;
use Marcusmyers\TeamManager\Models\Athlete;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'teams';

    public function athletes()
    {
        return $this->belongsToMany('Marcusmyers\TeamManager\Models\Athlete');
    }

    public function coaches()
    {
        return $this->belongsToMany('Marcusmyers\TeamManager\Models\Coach');
    }

    public function schedules()
    {
        return $this->hasMany('Marcusmyers\TeamManager\Models\Schedule');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public static function newFactory()
    {
        return TeamFactory::new();
    }
}
