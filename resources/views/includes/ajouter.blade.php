<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="card">
    <div class="card-body">
        <h5 class="card-title">No Labels / Placeholders as labels Form</h5>

        <!-- No Labels Form -->
        <form class="row g-3">
          <div class="col-md-12">
            <input type="text" class="form-control" placeholder="Your Name">
          </div>
          <div class="col-md-6">
            <input type="email" class="form-control" placeholder="Email">
          </div>
          <div class="col-md-6">
            <input type="password" class="form-control" placeholder="Password">
          </div>
          <div class="col-12">
            <input type="text" class="form-control" placeholder="Address">
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="City">
          </div>
          <div class="col-md-4">
            <select id="inputState" class="form-select">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="col-md-2">
            <input type="text" class="form-control" placeholder="Zip">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form><!-- End No Labels Form -->

      </div>
    </div>
</body>
</html>