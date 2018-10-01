<?php

namespace App\Policies;

use App\User;
use App\Reply;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    /**
     * determine if an authenticated user has permissions to update a reply
     *
     * @param User $user
     * @param Reply $reply
     * @return bool
     */
    public function update(User $user, Reply $reply)
    {
        return $reply->user_id == $user->id;
    }

    /**
     * determines if a user is publishing replies too frequently
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        $lastReply = $user->fresh()->lastReply;

        if (!$lastReply) {
            return true;
        }

        return !$lastReply->wasJustPublished();
    }
}
