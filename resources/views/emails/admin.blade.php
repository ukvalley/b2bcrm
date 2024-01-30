<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
    

    @if(isset($instituteUsers) && count($instituteUsers) > 0)
        <p>New Institute Registered.</p>
        @foreach ($instituteUsers as $user)
            {{ $user->name }} <br>
        @endforeach
    @endif

    @if(isset($agentUsers) && count($agentUsers) > 0)
        <p>New Agent Registered.</p>
        @foreach ($agentUsers as $user)
            {{ $user->name }} <br>
        @endforeach
    @endif


    <p>Best regards,</p>
    <p>Canada Immigration & Visa Services</p>
</body>
</html>