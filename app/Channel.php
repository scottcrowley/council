<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $guarded = [];

    /**
     * Get the route key name for Laravel
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * a channel has many threads
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}
