<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Admin Dashboard</h1>
            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-sm">← Back to App</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="display-4 fw-bold text-primary">{{ $usersCount }}</div>
                        <div class="text-muted">Total Users</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="display-4 fw-bold text-success">{{ $tasksCount }}</div>
                        <div class="text-muted">Total Tasks</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="display-4 fw-bold text-warning">{{ $categoriesCount }}</div>
                        <div class="text-muted">Total Categories</div>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.users') }}" class="btn btn-primary">Manage Users →</a>
    </div>
</body>
</html>