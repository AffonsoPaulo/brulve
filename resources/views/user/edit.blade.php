<x-main>
    <x-slot:title>Editar Usuário</x-slot:title>
    <x-slot:links>
        @vite(['resources/js/clientCreate.js'])
    </x-slot:links>

    <section class="d-flex justify-content-between align-content-center flex-wrap bg-body-tertiary rounded-3 p-3 mt-3"
             style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h5 class="m-0">Editar usuário</h5>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item"><a href="/users">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar usuário</li>
        </ol>
    </section>

    <section class="bg-body-tertiary rounded-3 p-3 mt-3">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @METHOD('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ $user->name }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                       placeholder="nome@dominio.com"
                       value="{{ $user->email }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                       name="password">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmação de Senha</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                       id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="reset" class="btn btn-secondary">Resetar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </section>
</x-main>
