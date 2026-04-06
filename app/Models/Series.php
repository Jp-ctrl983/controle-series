<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';
    protected $fillable = ['nome', 'cover'];

    public function seasons()
    {
        return  $this->hasMany(Season::class, "series_id");
    }

    public static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuid) {
            $queryBuid->orderBy('nome');
        });
    }
}