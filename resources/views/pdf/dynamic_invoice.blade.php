<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        /* Watermark CSS */
        .watermark {
            position: fixed;
            top: 35%;
            left: 20%;
            font-size: 80px;
            color: rgba(200, 200, 200, 0.3);
            transform: rotate(-45deg);
            z-index: -1;
            font-weight: bold;
        }

        /* Page Number CSS */
        @page { margin: 100px 25px; }
        header { position: fixed; top: -60px; left: 0px; right: 0px; height: 50px; text-align: center; font-size: 20px; font-weight: bold; }
        footer { position: fixed; bottom: -60px; left: 0px; right: 0px; height: 50px; text-align: right; font-size: 14px; color: gray; }
        footer .pagenum:before { content: counter(page); }
        
        body { font-family: Arial, sans-serif; }
        .details { margin-top: 30px; font-size: 16px; }
    </style>
</head>
<body>
    <div class="watermark">CONFIDENTIAL</div>

    <header>{{ $title }}</header>
    <footer>
        Page <span class="pagenum"></span>
    </footer>

    <main>
        <h3>Invoice Details for {{ $user->name }}</h3>
        <hr>
        <div class="details">
            <p><strong>Customer ID:</strong> #00{{ $user->id }}</p>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Generated Date:</strong> {{ date('d M Y') }}</p>
        </div>
        
        <br><br>
        <p>This is a system-generated dynamic invoice with Watermark and Page Numbers.</p>
    </main>
</body>
</html>