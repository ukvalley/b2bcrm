<nav class="nav nav-pills">
                    

                    @if(isset($student))


                     <a class="nav-link {{ request()->routeIs('agent.StudentBasicUpdate') ? 'active' : '' }}" href="{{ route('agent.StudentBasicUpdate', ['student_id' => $student->id]) }}">Personal Information</a>

                    <a class="nav-link {{ request()->routeIs('agent.student_academic') ? 'active' : '' }}" href="{{ route('agent.student_academic', ['student_id' => $student->id]) }}">Academic Achievement</a>


                    <a class="nav-link {{ request()->routeIs('agent.student_persona') ? 'active' : '' }}" href="{{ route('agent.student_persona', ['student_id' => $student->id]) }}">Student Persona</a>

                    <a class="nav-link {{ request()->routeIs('agent.StudentLeadTracking') ? 'active' : '' }}" href="{{ route('agent.StudentLeadTracking', ['student_id' => $student->id]) }}">Lead Tracking</a>

                    <a class="nav-link {{ request()->routeIs('agent.StudentStudyPreferance') ? 'active' : '' }}" href="{{ route('agent.StudentStudyPreferance', ['student_id' => $student->id]) }}">Study Pereferance</a>

                     <a class="nav-link {{ request()->routeIs('agent.StudentPersonalDetail') ? 'active' : '' }}" href="{{ route('agent.StudentPersonalDetail', ['student_id' => $student->id]) }}">Personal Details</a>

                    @else
                    <a class="nav-link {{ request()->routeIs('agent.student_basic') ? 'active' : '' }}" href="{{ route('agent.student_basic') }}">Student Profile</a>

                    @endif



</nav>

<hr>