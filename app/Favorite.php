<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use RecordsActivity;
    /**
     * don't auto apply mass assignment protection
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * finds out the related favorited item
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function favorited()
    {
        return $this->morphTo();
    }
}
