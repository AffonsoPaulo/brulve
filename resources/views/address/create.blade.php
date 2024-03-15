<x-main>
    <x-slot:title>Novo Endereço</x-slot:title>
    <x-slot:links>
        @vite(['resources/js/addressCreate.js'])
    </x-slot:links>

    <section class="d-flex justify-content-between align-content-center bg-body-tertiary rounded-3 p-2 mt-3"
             style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h5 class="m-0">Adicionar endereço</h5>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item"><a href="/clients">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Adicionar endereço</li>
        </ol>
    </section>

    <section class="bg-body-tertiary rounded-3 p-2 mt-3">
        <form action="{{ route('clients.address.store', $client->id) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="zip" class="form-label">CEP</label>
                <input type="number" class="form-control @error('zip') is-invalid @enderror" id="zip" name="zip" placeholder="99999999"
                       value="{{ old("zip") }}">
                @error('zip')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="street" class="form-label">Logradouro</label>
                <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" placeholder="Rua General Osório"
                       value="{{ old("street") }}">
                @error('street')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Número</label>
                <input type="number" class="form-control @error('number') is-invalid @enderror" id="number" name="number" placeholder="18"
                       value="{{ old("number") }}">
                @error('number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="complement" class="form-label">Complemento</label>
                <input type="text" class="form-control @error('complement') is-invalid @enderror" id="complement"
                       name="complement" placeholder="Bloco A, Apt. 8" value="{{ old("complement") }}">
                @error('complement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="district" class="form-label">Bairro</label>
                <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" placeholder="Centro"
                       name="district" value="{{ old("district") }}">
                @error('district')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Cidade</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Nova Friburgo"
                       value="{{ old("city") }}">
                @error('city')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">Estado</label>
                <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" placeholder="RJ"
                       value="{{ old("state") }}">
                @error('state')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <a class="btn btn-secondary" href="{{ route('clients.show', $client->id) }}">Pular</a>
            <button type="reset" class="btn btn-danger">Resetar</button>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </section>

</x-main>
