<nav class="nav nav-pills">
                    
                    @if(isset($course))

                    <a class="nav-link {{ request()->routeIs('institution.CourseBasicUpdate') ? 'active' : '' }}" href="{{ route('institution.CourseBasicUpdate', ['course_id' => $course->id]) }}">Overview</a>
                    <a class="nav-link {{ request()->routeIs('institution.course_Basic2') ? 'active' : '' }}" href="{{ route('institution.course_Basic2', ['course_id' => $course->id]) }}">Course Details</a>
                    <a class="nav-link {{ request()->routeIs('institution.course_basic3') ? 'active' : '' }}" href="{{ route('institution.course_basic3', ['course_id' => $course->id]) }}">Admission Requirements</a>
                    <a class="nav-link ml-3 {{ request()->routeIs('institution.batchesDetails') ? 'active' : '' }}" href="{{ route('institution.batchesDetails', ['course_id' => $course->id]) }}">Batches Details</a>

                    @else
                    <a class="nav-link {{ request()->routeIs('institution.course_basic') ? 'active' : '' }}" href="{{ route('institution.course_basic') }}">Course Basic Registration</a>

                    @endif

</nav>

<hr>