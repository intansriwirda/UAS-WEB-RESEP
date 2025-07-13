<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Admin - ResepEnak</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap (opsional jika belum include di layout utama) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Include CSS global -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body class="login-wrapper">

  <div class="login-box">
    <h4 class="login-title">Login Admin</h4>

    @if (session('error'))
      <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ url('/admin/login') }}">
      @csrf

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" required autofocus>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-login w-100">Login</button>
      </div>
    </form>
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
