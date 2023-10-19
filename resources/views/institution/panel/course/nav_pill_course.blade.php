<nav class="nav nav-pills">
                    

                    @if(isset($course))


                     <a class="nav-link {{ request()->routeIs('institution.CourseBasicUpdate') ? 'active' : '' }}" href="{{ route('institution.CourseBasicUpdate', ['course_id' => $course->id]) }}"> Resistration 1</a>

                    <a class="nav-link {{ request()->routeIs('institution.course_Basic2') ? 'active' : '' }}" href="{{ route('institution.course_Basic2', ['course_id' => $course->id]) }}">Resistration 2</a>


                    <a class="nav-link {{ request()->routeIs('institution.course_basic3') ? 'active' : '' }}" href="{{ route('institution.course_basic3', ['course_id' => $course->id]) }}">Resistration 3</a>



                    @else
                    <a class="nav-link {{ request()->routeIs('institution.course_basic') ? 'active' : '' }}" href="{{ route('institution.course_basic') }}">Course Basic Registration</a>

                    @endif

</nav>

<hr>