<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script type="importmap">
        {
        "imports": {
            "@material/web/": "https://esm.run/@material/web/"
        }
        }
    </script>
    <script type="module">
        import '@material/web/all.js';
        import {styles as typescaleStyles} from '@material/web/typography/md-typescale-styles.js';
        import '@material/web/textfield/md-outlined-text-field.js';

        document.adoptedStyleSheets.push(typescaleStyles.styleSheet);
    </script>
</head>
<body>
    <h1>Create Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <md-outlined-text-field id="title" name="title" required></md-outlined-text-field>
        </div>
        <div>
            <label for="ISBN">ISBN:</label>
            <md-outlined-text-field id="ISBN" name="ISBN" required></md-outlined-text-field>
        </div>
        <div>
            <label for="available_copies">Available Copies:</label>
            <input type="number" id="available_copies" name="available_copies" required>
        </div>
        <button type="submit">Create Book</button>
    </form>
</body>
</html>