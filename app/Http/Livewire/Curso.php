<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Curso as CursoDB;

class Curso extends Component
{
    public $error = null;
    public $curso;
    public $cursos = null;

    public function mount()
    {
        $this->cursos = CursoDB::all();

    }
    
    public function render()
    {
        return view('livewire.curso');
    }

    public function save()
    {
        //Guardar el curso
        if($this->curso != null && $this->curso != ''){
            CursoDB::create([
                'nombre' => $this->curso,
            ]);
            $this->error = '';
            $this->curso = '';

            //Cargar todos los cursos
            $this->cursos = CursoDB::all();
        }
        else{
            $this->error = "Debe Ingresar un nombre";
        }
    }

    public function eliminar($id)
    {
        //Eliminar el curso
        $cursoEliminar = CursoDB::find($id);
        $cursoEliminar->delete();
        //Cargar todos los cursos
        $this->cursos = CursoDB::all();
    }
}
