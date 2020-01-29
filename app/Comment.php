<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCreator;

class Comment extends Model
{
    use HasCreator;
    
	/**
	 * Disable Mass Assignment Protection.
	 *
	 * @var array
	 */
    protected $guarded = [];

    /**
     * Define the commentable relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
    	return $this->morphTo();
    }
}
