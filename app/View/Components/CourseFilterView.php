<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Course;
use App\Models\Batch;
use App\Models\Country;
use App\Models\institution;



class CourseFilterView extends Component
{
    public $student;
    public $search;
    public $country;
    public $intake;
    public $courses;
    public $isSeached;
    public $batches;
    public $countries;

    public function __construct($student,$courses)
    {
        $this->student = $student;
        $this->courses = $courses;

        if(isset($_GET['search']))
        {
            $this->search = $_GET['search'];
            $isSeached = true;
        }
        if(isset($_GET['intake']))
        {
            $this->intake = $_GET['intake'];
            $isSeached = true;
        }
        if(isset($_GET['country']))
        {
            $this->country = $_GET['country'];
            $isSeached = true;
        }
    }

    public function search()
{
    // Retrieve and handle the search criteria (this is just a simplified example)
    $courses = Course::query();

if (isset($this->search)) {
    $courses = $courses->where(function ($query) {
        $query->where('name', 'like', "%{$this->search}%")
            ->orWhereHas('institution', function ($query) {
                $query->where('name', 'like', "%{$this->search}%");
            });
    });
}


if (isset($this->country)) {
    $courses->whereIn('country', $this->country);
}

if (isset($this->intake)) {
    $courses->whereHas('CourseBatches', function ($query1) {
        $query1->where('status', 'active')
            ->whereIn('id', $this->intake);
    });
}


$courses = $courses->inRandomOrder()->paginate(10);



    // Pass the search results to a view or emit an event
        $this->courses = $courses;
}

    public function render()
    {
        $this->search();
        $this->batches = Batch::get();
        $this->countries = Country::get();
        return view('components.course-filter-view');
    }
}
