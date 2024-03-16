<x-main>
    <x-slot:title>Editar Cliente</x-slot:title>
    <x-slot:links>
        @vite(['resources/js/clientCreate.js'])
    </x-slot:links>

    <section class="d-flex justify-content-between align-content-center flex-wrap bg-body-tertiary rounded-3 p-3 mt-3"
             style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h5 class="m-0">Editar cliente</h5>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item"><a href="/clients">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar cliente</li>
        </ol>
    </section>

    <section class="bg-body-tertiary rounded-3 p-3 mt-3">
        <form action="{{ route('clients.update', $client->id) }}" method="post">
            @csrf
            @METHOD('PUT')
            <p class="form-label">
                Tipo de conta
            </p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="account_type" id="account_typeF"
                       value="0" {{ $client->account_type == '0' ? 'checked' : '' }}>
                <label class="form-check-label" for="account_typeF">
                    Pessoa Física
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="account_type" id="account_typeJ"
                       value="1" {{ $client->account_type == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="account_typeJ">
                    Pessoa Jurídica
                </label>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ $client->name }}">
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
                       value="{{ $client->email }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Telefone</label>
                <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                       name="phone_number"
                       placeholder="(22) 99999-9999" value="{{ $client->phone_number }}" maxlength="15">
                @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
                <input type="text" class="form-control @error('cpf_cnpj') is-invalid @enderror" id="cpf_cnpj"
                       name="cpf_cnpj"
                       placeholder="999.999.999-99 ou 99.999.999/9999-99" value="{{ $client->cpf_cnpj }}"
                       maxlength="18">
                @error('cpf_cnpj')
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
