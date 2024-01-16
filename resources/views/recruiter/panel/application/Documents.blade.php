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

<form action="{{ route('agent.uploadDocument') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="documentType">Select Document Type</label>
        <select id="documentType" name="documentType" class="form-control">
            @foreach($documentTypes as $documentType)
                <option value="{{ $documentType->id }}">{{ $documentType->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="file">Upload Document</label>
        <input type="file" id="file" name="document" class="form-control">
    </div>
    <input type="hidden" value="{{$Student->id}}" name="student">

    <input type="hidden" value="{{$Student->id}}" name="student">


    <button type="submit" class="btn btn-primary">Upload Document</button>
</form>


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
                        Uploaded-({{$countA1}})
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
                    @foreach ($documentsA1 as $document)
        <tr>
            <td>{{ $document->documentType_id->name}}</td>
            <td>{{ $document->document_info }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->file_name }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->institution }}</td> <!-- Adjust this to your data structure -->
            <td class="text-success">{{ $document->status }}</td>
            <td>
    <!-- <a href="{{ asset($document->file_path) }}" title="View"><span class="bi bi-cloud-upload"></span></a> -->
    <form action="{{ route('agent.updatedocument', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="update_file" > <!-- Add the accepted file types -->
        <button type="submit" class="btn btn-link">Update</button>
    </form>
</td>
            <td>{{ $document->note }}</td> <!-- Adjust this to your data structure -->
            <td class="dropdown" style="position: static;">
                <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="bi bi-three-dots"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ asset($document->file_path) }}" download>Download</a>
                    <a class="dropdown-item" href="{{ route('agent.deleteDocument', $document->id) }}"
                      onclick="return confirm('Are you sure you want to delete this document?')">Delete</a>
                    <a class="dropdown-item" href="#">Replace Document</a>
                    <a class="dropdown-item" href="#">Upload Additional file</a>
                </div>

            </td>
        </tr>
    @endforeach

                    </tbody>

                   

                </table>
                



            </div>
            

                
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <p>Additional Application Documents</p>
                </div>
                <div class="col-md-4">
                    <a href="#additional_doc" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#additionalTable">
                        Uploaded-({{$countA2}})
                    </a>
                </div>
                
            </div>
            <hr>
            <br>
            
            <div class="table-responsive collapse" id="additionalTable">
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
                    @foreach ($documentsA2 as $document)
        <tr>
            <td>{{ $document->documentType_id->name}}</td>
            <td>{{ $document->document_info }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->file_name }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->institution }}</td> <!-- Adjust this to your data structure -->
            <td class="text-success">{{ $document->status }}</td>
            <td>
    <!-- <a href="{{ asset($document->file_path) }}" title="View"><span class="bi bi-cloud-upload"></span></a> -->
    <form action="{{ route('agent.updatedocument', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="update_file" > <!-- Add the accepted file types -->
        <button type="submit" class="btn btn-link">Update</button>
    </form>
</td>
            <td>{{ $document->note }}</td> <!-- Adjust this to your data structure -->
            <td class="dropdown" style="position: static;">
                <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="bi bi-three-dots"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ asset($document->file_path) }}" download>Download</a>
                    <a class="dropdown-item" href="{{ route('agent.deleteDocument', $document->id) }}"
                      onclick="return confirm('Are you sure you want to delete this document?')">Delete</a>
                    <a class="dropdown-item" href="#">Replace Document</a>
                    <a class="dropdown-item" href="#">Upload Additional file</a>
                </div>

            </td>
        </tr>
    @endforeach

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
                        Uploaded-({{$countB1}})
                    </a>
                </div>
                <div class="table-responsive collapse" id="acceptTable">
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
                    @foreach ($documentsB1 as $document)
        <tr>
            <td>{{ $document->documentType_id->name}}</td>
            <td>{{ $document->document_info }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->file_name }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->institution }}</td> <!-- Adjust this to your data structure -->
            <td class="text-success">{{ $document->status }}</td>
            <td>
    <!-- <a href="{{ asset($document->file_path) }}" title="View"><span class="bi bi-cloud-upload"></span></a> -->
    <form action="{{ route('agent.updatedocument', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="update_file" > <!-- Add the accepted file types -->
        <button type="submit" class="btn btn-link">Update</button>
    </form>
</td>
            <td>{{ $document->note }}</td> <!-- Adjust this to your data structure -->
            <td class="dropdown" style="position: static;">
                <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="bi bi-three-dots"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ asset($document->file_path) }}" download>Download</a>
                    <a class="dropdown-item" href="{{ route('agent.deleteDocument', $document->id) }}"
                      onclick="return confirm('Are you sure you want to delete this document?')">Delete</a>
                    <a class="dropdown-item" href="#">Replace Document</a>
                    <a class="dropdown-item" href="#">Upload Additional file</a>
                </div>

            </td>
        </tr>
    @endforeach

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
                        Uploaded-({{$countB2}})
                    </a>
                </div>
            </div>
            <hr>
            <br>
            
            <div class="table-responsive collapse" id="add_acceptTable">
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
                    @foreach ($documentsB2 as $document)
        <tr>
            <td>{{ $document->documentType_id->name}}</td>
            <td>{{ $document->document_info }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->file_name }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->institution }}</td> <!-- Adjust this to your data structure -->
            <td class="text-success">{{ $document->status }}</td>
            <td>
    <!-- <a href="{{ asset($document->file_path) }}" title="View"><span class="bi bi-cloud-upload"></span></a> -->
    <form action="{{ route('agent.updatedocument', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="update_file" > <!-- Add the accepted file types -->
        <button type="submit" class="btn btn-link">Update</button>
    </form>
