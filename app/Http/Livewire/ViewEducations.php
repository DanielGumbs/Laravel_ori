<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Education;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Livewire\Component;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Location;

class ViewEducations extends Component
{
    public function render(Request $request)
    {
        $id = $request->route('id');
        return view('livewire.educations.view-educations',  [
            'education' => Education::where('id', '=', $id)->first(),
            'categories' => Category::all(),
            'teachers' => Teacher::all()
        ]);

    }

    public function back_educations()
    {
        redirect()->route('educations.index');
    }





}
