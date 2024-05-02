<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projects</title>
    <link rel="shortcut icon" href="{{ asset('icon/icon.jpg') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Your Styles -->
    <style>
        #main {
            background: url('https://laravel.com/assets/img/welcome/background.svg');
            background-repeat: no-repeat;
            background-size: cover;
            height: 100rem;
        }
        #navbarNav {
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white " id="main" >
            <!-- Bootstrap Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <ul class="ml-auto navbar-nav" style="display: contents;position: sticky;top:0px;z-index: 2;">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-light p-0.2" href="{{ route('login') }}">Admin Log in</a>
                        </li>
                    @endauth
                </ul>
            </nav>
            <!-- Your Content -->
            <div class="container mt-5">
                <div class="row">
                    @foreach ($projects as $index => $project)
                        @if ($index % 3 == 0 && $index != 0)
                            </div><div class="row">
                        @endif
                        <div class="mb-3 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Name: <u>{{ $project->name }}</u></h5>
                                    <p class="card-text">Description: {{ $project->description }}</p>
                                    <h2 class="mb-2 card-subtitle text-muted">Project Image:</h2>
                                    <img src="{{ asset('storage/project_images/'.$project->image) }}" class="card-img-top" alt="Project Image" style="max-width: 5rem; height: auto;"><br>
                                    <a href="#" class="mt-3 btn btn-success project-details-btn" data-project-name="{{ $project->name }}" data-project-id="{{ $project->id }}">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Email Modal -->
    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailModalLabel">Request For Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('project-request') }}" method="post">
                        @csrf
                        <input type="hidden" name="project_id" id="projectId" value="">
                        <div class="form-group">
                            <label for="emailAddress">Email address</label>
                            <input type="email" class="form-control" name="emailAddress" placeholder="Enter email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            // When a button with the class 'project-details-btn' is clicked
            $('.project-details-btn').click(function(e){
                e.preventDefault(); // Prevent default action of the link
                // Extract project ID and name from the clicked button
                var projectId = $(this).data('project-id');
                var projectName = $(this).data('project-name');
                // Update modal title with project name
                $('#emailModalLabel').text('Request For ' + projectName);
                // Set project ID in the hidden input field of the modal form
                $('#projectId').val(projectId);

                // Now trigger the modal using Bootstrap 5 JavaScript API
                var modalElement = document.getElementById('emailModal');
                var modalInstance = new bootstrap.Modal(modalElement);
                modalInstance.show();
            });
        });
    </script>



    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
