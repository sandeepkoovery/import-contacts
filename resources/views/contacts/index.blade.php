<!DOCTYPE html>
<html>
<head>
    <title>Contacts List</title>
    <style>
        .main {
            padding-left: 20px;
        }
        .menu {
            margin-bottom: 20px;
        }
        .menu a {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin-right: 10px;
            display: inline-block;
        }
        .menu a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="main">
    <h1>Contacts</h1>
    <div class="menu">
        <a href="{{ route('contacts.create') }}">Add New Contact</a>
        <a href="{{ route('contacts.import.form') }}">Import Contacts</a>
    </div>
    @if($contacts->count() > 0)
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>
                    <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a> |
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @else
        <p>No contacts available.</p>
    @endif
    </div>
</body>
</html>
