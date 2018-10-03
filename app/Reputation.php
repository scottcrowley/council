<?php

namespace App;

class Reputation
{
    const THREAD_WAS_PUBLISHED = 10;
    const REPLY_POSTED = 2;
    const BEST_REPLY_MARKED = 50;
    const REPLY_FAVORITED = 5;

    /**
     * Award reputation points to the given user
     *
     * @param User $user
     * @param integer $points
     * @return void
     */
    public static function award($user, $points)
    {
        $user->increment('reputation', $points);
    }

    /**
     * Reduce reputation points for the given user
     *
     * @param User $user
     * @param integer $points
     * @return void
     */
    public static function reduce($user, $points)
    {
        $user->decrement('reputation', $points);
    }
}