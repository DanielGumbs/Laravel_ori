<?php

namespace App\Http\Livewire\charts;
use App\Models\Category;
use App\Models\Education;
use App\Models\Teacher;
use Livewire\Component;
use Carbon\Carbon;
use function view;

class ChartJS extends Component
{
    public $foo;
    public $search, $search2;
    public $category_grafiek, $category_dropdown;
    public $teacher_grafiek, $teacher_dropdown;

    public function render()
    {
        return view('livewire.charts.chart_js' ,[
            'teachers' => Teacher::all()->sortBy('name'),
            'categories' => Category::all()->sortBy('category_name'),
            'categories_chart' =>  json_encode($this->getChartCategorydata()),
            'teachers_chart' => json_encode($this->getChartTeacherdata()),
            'date_chart' => json_encode($this->getChartDatedata()),
            'date_chart2' => json_encode($this->getChartDatedata2()),
        ]);
    }

    public function updatedTeachergrafiek()
    {
        $this->emit("refreshChartCategoryData", [
            'data' => $this->getChartCategorydata(),
        ]);
    }

    public function updatedCategorygrafiek()
    {
        $this->emit("refreshChartTeacherData", [
            'data' => $this->getChartTeacherdata(),
        ]);
    }

    public function updatedCategorydropdown()
    {
        $this->emit("refreshChartDateData", [
            'data' => $this->getChartDatedata(),
        ]);
    }

    public function updatedTeacherdropdown()
    {
        $this->emit("refreshChartDateData", [
            'data' => $this->getChartDatedata(),
        ]);
    }

    public function updatedSearch()
    {
        $this->emit("refreshChartDateData", [
            'data' => $this->getChartDatedata(),
        ]);
    }

    public function updatedSearch2()
    {
        $this->emit("refreshChartDate2Data", [
            'data' => $this->getChartDatedata2(),
        ]);
    }

    public function getChartTeacherdata() {
        $teachers = Teacher::all();

        $data = [];

        foreach ($teachers as $row) {
            $data['label'][] = $row->name;
            $data['data'][] = $row->educations->when($this->category_grafiek, function ($query) {
                return $query->where('category_id', $this->category_grafiek);
            })->count();
        }

        return $data;

    }

    public function getChartCategorydata() {

        $categories = Category::all();

        $data = [];

        foreach ($categories as $row) {
            $data['label'][] = $row->category_name;
            $data['data'][] = $row->educations->when($this->teacher_grafiek, function ($query) {
                return $query->where('teacher_id', $this->teacher_grafiek);
            })->count();
        }

        return $data;
    }

    public function getChartDatedata() {

        $labels = ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'];

        $data = [];

        $data['label'] = $labels;

        for ($i = 1; $i <= 12; $i++) {
            $data['data'][] = Education::whereMonth('date', '=', $i)->where('education_name', 'like', '%'.$this->search.'%')
                ->when($this->teacher_dropdown, function ($query) {
                    return $query->where('teacher_id', $this->teacher_dropdown);
                })->when($this->category_dropdown, function ($query) {
                    return $query->where('category_id', $this->category_dropdown);
                })->count();
        }

        return $data;
    }

    public function getChartDatedata2() {

        $labels2 = ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'];

        $data = [];

        $data['label'] = $labels2;

        for ($x = 1; $x <= 12; $x++) {
            $data['data'][] = Education::whereMonth('date', '=', $x)->where('education_name', 'like', '%'.$this->search2.'%')->count();
        }

        return $data;
    }

}
