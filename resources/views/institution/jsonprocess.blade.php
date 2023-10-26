<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="POST" action="{{ route('institution.processJson') }}">
    @csrf
    <textarea name="json_data" rows="10" cols="50"></textarea>
    <button type="submit">Process JSON</button>
</form>

</body>
</html>