<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCreator;

class Donation extends Model
{
	use HasCreator;

    /**
     * Disable Mass Assignment Protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Define the campaign relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign()
    {
    	return $this->belongsTo(Campaign::class);
    }
}
