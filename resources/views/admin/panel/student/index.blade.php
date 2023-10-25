@extends('admin.panel.layout')

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



                    <h4 class="card-title">Students</h4>
                        <p class="card-text"></p>
                        <hr>

                    <table id="students-table" class="table table-container">
                       
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                                <!-- Add more headers for additional columns -->
                            </tr>
                        </thead>
                        {{-- @foreach($students as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->first_name }}</td>
                            <td>{{ $item->email }}</td>
                            <!-- Add more data columns as needed -->
                        </tr>
                        @endforeach --}}

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
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> --}}

<script>
    var j = jQuery.noConflict();
</script>
<script type="text/javascript">



j(document).ready(function () {
    j('#students-table').DataTable({
        "searching": true,
        "lengthChange": true, 
        "paging": true, 
        "ordering": true, 
        "info": true, 
        "autoWidth": false, 
        "processing": true,
        ajax: '{!! route('admin.getStudents') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'first_name', name: 'first_name' },
            { data: 'email', name: 'email' },

            { data: null, 
            render: function(data, type, row) {
            return '<a href="{{url('/')}}/admin/students/studentView/'+row.id+'"><button class="btn btn-primary edit-button" data-id="' + row.id + '">View</button></a>';
            // return '<a href="{{url('/')}}/agent/StudentBasicUpdate/'+row.id+'"><button class="btn btn-primary edit-button" data-id="' + row.id + '">Edit</button></a> <a href="{{url('/')}}/agent/PreviewStudents/'+row.id+'"><button class="btn btn-primary edit-button" data-id="' + row.id + '">View</button></a>';

            } },

            // Add more columns as needed
        ]
    });

    console.log("After DataTables Initialization");
    j('#students-table').on( 'error.dt', function ( e, settings, techNote, message ) {
    console.error( 'An error has been reported by DataTables: ', message );
    });

});


</script>






@endsection