<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CategorySelect extends Component
{
    public $category;   
    public $selectedCategory = null;        
    public $selectedSubCategory = null;
    public $selectedSubSubCategory = null;

    public function render()
    {           
        $json = Storage::disk('public')->get('category.json');
        $this->category = json_decode($json);
        return view('livewire.category-select',['category'=>$this->category]);        
    }    

    public $category_id;
    protected $listeners = ['getCategory'];
    public function getCategory($value){
        if(!is_null($value)){
            $this->category_id = $value;
        }
    }
}
