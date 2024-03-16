<!doctype html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Logar - Brulve</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<main class="container vh-100 d-flex align-content-center justify-content-center flex-wrap">
    <div class="col-12 col-sm-12 col-md-8 col-lg-4 bg-body-tertiary rounded-3 p-3">
        <h1 class="text-center">Logue-se</h1>
        <form action="{{ route('authenticate') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" value="true">
                <label for="remember" class="form-check-label">
                    Mantenha-me conectado
                </label>
            </div>
            <button class="col-12 btn btn-primary" type="submit">Entrar</button>
        </form>
        @error('email')
        <div class="alert alert-danger mt-3" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
</main>
</body>
</html>
