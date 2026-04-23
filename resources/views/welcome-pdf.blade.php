<!DOCTYPE html>
<html>

<head>
    <title>Laravel 12 DomPDF</title>

    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background: #f4f6fb;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 60px auto;
        }

        .card {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
        }

        /* SEARCH */
        .search-box {
            margin-bottom: 20px;
        }

        .search-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .search-group input {
            padding: 10px;
            width: 300px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .search-group input:focus {
            border-color: #3490dc;
            outline: none;
        }

        .search-group button {
            padding: 10px 20px;
            background: #3490dc;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .search-group button:hover {
            background: #2779bd;
        }

        /* ACTION BUTTONS */
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            color: white;
            font-size: 14px;
        }

        .btn-download {
            background: #38c172;
        }

        .btn-preview {
            background: #6c757d;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 8px;
        }

        th {
            background: #3490dc;
            color: white;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        tr:hover {
            background: #e9f3ff;
        }

        /* BULK BUTTON */
        .bulk-btn {
            margin-top: 15px;
            background: #e3342f;
            padding: 10px 20px;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            display: block;
            margin-left: auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">

            <h1>User Management</h1>

            <!-- 🔍 SEARCH -->
            <form method="GET" class="search-box">
                <div class="search-group">
                    <input type="text" name="search" placeholder="Search user...">
                    <button type="submit">Search</button>
                </div>
            </form>

            <!-- 📄 ACTION BUTTONS -->
            <div class="actions">
                <a href="/download-pdf" class="btn btn-download">Download PDF</a>
                <a href="/stream-pdf" target="_blank" class="btn btn-preview">Preview PDF</a>
            </div>

            <!-- 📊 TABLE -->
            <form method="POST" action="/bulk-pdf">
                @csrf

                <table>
                    <tr>
                        <th>Select</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                    </tr>

                    @foreach($users as $user)
                        <tr>
                            <td>
                                <input type="checkbox" name="ids[]" value="{{ $user->id }}">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->course }}</td>
                        </tr>
                    @endforeach
                </table>

                <button type="submit" class="bulk-btn">
                    Download Selected PDF
                </button>

            </form>

        </div>
    </div>

</body>

</html>