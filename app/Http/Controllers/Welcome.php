<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\posts;

class Welcome extends Component
{

    
    public $limit = 10,$search;
    protected $queryString = ['search'];

    public function LoadMore() {
        $this->limit += 10;
    }

    public function delete($id) {
        posts::find($id)->delete();

        session()->flash('message', 'Post deleted successfully. ');
    }

    public $name,$description;

    public function SelectToUpdate(posts $post){
        $this->name = $post->name;
        $this->description = $post->description;
    }

    public function update(posts $post) {
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $post->update($validatedData);
      
    }
    public function render()
    {
        $array = [
            'posts' => posts::where('name', 'LIKE' , '%'.$this->search.'%')
            ->orWhere('description', 'LIKE' , '%'.$this->search.'%')
            ->latest()
            ->paginate($this->limit)
        ];
        return view('welcome' , $array)->extends('layout.app');
    }
}
