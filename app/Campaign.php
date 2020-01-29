<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\HasCreator;

class Campaign extends Model
{
    use HasCreator;

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->generateUuid();
        });
    }

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

    /**
     * Get the campaign's URL
     *
     * @return string
     */
    public function url($path = null)
    {
        $path = !empty($path) ? "/{$path}" : null;
        return "/campaigns/{$this->uuid}{$path}";
    }

    /**
     * Generate a UUID for the campaign.
     *
     * @return void
     */
    protected function generateUuid()
    {
        $this->uuid = Str::uuid();
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function total()
    {
        return number_format($this->donations->sum('amount'), 2);
    }
}
