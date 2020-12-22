<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
 

    /**
     * Create a new component instance.
     *
     * @return void
     */
 
    

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert'); // render tới view alert nằm trong thư mục components
    }
}
