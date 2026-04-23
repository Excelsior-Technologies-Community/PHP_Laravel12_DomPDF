# PHP_Laravel12_DomPDF

## Project Introduction

PHP_Laravel12_DomPDF is a beginner-friendly Laravel 12 project that demonstrates how to generate dynamic PDF documents using the DomPDF library.
The project focuses on the Controller–View workflow for rendering Blade templates into downloadable and previewable PDFs, making it suitable for learning, academic submission, and portfolio demonstration without requiring database integration.

-----------------------------------------------------------------------

## Project Overview

The project covers:

-   Creating a Laravel 12 project 
-   Installing and configuring DomPDF in Laravel
-   Creating routes, controllers, and views
-   Generating dynamic PDF files from Blade templates
-   Downloading and streaming PDFs in the browser
-   Create a simple UI page to access PDF features
-   Maintaining clean Laravel project structure

------------------------------------------------------------------------

## Step 1 -- Create Laravel 12 Project

``` bash
composer create-project laravel/laravel PHP_Laravel12_DomPDF
cd PHP_Laravel12_DomPDF
```

------------------------------------------------------------------------

## Step 2 -- Install DomPDF Package

Install the official Laravel DomPDF package:

``` bash
composer require barryvdh/laravel-dompdf
```

Publish configuration (optional):

``` bash
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```

------------------------------------------------------------------------

## Step 3 -- Create Controller

``` bash
php artisan make:controller PDFController
```

### File: `app/Http/Controllers/PDFController.php`

``` php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    // Download PDF
    public function generatePDF()
    {
        $data = [
            'title'  => 'Laravel 12 DomPDF Example',
            'date'   => date('d/m/Y'),
            'name'   => 'Demo User',
            'course' => 'Laravel PDF Generation'
        ];

        $pdf = Pdf::loadView('pdf.example', $data);

        return $pdf->download('laravel12-dompdf.pdf');
    }

    // Stream PDF in browser
    public function streamPDF()
{
    $data = [
        'title'  => 'Stream PDF Example',
        'date'   => date('d/m/Y'),
        'name'   => 'Demo User',
        'course' => 'Laravel PDF Generation'
    ];

    $pdf = Pdf::loadView('pdf.example', $data);

    return $pdf->stream('preview.pdf');
}

}
```

------------------------------------------------------------------------

## Step 4 -- Create Blade View

Create folder:

    resources/views/pdf

### File: `resources/views/pdf/example.blade.php`

``` html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        .container {
            padding: 20px;
        }

        h1 {
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $title }}</h1>
        <p><strong>Date:</strong> {{ $date }}</p>

        <table>
            <tr>
                <th>Name</th>
                <th>Course</th>
            </tr>
            <tr>
                <td>{{ $name ?? 'N/A' }}</td>
                <td>{{ $course ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
```

------------------------------------------------------------------------

## Step 5 — Create Simple UI Page

### File: resources/views/welcome-pdf.blade.php

```php
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 12 DomPDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }

        a {
            display: inline-block;
            margin: 15px;
            padding: 12px 25px;
            background: #3490dc;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
        }

        a:hover {
            background: #1d68a7;
        }
    </style>
</head>
<body>

    <h1>Laravel 12 DomPDF Demo</h1>

    <a href="/download-pdf">Download PDF</a>
    <a href="/stream-pdf" target="_blank">Preview PDF</a>

</body>
</html>
```

-----------------------------------------------------------------------

## Step 6 -- Add Routes

### File: `routes/web.php`

``` php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome-pdf');
});

Route::get('/download-pdf', [PDFController::class, 'generatePDF']);
Route::get('/stream-pdf', [PDFController::class, 'streamPDF']);
```

------------------------------------------------------------------------

## Step 7 -- Run Project

Start server:

``` bash
php artisan serve
```

Test URLs:

-   Home Page → `http://127.0.0.1:8000`
-   Download PDF → `http://127.0.0.1:8000/download-pdf`
-   Stream PDF → `http://127.0.0.1:8000/stream-pdf`

------------------------------------------------------------------------

## Output

### Home Page

<img width="1919" height="1028" alt="Screenshot 2026-02-06 123526" src="https://github.com/user-attachments/assets/cfb63c9c-4808-4f69-81b2-468bb30a109e" />

### Download PDF

<img width="1779" height="1087" alt="Screenshot 2026-02-06 115942" src="https://github.com/user-attachments/assets/94cd12b0-ee35-4b6e-9d8e-8616cb017f46" />

### Stream PDF

<img width="1785" height="1081" alt="Screenshot 2026-02-06 115804" src="https://github.com/user-attachments/assets/e176a171-2ac2-4827-9e8c-3bb3632e5164" />

------------------------------------------------------------------------

## Project Folder Structure

```
PHP_Laravel12_DomPDF
│
├── app
│   └── Http
│       └── Controllers
│           └── PDFController.php
│
├── resources
│   └── views
│       ├── pdf
│       │   └── example.blade.php
│       │
│       └── welcome-pdf.blade.php
│
├── routes
│   └── web.php
│
└── composer.json
```

------------------------------------------------------------------------

Your PHP_Laravel12_DomPDF Project is now ready!
<<<<<<< HEAD


=======
>>>>>>> development
