<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\posts;

class Create extends Component
{
    public $name, $description;


    
    public function submit() {
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        posts::create($validatedData);
    }
    public function render()
    {
        return view('create');
    }
}
