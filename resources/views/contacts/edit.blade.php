<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $contact->name }}" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{ $contact->phone }}" required>

        <button type="submit">Update Contact</button>
    </form>
</body>
</html>
