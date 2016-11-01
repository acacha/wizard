<?php

namespace Acacha\Wizard;

use Acacha\Wizard\Wizard;
use Illuminate\Http\Response;

/**
 * Class WizardManager
 * @package Acacha\Wizard
 */
class WizardManager
{

    /**
     * current step.
     *
     * @var
     */
    protected $step;

    /**
     * Wizard model.
     *
     * @var Wizard
     */
    protected $wizard;

    /**
     * WizardManager constructor.
     *
     * @param $step
     * @param $wizard
     */
    public function __construct($step, Wizard $wizard, Response $reponse)
    {
        $this->step = $step;
        $this->wizard = $wizard;
        $this->response = $reponse;
    }

    public function stepInfo(Wizard $wizard, $step_id)
    {
        $this->response->json([
            'step'          => $step_id,
            'step_uniqueid' => "todo/nameunicdelstep",
            'previous_step' =>  "TODO_API_URL",
            'next_step'     =>  "TODO_API_URL",
            'required_info' =>  "TODO",
        ]);
    }

    /**
     * Next step.
     */
    protected function next()
    {
        //validate current step
        $this->current()->validate();
        $this->step++;
//        $next_step = $this->steps->get($this->step);
    }

    /**
     * @return mixed
     */
    protected function current()
    {
        return $this->wizard->steps()->get($this->step);
    }


}