<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphTo;

trait Commentable
{
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
