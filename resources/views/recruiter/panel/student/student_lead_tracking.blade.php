@extends('recruiter.panel.layout')

@section('content')

<!-- Begin page -->
<!-- Begin page -->

<div class="main-container container">
    <!-- welcome user -->



    <!-- Student Registration Step 1 Form -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <h4 class="card-title">Add/Edit Student</h4>
                    <hr>

                    @include('recruiter.panel.student.nav_pill_studen')



                    <h4 class="card-title">Lead Tracking</h4>
                    <p class="card-text">Please provide your Lead Tracking</p>

                    <hr>


                    <form method="POST" action="{{ route('agent.StudentLeadTrackingRegstration', ['id' => $student->id]) }}">
                        @csrf

                        <!-- Lead Status -->
                        <div class="form-group mb-3">
                            <label for="lead_source">Lead Parent</label>
                            <select name="lead_parent" class="form-control">
                                <option value="">Select Lead Parent</option>
                                
                                @foreach($students as $key => $name)
                                <option value="{{ $key }}" @if ($student->Lead_parent == $key) selected @endif >{{ $name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="lead_status">Lead Status</label>
                            <select name="lead_status" id="lead_status" class="form-control">
                                <option value="cold" @if ($student->lead_status === 'cold') selected @endif>Cold</option>
                                <option value="pending" @if ($student->lead_status === 'pending') selected @endif>Pending</option>
                                <option value="warm" @if ($student->lead_status === 'warm') selected @endif>Warm</option>
                                <option value="hot" @if ($student->lead_status === 'hot') selected @endif>Hot</option>
                            </select>
                        </div>

                        <!-- Prospect Rating -->
                        <div class="form-group mb-3">
                            <label for="prospect_rating">Prospect Rating</label>
                            <select name="prospect_rating" id="prospect_rating" class="form-control">
                                <option value="1star" @if ($student->prospect_rating === '1star') selected @endif>1 Star</option>
                                <option value="2star" @if ($student->prospect_rating === '2star') selected @endif>2 Stars</option>
                                <option value="3star" @if ($student->prospect_rating === '3star') selected @endif>3 Stars</option>
                                <option value="4star" @if ($student->prospect_rating === '4star') selected @endif>4 Stars</option>
                                <option value="5star" @if ($student->prospect_rating === '5star') selected @endif>5 Stars</option>
                            </select>
                        </div>

                        <!-- Preferred Appointment Date -->
                        <div class="form-group mb-3">
                            <label for="preferred_appointment_date">Preferred Appointment Date</label>
                            <input type="date" class="form-control" id="preferred_appointment_date" name="preferred_appointment_date" value="{{ old('preferred_appointment_date', $student->preferred_appointment_date) }}">
                        </div>

                        <!-- Preferred Appointment Time -->
                        <div class="form-group mb-3">
                            <label for="preferred_appointment_time">Preferred Appointment Time</label>
                            <input type="time" class="form-control" id="preferred_appointment_time" name="preferred_appointment_time" value="{{ old('preferred_appointment_time', $student->preferred_appointment_time) }}">
                        </div>

                        <!-- Lead Source -->
                        <div class="form-group mb-3">
                            <label for="lead_source">Lead Source</label>
                            <input type="text" class="form-control" id="lead_source" name="lead_source" value="{{ old('lead_source', $student->lead_source) }}">
                        </div>

                        <!-- Candidate Comments -->
                        <div class="form-group mb-3">
                            <label for="candidate_comments">Candidate Comments</label>
                            <textarea class="form-control" id="candidate_comments" name="candidate_comments">{{ old('candidate_comments', $student->candidate_comments) }}</textarea>
                        </div>

                        <!-- Signup Country -->
                        <div class="form-group mb-3">
                            <label for="signup_country">Signup Country</label>
                            <input type="text" class="form-control" id="signup_country" name="signup_country" value="{{ old('signup_country', $student->signup_country) }}">
                        </div>

                        <!-- Signup City -->
                        <div class="form-group mb-3">
                            <label for="signup_city">Signup City</label>
                            <input type="text" class="form-control" id="signup_city" name="signup_city" value="{{ old('signup_city', $student->signup_city) }}">
                        </div>

                        <!-- Signup State/Province -->
                        <div class="form-group mb-3">
                            <label for="signup_state_province">Signup State/Province</label>
                            <input type="text" class="form-control" id="signup_state_province" name="signup_state_province" value="{{ old('signup_state_province', $student->signup_state_province) }}">
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-default btn-lg w-100">Update</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main page content ends -->
</div>
</main>
<!-- Page ends -->

@endsection