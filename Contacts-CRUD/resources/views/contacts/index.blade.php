<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    <title>Contacts</title>
</head>
<body>
    <ul>
        @foreach ($contacts as $contact)

            <li> {{ $contact->user_id }} {{ $contact->user_count }}</li>  
            
        @endforeach
    </ul>
</body>
</html>