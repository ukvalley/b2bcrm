<nav class="nav nav-pills">
                    <a class="nav-link {{ request()->routeIs('agent.student_basic') ? 'active' : '' }}" href="{{ route('agent.student_basic') }}">Student Profile</a>

                    @if(isset($student))

                    <a class="nav-link {{ request()->routeIs('agent.student_academic') ? 'active' : '' }}" href="{{ route('agent.student_academic', ['student_id' => $student->id]) }}">Academic Achievement</a>


                    <a class="nav-link {{ request()->routeIs('agent.student_persona') ? 'active' : '' }}" href="{{ route('agent.student_persona', ['student_id' => $student->id]) }}">Academic Achievement</a>

                    <a class="nav-link {{ request()->routeIs('agent.StudentStudyPreferance') ? 'active' : '' }}" href="{{ route('agent.StudentStudyPreferance', ['student_id' => $student->id]) }}">Study Preferance</a>

                    

                    @endif

</nav>

<hr>