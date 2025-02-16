<!-- app/Views/errors/no_permission.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Permission</title>
    <!-- Vinculamos Bootstrap desde CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Access Denied</h4>
            <p>You do not have permission to access this page.</p>
            <hr>
            <p class="mb-0">Please contact the administrator if you believe this is an error.</p>
        </div>
        <a href="<?= site_url('/'); ?>" class="btn btn-primary">Go to Home</a>
    </div>

    <!-- Vinculamos Bootstrap JS desde CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
