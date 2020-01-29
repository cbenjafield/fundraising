<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCreator;

class Asset extends Model
{
    use HasCreator;
    
	/**
	 * Disable Mass Assignment protection.
	 *
	 * @var array
	 */
    protected $guarded = [];
}
