<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Curso extends Component
{
    public $contador = 0;
    
    public function render()
    {
        return view('livewire.curso');
    }

    public function incremento()
    {
        $this->contador++;
    }

    public function reinicio()
    {
        $this->contador = 0;
    }
}
