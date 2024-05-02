@extends('layouts1.app')

@section('title')
    Upload Project
@endsection

@section('content')
<style>
    body{
        background-color: #4f5051;
    }
  #body{
        height: 100%;
        margin: 0;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin: auto;
    }

    .form-container {
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(211, 185, 185, 0.1);
        background-color: #fff;
        width: 100%;
        max-width: 500px; /* Maximum width of the form container */
        margin: 15px; /* Provides a little space from viewport edges */
        z-index: 2; /* Ensures form is above the animated background */
        position: relative; /* Required for correct z-index handling */
    }

    .bubble {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        position: fixed; /* Use fixed to ensure bubbles float over the whole screen */
        bottom: -100px;
        animation: rise 15s infinite ease-in;
    }

    @keyframes rise {
        0% { bottom: -100px; opacity: 1; }
        100% { bottom: 100%; opacity: 0; }
    }

    /* Bubble colors and animation timing */
    .bubble:nth-child(odd) { background-color: #3498db; }
    .bubble:nth-child(even) { background-color: #e74c3c; }
    .bubble:nth-child(3n) { background-color: #2ecc71; }

        /* Positioning examples for different bubbles */
        .bubble:nth-child(1) { left: 10%; }
        .bubble:nth-child(2) { left: 20%; }
        .bubble:nth-child(3) { left: 30%; }
        .bubble:nth-child(4) { left: 40%; }
        .bubble:nth-child(5) { left: 50%; }
        .bubble:nth-child(6) { left: 70%; }
        .bubble:nth-child(7) { left: 80%; }
        .bubble:nth-child(8) { left: 90%; }
        .bubble:nth-child(9) { left: 100%; }
        /* Add more bubbles as needed, adjusting the left property to spread them out */
    </style>
<div class="mt-5 form-container " id="body">
    <h2>Upload Your Project</h2>
    <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="project_name" class="form-label">Project Name:</label>
            <input type="text" class="form-control" id="project_name" name="project_name" required>
            @error('project_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="project_file" class="form-label">Project File:</label>
            <input type="file" class="form-control" id="project_file" name="project_file" accept=".zip,.rar,.tar.gz"  required>
            @error('project_file')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="project_file" class="form-label">Project Image:</label>
            <input type="file" class="form-control" id="project_image" name="project_image" accept=".png,.jpg" required>
            @error('project_image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload Project</button> <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        </div>
    </form>

@endsection
