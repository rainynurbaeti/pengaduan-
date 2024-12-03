<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg" style="width: 80rem; border-radius: 15px;">
        <div class="row g-0">
            <!-- Bagian Gambar -->
            <div class="col-md-6">
                <img src="/assets/img/kecamatan.jpeg" alt="Login Image"
                     class="img-fluid h-100 rounded-start" style="object-fit: cover; border-top-left-radius: 15px; border-bottom-left-radius: 15px;">
            </div>

            <!-- Bagian Form -->
            <div class="col-md-6">
                <div class="card-body p-5">
                    <h3 class="card-title text-center mb-4">Selamat Datang</h3>
                    <p class="text-center text-muted mb-4">Masuk untuk melanjutkan</p>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg"style="font-size: 0.875rem;" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg"style="font-size: 0.875rem;" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
                    </form>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-4">
                            <strong>{{ $errors->first() }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
