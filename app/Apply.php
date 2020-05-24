<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['stat'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function getStatAttribute()
	{
		return __("stat{$this->status}");
	}
}
