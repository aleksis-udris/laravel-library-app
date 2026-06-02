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
        <h1>Edit Book {{ $book->id }}</h1>
    </div>
    
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="form-card">
            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $book->title }}" placeholder="Input title..." required>

                <label for="ISBN">ISBN:</label>
                <input type="text" id="ISBN" name="ISBN" value="{{ $book->ISBN }}" placeholder="Input ISBN..." required>

                <label for="available_copies">Available Copies:</label>
                <input type="number" id="available_copies" 
                        name="available_copies" 
                        value="{{ $book->available_copies }}" 
                        placeholder="Input available copies (numbers)..." required>

                <button type="submit">Update</button>
            </form>
        </div>
        
    </div>
    
    <!-- FOOTER -->
    <div class="footer">
        
    </div>
</body>
</html>