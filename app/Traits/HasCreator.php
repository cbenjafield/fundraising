<?php

namespace App\Traits;

use App\User;

trait HasCreator
{
	/**
     * Declare the creator relationship.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
    	return $this->belongsTo(User::class);
    }
}