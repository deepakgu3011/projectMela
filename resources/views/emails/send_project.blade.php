<!DOCTYPE html>
<html>
<head>
    <title>Project Request</title>
</head>
<body>
    <h1>Project Request</h1>
    <p>You have received a request for the project: {{ $projectName }}</p>
    <p>Please find the project file attached.</p>

    <!-- Download Link -->
    <a href="{{ $projectFilePath }}" download>Download Project File</a>
</body>
</html>
