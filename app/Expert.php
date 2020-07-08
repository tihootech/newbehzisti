<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['username'];

    public function getUsernameAttribute()
    {
        return $this->user->name ?? '';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
