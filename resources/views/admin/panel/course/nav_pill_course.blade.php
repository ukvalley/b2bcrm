<nav class="nav nav-pills">

    @if(isset($course))

    <a class="nav-link {{ request()->routeIs('admin.CourseBasicUpdate') ? 'active' : '' }}" href="{{ route('admin.CourseBasicUpdate', ['course_id' => $course->id]) }}">Overview</a>
    <a class="nav-link {{ request()->routeIs('admin.course_Basic2') ? 'active' : '' }}" href="{{ route('admin.course_Basic2', ['course_id' => $course->id]) }}">Course Details</a>
    <a class="nav-link {{ request()->routeIs('admin.course_basic3') ? 'active' : '' }}" href="{{ route('admin.course_basic3', ['course_id' => $course->id]) }}">Admission Requirements</a>
    <a class="nav-link ml-3 {{ request()->routeIs('admin.batchesDetails') ? 'active' : '' }}" href="{{ route('admin.batchesDetails', ['course_id' => $course->id]) }}">Batches Details</a>

    @else
    <a class="nav-link {{ request()->routeIs('admin.course_basic') ? 'active' : '' }}" href="{{ route('admin.course_basic') }}">Course Basic Registration</a>

    @endif

</nav>

<hr>