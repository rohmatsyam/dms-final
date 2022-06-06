<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CreateProduct extends Component
{
    public $attributes;    
    public function render()
    {
        $json = Storage::disk('public')->get('attributes.json');
        $this->attributes = json_decode($json);
        return view('livewire.create-product');
    }
}
