<!DOCTYPE html>
<html>
<head>
    <title>Import Contacts</title>
</head>
<body>
    <h1>Import Contacts from XML</h1>
    <form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".xml" required>
        <button type="submit">Import</button>
    </form>
</body>
</html>