</td>
            <td>{{ $document->note }}</td> <!-- Adjust this to your data structure -->
            <td class="dropdown" style="position: static;">
                <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="bi bi-three-dots"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ asset($document->file_path) }}" download>Download</a>
                    <a class="dropdown-item" href="{{ route('agent.deleteDocument', $document->id) }}"
                      onclick="return confirm('Are you sure you want to delete this document?')">Delete</a>
                    <a class="dropdown-item" href="#">Replace Document</a>
                    <a class="dropdown-item" href="#">Upload Additional file</a>
                </div>

            </td>
        </tr>
    @endforeach

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
                        Uploaded-({{$countC2}})
                    </a>
                </div>
                <div class="table-responsive collapse" id="visaTable">
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
                    @foreach ($documentsC2 as $document)
        <tr>
            <td>{{ $document->documentType_id->name}}</td>
            <td>{{ $document->document_info }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->file_name }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->institution }}</td> <!-- Adjust this to your data structure -->
            <td class="text-success">{{ $document->status }}</td>
            <td>
    <!-- <a href="{{ asset($document->file_path) }}" title="View"><span class="bi bi-cloud-upload"></span></a> -->
    <form action="{{ route('agent.updatedocument', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="update_file" > <!-- Add the accepted file types -->
        <button type="submit" class="btn btn-link">Update</button>
    </form>
</td>
            <td>{{ $document->note }}</td> <!-- Adjust this to your data structure -->
            <td class="dropdown" style="position: static;">
                <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="bi bi-three-dots"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ asset($document->file_path) }}" download>Download</a>
                    <a class="dropdown-item" href="{{ route('agent.deleteDocument', $document->id) }}"
                      onclick="return confirm('Are you sure you want to delete this document?')">Delete</a>
                    <a class="dropdown-item" href="#">Replace Document</a>
                    <a class="dropdown-item" href="#">Upload Additional file</a>
                </div>

            </td>
        </tr>
    @endforeach

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
                        Uploaded-({{$countC1}})
                    </a>
                </div>
            </div>
            <hr>
            <br>
            
            <div class="table-responsive collapse" id="visa2Table">
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
                    @foreach ($documentsC1 as $document)
        <tr>
            <td>{{ $document->documentType_id->name}}</td>
            <td>{{ $document->document_info }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->file_name }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->institution }}</td> <!-- Adjust this to your data structure -->
            <td class="text-success">{{ $document->status }}</td>
            <td>
    <!-- <a href="{{ asset($document->file_path) }}" title="View"><span class="bi bi-cloud-upload"></span></a> -->
    <form action="{{ route('agent.updatedocument', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="update_file" > <!-- Add the accepted file types -->
        <button type="submit" class="btn btn-link">Update</button>
    </form>
</td>
            <td>{{ $document->note }}</td> <!-- Adjust this to your data structure -->
            <td class="dropdown" style="position: static;">
                <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="bi bi-three-dots">open</span>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ asset($document->file_path) }}" download>Download</a>
                    <a class="dropdown-item" href="{{ route('agent.deleteDocument', $document->id) }}"
                      onclick="return confirm('Are you sure you want to delete this document?')">Delete</a>
                    <a class="dropdown-item" href="#">Replace Document</a>
                    <a class="dropdown-item" href="#">Upload Additional file</a>
                </div>

            </td>
        </tr>
    @endforeach

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

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('agent.StudentAddNotes')}}" method="POST" id="addNotesForm">

                    @csrf
                    <div class="form-group">
                        <label for="notesContent">Notes Content</label>
                        <textarea class="form-control" id="notesContent" name="notesContent" rows="5" style="height: 200px;"></textarea>
                    </div>

                    <div class="form-group">

                        <input type="hidden" value="{{$Student->id}}" class="form-control" id="student_id" name="student_id" />
                        <input type="hidden" value="{{$recruiter->id}}" class="form-control" id="recruiter_id" name="recruiter_id" />
                    </div>

                    <div class="form-group">
                        <label for="communicationMedium">Select Communication Medium</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="whatsapp" value="whatsapp">
                            <label class="form-check-label" for="whatsapp">Whatsapp</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="messages" value="messages">
                            <label class="form-check-label" for="messages">Messages</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="email" value="email">
                            <label class="form-check-label" for="email">Email</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="faceToFace" value="faceToFace">
                            <label class="form-check-label" for="faceToFace">Face to Face</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="videoCall" value="videoCall">
                            <label class="form-check-label" for="videoCall">Video Call</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="other" value="other">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>



            </div>

        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    // JavaScript validation
    document.getElementById("addNotesForm").addEventListener("submit", function(event) {
        const notesContent = document.getElementById("notesContent").value;
        const communicationMedium = document.querySelector('input[name="communicationMedium"]:checked');

        if (!notesContent || !communicationMedium) {
            alert("Both fields are required.");
            event.preventDefault();
        }
    });
</script>



  