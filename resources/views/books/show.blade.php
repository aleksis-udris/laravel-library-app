<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Document</title>
</head>
<body class="display-view">
    <!-- TITLE -->
    <div class="top-bar">
        <h1>Book Details</h1>
        <div class="actions">
            @if ($origin === 'editor')
                <a href="{{ route('books.editorIndex') }}">Back to Edit List</a>
            @else
                <a href="{{ route('books.publicIndex') }}">Back to Public List</a>
            @endif
        </div>
    </div>
    
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="content-card">
            <h2>{{ $book->title }}</h2>
            <p>ISBN: {{ $book->ISBN }}</p>
            <p>Available Copies: {{ $book->available_copies }}</p>
        </div>
    </div>
    
    <!-- FOOTER -->
    <div class="footer">
        <h3>All Rights Reserved</h3>s
    </div>
</body>
</html>