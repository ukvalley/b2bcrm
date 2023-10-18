<nav class="nav nav-pills">
                    

                    @if(isset($instution))


                     <a class="nav-link {{ request()->routeIs('institution.StudentBasicUpdate') ? 'active' : '' }}" href="{{ route('institution.StudentBasicUpdate', ['student_id' => $student->id]) }}">Academic Achievement</a>

                    <a class="nav-link {{ request()->routeIs('institution.student_academic') ? 'active' : '' }}" href="{{ route('institution.student_academic', ['student_id' => $student->id]) }}">Academic Achievement</a>


                    <a class="nav-link {{ request()->routeIs('institution.student_persona') ? 'active' : '' }}" href="{{ route('institution.student_persona', ['student_id' => $student->id]) }}">Student Persona</a>

                    <a class="nav-link {{ request()->routeIs('institution.StudentLeadTracking') ? 'active' : '' }}" href="{{ route('institution.StudentLeadTracking', ['student_id' => $student->id]) }}">Lead Tracking</a>

                    <a class="nav-link {{ request()->routeIs('institution.StudentStudyPreferance') ? 'active' : '' }}" href="{{ route('institution.StudentStudyPreferance', ['student_id' => $student->id]) }}">Study Pereferance</a>

                     <a class="nav-link {{ request()->routeIs('institution.StudentPersonalDetail') ? 'active' : '' }}" href="{{ route('institution.StudentPersonalDetail', ['student_id' => $student->id]) }}">Personal Details</a>

                    @else
                    <a class="nav-link {{ request()->routeIs('institution.student_basic') ? 'active' : '' }}" href="{{ route('institution.student_basic') }}">Student Profile</a>

                    @endif



</nav>

<hr>