<nav class="nav nav-pills">
                    

                    @if(isset($institution))


                     <a class="nav-link {{ request()->routeIs('institution.courseBasicUpdate') ? 'active' : '' }}" href="{{ route('institution.CourseBasicUpdate', ['student_id' => $student->id]) }}">Academic Achievement</a>

                    <a class="nav-link {{ request()->routeIs('institution.course_basic2') ? 'active' : '' }}" href="{{ route('institution.course_basic2', ['course_id' => $course_id]) }}">Academic Achievement</a>


                    <a class="nav-link {{ request()->routeIs('institution.cousece_persona') ? 'active' : '' }}" href="{{ route('institution.course_persona', ['student_id' => $student->id]) }}">Student Persona</a>



                    @else
                    <a class="nav-link {{ request()->routeIs('institution.course_basic') ? 'active' : '' }}" href="{{ route('institution.course_basic') }}">Course Basic Registration</a>

                    @endif



</nav>

<hr>