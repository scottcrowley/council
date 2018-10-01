<?php

namespace App\Filters;

use App\User;

class ThreadFilters extends Filters
{
    protected $filters = ['by', 'popular', 'unanswered'];

    /**
     * by
     *
     * @param string $username
     * @return Builder
     */
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

    /**
     * Filter the query accordingly to most popular threads
     *
     * @return Builder
     */
    protected function popular()
    {
        $this->builder->getQuery()->orders = []; //Clear out the any existing order statements

        return $this->builder->orderBy('replies_count', 'desc');
    }

    /**
     * Filter the query accordingly to threads with no replies
     *
     * @return Builder
     */
    protected function unanswered()
    {
        return $this->builder->where('replies_count', 0);
    }
}
