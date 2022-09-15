<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New File Upload</title>
</head>
<body>
    <main>
        @if (session('message'))
           Message:  {{ session('message') }}
        @endif
        @if (session('path'))
           Path :
            {{ session('path') }}
        @endif

        <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            Image <input type="file" name="image" id="image">

            @error('image')
                {{ $message }}
            @enderror
            <button type="submit">Submit</button>
        </form>
    </main>

</body>
</html>
