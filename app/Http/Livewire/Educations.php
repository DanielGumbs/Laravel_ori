<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Education;
use App\Models\Teacher;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Location;
use Illuminate\Http\Request;


class Educations extends Component
{
    use WithPagination;

    public $education_name, $description, $date, $starttime, $endtime, $amount, $people, $education_id;
    public $teacher_id;
    public $category_id;
    public $edit_make, $count_teachers;
    public $isModalOpen = 0;
    public $search;
    public $teacher_dropdown, $category_dropdown;

    public function render()
    {
        return view('livewire.educations.educations', [
            'educations' => Education::where('education_name', 'like', '%'.$this->search.'%')
                ->when($this->teacher_dropdown, function ($query) {
                    return $query->where('teacher_id', $this->teacher_dropdown);
                })->when($this->category_dropdown, function ($query) {
                    return $query->where('category_id', $this->category_dropdown);
                })->paginate(7),
            'teachers' => Teacher::all()->sortBy('name'),
            'categories' => Category::all()->sortBy('category_name'),
        ]);
    }


    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->edit_make = "Maak opleiding";
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->education_name = '';
        $this->description = '';
        $this->date = '';
        $this->starttime = '';
        $this->endtime = '';
        $this->amount = '';
        $this->teacher_id = '';
        $this->category_id = '';
        $this->people = '';
    }

    public function store()
    {
        $this->validate([
            'education_name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
            'amount' => 'required',
            'teacher_id' => 'required',
            'category_id' => 'required',
            'people' => 'required',
        ]);

        Education::updateOrCreate(['id' => $this->education_id], [
            'education_name' => $this->education_name,
            'description' => $this->description,
            'date' => $this->date,
            'starttime' => $this->starttime,
            'endtime' => $this->endtime,
            'amount' => $this->amount,
            'teacher_id' => $this->teacher_id,
            'category_id' => $this->category_id,
            'people' => $this->people,
        ]);
        session()->flash('message', $this->education_id ? 'Opleiding aangepast.' : 'Opleiding aangemaakt.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $education = Education::findOrFail($id);
        $this->education_id = $id;
        $this->education_name = $education->education_name;
        $this->description = $education->description;
        $this->date = $education->date;
        $this->starttime = $education->starttime;
        $this->endtime = $education->endtime;
        $this->amount = $education->amount;
        $this->people = $education->people;
        $this->teacher_id = $education->teacher->teacher_name;
        $this->category_id = $education->category->category_name;
        $this->edit_make = "Edit opleiding";
        $this->openModalPopover();
    }

    public function delete($id)
    {
        Education::find($id)->delete();
        session()->flash('message', 'Opleiding deleted.');
    }

    public function view_educations($id) {
        return redirect()->route('view_educations.index', ['id' => $id]);
    }
}


