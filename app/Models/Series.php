<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';
    protected $fillable = ['nome', 'cover'];
    protected $appends = ['links'];
    // serialização | links como parte do modelo, n está no banco

    public function seasons()
    {
        return $this->hasMany(Season::class, "series_id");
    }

    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Season::class);
    }

    public static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuid) {
            $queryBuid->orderBy('nome');
        });
    }

    public function links(): Attribute
    {
        return new Attribute(
            get: fn () => [
                [
                    'rel' => "self",
                    'url' =>"/api/serie/{$this->id}"

                ],
                [
                    'rel' => "seasons",
                    'url' =>"/api/serie/{$this->id}/seasons"

                ],
                [
                    'rel' => "episode",
                    'url' =>"/api/serie/{$this->id}/episode"

                ]
            ]
        );
    }
}