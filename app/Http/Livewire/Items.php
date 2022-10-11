<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Sub_category;

class Items extends Component
{
    public $catogries;
    public $catograyId = 1;
    public $sub_catograies;
    public $sub_catograyId;
    protected $listeners = ['connected' => 'connect'];
    public function connect( $id)
    {
        $this->catograyId = $id;
        // dd($this->sub_catograies = Sub_category::where('parent_id',$Id)->get());
             // return $this->sub_catograies = Sub_category::where('parent_id',$Id)->get();
             $categories = Category::find($id);
             $this->sub_catograies = $categories-> subCategories;

            //  $this->emit('postAdded', $sub_categories);
            // compact( ['sub_categories']);
            // return view('livewire.items',compact( ['sub_categories']));

            // foreach($sub_categories as $sub){
            //  dd( $sub->name );
            // }
        }


    public function mount(){
        // $this->catograyId=4;
            $this->connect($this->catograyId );


        // dd($categories);
        $this->catogries = Category::orderby('name')->get();
        // $this->changeEvent();
    }
    public function changeEvent(){
        $this->getSubCatogray();
    }
    public function getSubCatogray(){
        if($this->catograyId !=''){
            $this->sub_catograies = Sub_category::where('parent_id',$this->catograyId)->get();
        }else
        {
            $this->sub_catograies = [];
        }
    }

    public function render()
    {
        return view('livewire.items',);

    }
}
