<?php

namespace MrShaneBarron\PhoneInput\View\Components;

use Illuminate\View\Component;

class PhoneInput extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('sb-phone-input::components.phone-input');
    }
}
