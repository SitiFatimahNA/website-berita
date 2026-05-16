<!DOCTYPE html>
<html>
<head>
    <title>Pesan Masuk</title>
</head>
<body>

<h2>Pesan Contact</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Subjek</th>
        <th>Pesan</th>
        <th>Tanggal</th>
    </tr>

    @foreach($contacts as $contact)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->subject }}</td>
        <td>{{ $contact->message }}</td>
        <td>{{ $contact->created_at }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>