<nav class="nav nav-pills">
                    

                    @if(isset($institution))


                     <a class="nav-link {{ request()->routeIs('institution.courseBasicUpdate') ? 'active' : '' }}" href="{{ route('institution.CourseBasicUpdate', ['student_id' => $student->id]) }}"> Resistration 1</a>

                    <a class="nav-link {{ request()->routeIs('institution.course_basic2') ? 'active' : '' }}" href="{{ route('institution.course_basic2', ['course_id' => $course_id]) }}">Resistration 2</a>


                    <a class="nav-link {{ request()->routeIs('institution.course_basic3') ? 'active' : '' }}" href="{{ route('institution.course_basic2', ['student_id' => $student->id]) }}">Resistration 3</a>



                    @else
                    <a class="nav-link {{ request()->routeIs('institution.course_basic') ? 'active' : '' }}" href="{{ route('institution.course_basic') }}">Course Basic Registration</a>

                    @endif



</nav>

<hr>