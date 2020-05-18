<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = ['id'];

    public function applied($type)
    {
        if ($type == 1) {
            return JobApply::where('person_id', $this->id)->first();
        }
        if ($type == 2) {
            return LoanApply::where('person_id', $this->id)->first();
        }
        if ($type == 3) {
            return InsuranceApply::where('person_id', $this->id)->first();
        }
    }
}
