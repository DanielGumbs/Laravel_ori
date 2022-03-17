<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Education;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class Teachers extends Component
{
    public $name, $created_at;
    public $edit_make;
    public $isModalOpen = 0;
    public $count_teachers;


    public function render()
    {
        $teachers = Teacher::paginate(3);
        return view('livewire.teachers.teachers', [
            'teachers' => $teachers,
        ]);
    }
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->edit_make  = "Maak Docent";
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
        $this->name = '';
        $this->created_at = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'created_at' => 'required',
        ]);

        Teacher::updateOrCreate(['id' => $this->id ], [
            'name' => $this->name,
            'created_at' => $this->created_at,
        ]);

        session()->flash('message', $this->id ? 'Docent aangepast.' : 'Docent aangemaakt.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($number)
    {
        $teacher = Teacher::findOrFail($number);
        $this->id = $number;
        $this->name = $teacher->name;
        $this->created_at = $teacher->created_at;
        $this->edit_make = "Verander docent";
        $this->openModalPopover();
    }

    public function delete($number)
    {
        Teacher::find($number)->delete();
        session()->flash('message', 'Opleiding verwijderd.');
    }
}

