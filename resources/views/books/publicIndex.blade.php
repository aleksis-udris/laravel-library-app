<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=book_2" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Document</title>
</head>
<body class="carded-view">
    <style>
        .material-symbols-rounded {
        font-variation-settings:
        'FILL' 1,
        'wght' 700,
        'GRAD' 200,
        'opsz' 24
        }
    </style>
    
    <!-- TITLE -->
    <div class="top-bar">
        <h1>
            <span class="material-symbols-rounded">book_2</span>
            Books
        </h1>
    </div>
    
    <!-- MAIN CONTENT -->
    <div class="main-content">
        @foreach ($books as $book)
            <div class="card">
                <div class="details">
                    <h2>{{ $book->title }}</h2>
                    <h3>Available Copies: {{ $book->available_copies }}</h3>
                </div>
                <div class="actions">
                    <a href="{{ route('books.show', ['id' => $book->id, 'origin' => 'public']) }}">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- FOOTER -->
    <div class="footer">
        <h3>All Rights Reserved</h3>
    </div>
</body>
</html>