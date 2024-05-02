<!doctype html>
<html lang="en">
    <head>
        <title>Projects</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

    <link rel="shortcut icon" href="{{ asset('icon/icon.jpg') }}" type="image/x-icon">

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    </head>

    <body>
        <header>
            @if (session('success'))
            <div id="alertMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        </header>
        <main>
