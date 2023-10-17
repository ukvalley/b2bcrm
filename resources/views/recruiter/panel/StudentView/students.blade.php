@extends('recruiter.panel.layout')

@section('content')

<!-- Begin page -->
 <!-- Begin page -->
    <main class="">

               <link rel="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>


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
                    <a href="notifications.html" target="_self" class="btn btn-light btn-44">
                        <i class="bi bi-bell"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->
         <div class="main-container container">
            <!-- welcome user -->
            


        <!-- Student Registration Step 1 Form -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">



                    <h4 class="card-title">Students</h4>
                        <p class="card-text"></p>
                        <hr>

                    <table id="students-table" class="table">
                       
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Action</th>
                                <!-- Add more headers for additional columns -->
                            </tr>
                        </thead>

                    </table>

      

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main page content ends -->
</div>
</main>
<!-- Page ends -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Include DataTables script -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    var j = jQuery.noConflict();
</script>
<script type="text/javascript">



j(document).ready(function () {
    j('#students-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('agent.getStudents') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'first_name', first_name: 'first_name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', created_at: 'created_at' },
            { data: null, 
            render: function(data, type, row) {
            return '<a href="{{url('/')}}/agent/StudentBasicUpdate/'+row.id+'"><button class="btn btn-primary edit-button" data-id="' + row.id + '">Edit</button></a> <a href="{{url('/')}}/agent/PreviewStudents/'+row.id+'"><button class="btn btn-primary edit-button" data-id="' + row.id + '">View</button></a>';

            } },

            // Add more columns as needed
        ]
    });
});
</script>

@endsection
