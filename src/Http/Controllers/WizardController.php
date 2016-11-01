<?php

namespace Acacha\Wizard\Http\Controllers;

use Acacha\Wizard\Wizard;
use Acacha\Wizard\WizardManager;
use \Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class WizardController
 */
class WizardController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var WizardManager
     */
    protected $manager;

    /**
     * WizardController constructor.
     *
     * @param $manager
     */
    public function __construct(WizardManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param $wizard
     */
    public function init(Wizard $wizard)
    {
//        dd($wizard->name);
        //wizard ja contindrà el wizard al funcionar per SLUG/name la ruta

        //Recuperar el wizard de la sessió. 1 wizard per usuari
//        echo "TODO INIT";
        return view('acacha_wizard::wizard');
    }


    /**
     * @param Wizard $wizard
     * @param $step_id
     */
    public function step(Wizard $wizard, $step_id)
    {
        //wizard ja contindrà el wizard al funcionar per SLUG/name la ruta

        //Recuperar el wizard de la sessió. 1 wizard per usuari
        return $this->manager->stepInfo($wizard,$step_id);
    }
}