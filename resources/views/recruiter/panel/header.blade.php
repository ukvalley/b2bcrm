<main class="">
<!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                        <i class="bi bi-list"></i>
                    </a>
                </div>
                <div class="col align-self-center text-center">
                    <img src="https://civs.online/wp-content/uploads/2023/01/CIVS-White-01-1024x285.png" width="200px" alt="">
                    
                </div>
                <div class="col-auto">
                    <a href="{{url('/notification')}}" target="_self" class="btn btn-light btn-44">
                        <i class="bi bi-bell"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div>
                <?php
$user = auth()->user();

// Check if the user has a recruiter relationship
if ($user->recruiter) {
    // Assuming the image field is named 'avatar' in your 'recruiters' table
    $recruiterImage = $user->recruiter->avatar;
} else {
    // Handle the case where the user doesn't have a recruiter
    $recruiterImage = ''; // Set a default image or leave it empty based on your requirements
}
?>

<div class="col-auto">
    <a href="{{url('/')}}/agent/EditProfile" target="_self" class="btn btn-light btn-44">
        @if($recruiterImage)
            <img src="{{url('/')}}/images/avtar/{{$recruiterImage}}" alt="Recruiter Image" style="width: -webkit-fill-available;">
        @else
            <!-- If no image is available, you can use a default image or display some placeholder -->
            <i class="bi bi-person"></i> <!-- Assuming you want to use a person icon for the profile -->
        @endif
    </a>
</div>


            </div>
        </header>
        <!-- Header ends -->