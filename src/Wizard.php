<?php

namespace Acacha\Wizard;

use Illuminate\Database\Eloquent\Model;

class Wizard extends Model
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * The steps that belong to the wizard.
     */
    public function steps()
    {
        return $this->belongsToMany(WizardStep::class);
    }
}
