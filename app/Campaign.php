<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCreator;

class Campaign extends Model
{
    use HasCreator;

	/**
	 * Remove Mass Assignment protection. This should be enabled really,
	 * but for the sake of speed and demonstration, it's been turned
	 * off. Fillable fields are the best practice to be used.
	 *
	 * @var array
	 */
    protected $guarded = [];

    /**
     * Specify which field should be used during route-model binding.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
    	return 'uuid';
    }

    /**
     * Define the cover image relationship.
     *
     * @return Illuminate\Database\Eloquent\Relationships\HasOne
     */
    public function coverImage()
    {
    	return $this->hasOne(Asset::class, 'cover_image_id');
    }

    /**
     * Define the comments polymorphic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
