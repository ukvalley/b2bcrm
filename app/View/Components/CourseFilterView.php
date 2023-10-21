<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Course;

class CourseFilterView extends Component
{
    public $student;
    public $search;
    public $country;
    public $intake;
    public $courses;

    public function __construct($student,$courses)
    {
        $this->student = $student;
        $this->courses = $courses;

        if(isset($_GET['search']))
        {
            $this->search = $_GET['search'];
        }
        if(isset($_GET['intake']))
        {
            $this->intake = $_GET['intake'];
        }
        if(isset($_GET['country']))
        {
            $this->country = $_GET['country'];
        }
    }

    public function search()
{
    // Retrieve and handle the search criteria (this is just a simplified example)
    $courses = Course::query()
        ->where('name', 'like', "%{$this->search}%")
        ->get();

    // Pass the search results to a view or emit an event
        $this->courses = $courses;
}

    public function render()
    {
        $this->search();
        return view('components.course-filter-view');
    }
}
