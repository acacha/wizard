<?php

namespace Acacha\Wizard;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    /**
     * The wizards that belong to the step.
     */
    public function wizards()
    {
        return $this->belongsToMany(Wizard::class);
    }
}
