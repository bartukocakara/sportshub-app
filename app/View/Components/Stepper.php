<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Stepper extends Component
{
    public $currentStep;
    public $showLastStep;

    public function __construct($currentStep = 1, $showLastStep = false)
    {
        $this->currentStep = (int) $currentStep;
        $this->showLastStep = filter_var($showLastStep, FILTER_VALIDATE_BOOLEAN);
    }

    public function render()
    {
        return view('components.stepper');
    }
}

