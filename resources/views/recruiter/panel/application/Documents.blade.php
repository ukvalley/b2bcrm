@extends('recruiter.panel.layout')

@section('content')

<div class="main-container container">
            <!-- welcome user -->
            


        <!-- Student Registration Step 1 Form -->
        <div class="row">
            <div class="col-12">
                

            @include('recruiter.panel.studentView.student_navbar')

                </div>         
            </div>




            </div>


            <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                <h4>Document Manager</h4>
                <p>This page lists all the mandatory documents required throughout the application process.</p>

                   <p>The documents in this section are required by the institutions of your student’s shortlisted courses and must be submitted with your application for a conditional offer (at the minimum) to be received.</p>
                   <p>If you are unsure about the process, please contact your regional/account manager or submit a help request via our ‘Help’ widget below.</p> 
                   <hr>
                   
                </div>
            </div>
        <br>

       <section>
             <h4>Documents required before submitting the application
</h4>
<br>

<div class="col-12">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4>Required application documents</h4>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <p>Mandatory Application Documents</p>
                </div>
                <div class="col-md-4">
                    <a href="#req_doc" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#uploadTable">
                        Uploaded-(0)
                    </a>
                </div>
                <div class="table-responsive collapse" id="uploadTable">
                <table class="table" id="req_doc">
                    <thead>
                        <tr>
                            <th>Document Type</th>
                            <th>Document Info</th>
                            <th>File Name</th>
                            <th>Institution</th>
                            <th>Status</th>
                            <th>Upload</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Document 1</td>
                            <td>Info 1</td>
                            <td>File 1.pdf</td>
                            <td>Institution 1</td>
                            <td class="text-success">Uploaded</td>
                            <td>
                                <a href="#" title="View"><span class="bi bi-cloud-upload"></span></a>
                            </td>
                            <td>Note 1</td>
                           <td class="dropdown" style="position:static;">
                                <a href="#" class=" dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="bi bi-three-dots"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Download</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Replace Document</a>

                                    <a class="dropdown-item" href="#">Upload Additional file</a>
                                </div>
                            </td>

                        </tr>
                    </tbody>

                   

                </table>
                <div class="form-group">
                        <label for="documentType">Select Document Type</label>
                        <select id="documentType" class="form-control">
                            @foreach($documentTypes as $documentType)
                                <option value="{{ $documentType->id }}">{{ $documentType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="addDocument" class="btn btn-primary">Add Document</button>


            </div>
                
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <p>Additional Application Documents</p>
                </div>
                <div class="col-md-4">
                    <a href="#additional_doc" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#additionalTable">
                        Uploaded-(0)
                    </a>
                </div>
                
            </div>
            <hr>
            <br>
            
            <div class="table-responsive collapse" id="additionalTable">
                <table class="table" id="additional_doc">
                    <thead>
                        <tr>
                            <th>Document Type</th>
                            <th>Document Info</th>
                            <th>File Name</th>
                            <th>Institution</th>
                            <th>Status</th>
                            <th>Upload</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Document 1</td>
                            <td>Info 1</td>
                            <td>File 1.pdf</td>
                            <td>Institution 1</td>
                            <td class="text-success">Uploaded</td>
                            <td>
                                <a href="#" title="View"><span class="bi bi-cloud-upload"></span></a>
                            </td>
                            <td>Note 1</td>
                           <td class="dropdown" style="position:static;">
                                <a href="#" class=" dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="bi bi-three-dots"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Download</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Replace Document</a>

                                    <a class="dropdown-item" href="#">Upload Additional file</a>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>

<br>
<!-- Additional Documents -->
<section>
             <h4>Documents required after submitting the application

</h4>
<br>

<div class="col-12">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4>Acceptance Documents</h4>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <p>Mandatory Application Documents</p>
                </div>
                <div class="col-md-4">
                    <a href="#accept_doc" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#acceptTable">
                        Uploaded-(0)
                    </a>
                </div>
                <div class="table-responsive collapse" id="acceptTable">
                <table class="table" id="accept_doc">
                    <thead>
                        <tr>
                            <th>Document Type</th>
                            <th>Document Info</th>
                            <th>File Name</th>
                            <th>Institution</th>
                            <th>Status</th>
                            <th>Upload</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Document 1</td>
                            <td>Info 1</td>
                            <td>File 1.pdf</td>
                            <td>Institution 1</td>
                            <td class="text-success">Uploaded</td>
                            <td>
                                <a href="#" title="View"><span class="bi bi-cloud-upload"></span></a>
                            </td>
                            <td>Note 1</td>
                           <td class="dropdown" style="position:static;">
                                <a href="#" class=" dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="bi bi-three-dots"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Download</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Replace Document</a>

                                    <a class="dropdown-item" href="#">Upload Additional file</a>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <p>Additional Acceptance Documents</p>
                </div>
                <div class="col-md-4">
                    <a href="#add_accept_doc" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#add_acceptTable">
                        Uploaded-(0)
                    </a>
                </div>
            </div>
            <hr>
            <br>
            
            <div class="table-responsive collapse" id="add_acceptTable">
                <table class="table" id="add_accept_doc">
                    <thead>
                        <tr>
                            <th>Document Type</th>
                            <th>Document Info</th>
                            <th>File Name</th>
                            <th>Institution</th>
                            <th>Status</th>
                            <th>Upload</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Document 1</td>
                            <td>Info 1</td>
                            <td>File 1.pdf</td>
                            <td>Institution 1</td>
                            <td class="text-success">Uploaded</td>
                            <td>
                                <a href="#" title="View"><span class="bi bi-cloud-upload"></span></a>
                            </td>
                            <td>Note 1</td>
                           <td class="dropdown" style="position:static;">
                                <a href="#" class=" dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="bi bi-three-dots"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Download</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Replace Document</a>

                                    <a class="dropdown-item" href="#">Upload Additional file</a>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>

<br>
<!-- Visa Documents -->
<section>
            
<section>


<br>

<div class="col-12">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4>Visa Documents</h4>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <p>Mandatory Visa Documents</p>
                </div>
                <div class="col-md-4">
                    <a href="#visa_doc" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#visaTable">
                        Uploaded-(0)
                    </a>
                </div>
                <div class="table-responsive collapse" id="visaTable">
                <table class="table" id="visa_doc">
                    <thead>
                        <tr>
                            <th>Document Type</th>
                            <th>Document Info</th>
                            <th>File Name</th>
                            <th>Institution</th>
                            <th>Status</th>
                            <th>Upload</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Document 1</td>
                            <td>Info 1</td>
                            <td>File 1.pdf</td>
                            <td>Institution 1</td>
                            <td class="text-success">Uploaded</td>
                            <td>
                                <a href="#" title="View"><span class="bi bi-cloud-upload"></span></a>
                            </td>
                            <td>Note 1</td>
                           <td class="dropdown" style="position:static;">
                                <a href="#" class=" dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="bi bi-three-dots"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Download</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Replace Document</a>

                                    <a class="dropdown-item" href="#">Upload Additional file</a>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <p>Additional Visa Documents</p>
                </div>
                <div class="col-md-4">
                    <a href="#visa2_doc" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#visa2Table">
                        Uploaded-(0)
                    </a>
                </div>
            </div>
            <hr>
            <br>
            
            <div class="table-responsive collapse" id="visa2Table">
                <table class="table" id="visa2_doc">
                    <thead>
                        <tr>
                            <th>Document Type</th>
                            <th>Document Info</th>
                            <th>File Name</th>
                            <th>Institution</th>
                            <th>Status</th>
                            <th>Upload</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Document 1</td>
                            <td>Info 1</td>
                            <td>File 1.pdf</td>
                            <td>Institution 1</td>
                            <td class="text-success">Uploaded</td>
                            <td>
                                <a href="#" title="View"><span class="bi bi-cloud-upload"></span></a>
                            </td>
                            <td>Note 1</td>
                            <td class="dropdown" style="position:static;">
                                <a href="#" class=" dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="bi bi-three-dots"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Download</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Replace Document</a>

                                    <a class="dropdown-item" href="#">Upload Additional file</a>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>

<br>
<!-- Visa Documents -->
<section>



@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>


  <script>
document.getElementById('addDocument').addEventListener('click', function() {
    var documentType = document.getElementById('documentType').value;

    if (documentType) {
        var table = document.getElementById('req_doc').getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);

        // Add a single cell to the new row and populate it with the selected document type
        var documentTypeCell = newRow.insertCell(0);
        documentTypeCell.innerHTML = documentType;
    }
});

  </script>
  <!-- <script>
    document.getElementById('addDocument').addEventListener('click', function() {
    var documentType = document.getElementById('documentType').value;

    if (documentType) {
        var table = document.getElementById('req_doc').getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);

        // Add cells to the new row
        var documentTypeCell = newRow.insertCell(0);
        var documentInfoCell = newRow.insertCell(1);
        var fileNameCell = newRow.insertCell(2);
        var institutionCell = newRow.insertCell(3);
        var statusCell = newRow.insertCell(4);
        var uploadCell = newRow.insertCell(5);
        var noteCell = newRow.insertCell(6);
        var actionCell = newRow.insertCell(7);

        // Populate the cells with the selected document type
        documentTypeCell.innerHTML = documentType;
        documentInfoCell.innerHTML = ''; // You can populate this based on the selected document type
        fileNameCell.innerHTML = ''; // You can populate this based on the selected document type
        institutionCell.innerHTML = ''; // You can populate this based on the selected document type
        statusCell.innerHTML = ''; // You can set an initial status or leave it empty
        uploadCell.innerHTML = ''; // You can add the upload button here
        noteCell.innerHTML = ''; // You can populate this as needed
        actionCell.innerHTML = ''; // You can add the action dropdown here
    }
});

  </script> -->