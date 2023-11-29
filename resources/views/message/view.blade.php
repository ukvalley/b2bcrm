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
                    <form method="" action="">
                        @csrf

                        <div class="row">
                            <div class="col-3">
                               <!-- Recieved Messages will appear here -->
                            </div>

                            <div class="col-9">
                                <div class="chat-container">
                                    <div class="chat-messages" id="chatMessages">
                                      
                                    </div>
                                    <!-- <h6>Message:</h6> -->
                                    <div class="message-input">
                                        <input type="text" id="messageInput" placeholder="Type a message...">
                                        <button id="sendMessageButton" onclick="sendMessage()"> <i class="bi bi-send"></i></button>
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



