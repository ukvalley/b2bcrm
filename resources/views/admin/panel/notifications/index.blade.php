@extends('admin.panel.layout')
@section('content')
<div class="notification-header">
    <h1>Notifications</h1>
</div>
<div class="notification-body">
    <ul>
        @if(isset($notifications))
        @foreach ($notifications as $notification)
            <li>{{ $notification->message }}</li>
        @endforeach
        @endif
    </ul>
</div>
@endsection
