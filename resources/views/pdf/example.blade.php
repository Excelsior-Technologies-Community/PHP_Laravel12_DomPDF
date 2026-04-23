<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>User PDF</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #3490dc;
            color: white;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #000;
            text-align: left;
        }
    </style>
</head>

<body>

    <h1>User Report</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
        </tr>

        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->course }}</td>
            </tr>
        @endforeach

    </table>

</body>

</html>