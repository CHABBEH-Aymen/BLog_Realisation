<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{

    /**
     * @Relation: Article belongs to a user 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
