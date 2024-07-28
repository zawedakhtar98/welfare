@extends('fronted.layout.main')
@section('main-section')
@section('custom-internal-css')
<style>
    body, html {
        height: 100%;
        background-color: #343a40 !important; 
    }
    .skiptranslate.goog-te-gadget{
        display: none;
    }
    #preloader{
        display: none;
    }
    .bg-dark {
        background-color: #343a40 !important;
    }
    .error-container {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }
    .error-message {
        text-align: center;
    }
    .bg-white.founder, #footer, #header{
        display: none !important;
    }
    </style>
@endsection
<main id="main">
    <div class="container error-container">
        <div class="error-message">
            <h1 class="display-1">403</h1>
            <h2 class="mb-4">Not Authorized</h2>
            <p class="mb-4">Sorry, you do not have permission to access this page.</p>
            <a href="/" class="btn btn-primary">Go to Homepage</a>
        </div>
    </div>
</main>
@endsection