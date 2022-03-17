<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Education;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Livewire\Component;

class Categories extends Component
{
    public $category_name, $created_at;
    public $edit_make;
    public $isModalOpen = 0;


    public function render()
    {
        $categories = Category::paginate(3);
        return view('livewire.teachers.teachers', [
            'Categories' => $categories,
        ]);
    }
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->edit_make  = "Maak categorie";
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->category_name = '';
        $this->created_at = '';
    }

    public function store()
    {
        $this->validate([
            'category_name' => 'required',
            'created_at' => 'required',
        ]);

        Category::updateOrCreate(['id' => $this->id ], [
            'name' => $this->category_name,
            'created_at' => $this->created_at,
        ]);

        session()->flash('message', $this->id ? 'Docent aangepast.' : 'Docent aangemaakt.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($number)
    {
        $category = Category::findOrFail($number);
        $this->id = $number;
        $this->category_name = $category->category_name;
        $this->created_at = $category->created_at;
        $this->edit_make = "Verander docent";
        $this->openModalPopover();
    }

    public function delete($number)
    {
        Category::find($number)->delete();
        session()->flash('message', 'Opleiding verwijderd.');
    }
}

