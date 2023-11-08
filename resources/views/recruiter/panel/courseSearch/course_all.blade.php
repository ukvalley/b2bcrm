@extends('recruiter.panel.layout')

@section('content')

<!-- Begin page -->
 <!-- Begin page -->
   
         <div class="main-container container">
            <!-- welcome user -->
            


       
            

           
            @php

            $Student = null;
            $courses = null;

             @endphp


            <x-course-filter-view :student="$Student" :courses="$courses" />












      

                    </div>

                
               

               

 


                    



            <!-- Modal -->


        








    <!-- Main page content ends -->
</div>
</main>
<!-- Page ends -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Include DataTables script -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="path/to/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>



<script>
    // JavaScript validation
    document.getElementById("addNotesForm").addEventListener("submit", function (event) {
        const notesContent = document.getElementById("notesContent").value;
        const communicationMedium = document.querySelector('input[name="communicationMedium"]:checked');

        if (!notesContent || !communicationMedium) {
            alert("Both fields are required.");
            event.preventDefault();
        }
    });
</script>



@endsection
