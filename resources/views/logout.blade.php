<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Application</title>
</head>
<body>

    <!-- Navigation Bar -->
    <nav>
        <!-- Other navigation links -->

        <!-- Logout Link with Confirmation -->
        <form id="logoutForm" action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <script>
            document.getElementById('logoutForm').addEventListener('submit', function (event) {
                // Display a confirmation dialog
                if (!confirm('Are you sure you want to logout?')) {
                    event.preventDefault(); // Cancel form submission if user clicks "Cancel"
                }
            });
        </script>
    </nav>

    <!-- Page Content -->
    <div>
        <!-- Your page content goes here -->
        <h1>Welcome to Your Application</h1>
        <p>This is an example of a page in your application.</p>
    </div>

</body>
</html>
