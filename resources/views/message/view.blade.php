@extends('recruiter.panel.layout')

@section('content')
<div class="main-container container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Message</h4>

                    <p class="card-text"></p>
                    <hr>
                    <form method="POST" action="{{ route('messagesend') }}">
                        @csrf
                        <div class="row">
                            <!-- <div class="col-3">
                                Recieved Messages will appear here
                            </div> -->

                            <div class="col-12">
                                <div class="chat-container">
                                    <div class="chat-messages" id="chatMessages">
                                        <!-- Messages will appear here -->
                                    </div>
                                    <!-- <h6>Message:</h6> -->
                                    <div class="message-input">
                                        <input type="text" id="messageInput" placeholder="Type a message...">
                                        <button type="button" id="SendMessage"> <i class="bi bi-send"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footerScript')

<script>
    $(document).ready(function() {

        $.ajax({
            type: 'POST',
            url: "{{route('fetchMessages')}}",
            data: {
                _token: '{{ csrf_token() }}',
                receiver_id: '{{$reciever_id}}',
                student_id: '{{$student_id}}',
            },
            success: function(result) {
                console.log('result', result);
                $.each(result.messages, function(key, val) {
                    if (val.sender_id == result.user_id) {
                        $('#chatMessages').append('<div class="sent-message">' + val.content + '</div>');
                    } else {
                        $('#chatMessages').append('<div class="received-message">' + val.content + '</div>');
                    }
                });
            }
        });

        $('#SendMessage').on('click', function() {
            var messageContent = $('#messageInput').val();
            $.ajax({
                type: 'POST',
                url: "{{route('messagesend')}}",
                data: {
                    _token: '{{ csrf_token() }}',
                    receiver_id: '{{$reciever_id}}',
                    student_id: '{{$student_id}}',
                    content: messageContent
                },
                success: function(response) {
                    // Handle success response (if needed)
                    console.log('Message sent successfully');
                    // Optionally, you can update the UI here to show the sent message
                    $('#chatMessages').append('<div class="sent-message">' + messageContent + '</div>');
                    $('#messageInput').val(' ');
                },
                error: function(xhr, status, error) {
                    // Handle error (if needed)
                    console.error(error);
                }
            })
        })


    });
</script>

@endsection