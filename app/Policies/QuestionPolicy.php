<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return ($user->role === 1) ? true : null;
    }


    public function updateAndDelete(User $user, Question $question)
    {
        return $user->id === $question->user_id;
    }
}
