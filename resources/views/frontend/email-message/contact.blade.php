<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Inquiry Received</title>
</head>
<body>
    <h2>New Contact Inquiry</h2>

    <p><strong>First Name:</strong> {{ $data->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $data->last_name }}</p>
    <p><strong>Email:</strong> {{ $data->email }}</p>
    <p><strong>Phone:</strong> {{ $data->phone }}</p>
    <p><strong>Subject:</strong> {{ $data->subject }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $data->message }}</p>

    @if ($data->document)
        <p><strong>Attachment:</strong> File attached.</p>
    @endif
</body>
</html>
