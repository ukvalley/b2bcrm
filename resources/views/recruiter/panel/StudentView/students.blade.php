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



                    <h4 class="card-title">Students</h4>
                    <span data-href="{{url('/')}}/agent/export-csv" id="export" class="btn btn-success btn-sm" onclick ="exportStudents (event.target);">Export</span>
                        <p class="card-text"></p>
                        <hr>

                    <table id="students-table" class="table table-container">
                       
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
   
</script>

<script>
    var j = jQuery.noConflict();
</script>
<script type="text/javascript">

function exportStudents(_this) {
      let _url = $(_this).data('href');
     // alert(_url);
      window.location.href = _url;
   }


j(document).ready(function () {
    j('#students-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('agent.getStudents') !!}',
        columns: [
            { 
                data: 'id', 
                name: 'id',
                render: function(data, type, row, meta) {
                    // 'meta' contains additional information about the row
                    return meta.row + meta.settings._iDisplayStart + 1; // Adding 1 for the serial number
                }
            },
            { data: 'first_name', first_name: 'first_name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: null, 
            render: function(data, type, row) {
            return '<a href="{{url('/')}}/agent/StudentBasicUpdate/'+row.id+'"><button class="btn btn-primary edit-button" data-id="' + row.id + '">Edit</button></a> <a href="{{url('/')}}/agent/PreviewStudents/'+row.id+'"><button class="btn btn-primary edit-button" data-id="' + row.id + '">View</button></a> ';
    
            } },

            // Add more columns as needed
        ]
    });
});
</script>

@endsection
