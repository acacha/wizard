<?php

namespace spec\Acacha\Wizard;

use Acacha\Wizard\Wizard;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WizardSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Wizard::class);
    }
}
