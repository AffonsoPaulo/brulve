<x-main>
    <x-slot:title>{{ $client->name }}</x-slot:title>

    <section class="d-flex justify-content-between align-content-center bg-body-tertiary rounded-3 p-2 mt-3"
             style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h5 class="m-0">Mostrar cliente</h5>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item"><a href="/clients">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mostrar cliente</li>
        </ol>
    </section>

    <section class="bg-body-tertiary rounded-3 p-2 mt-3">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" disabled>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ $client->phone_number }}" disabled>
        </div>
        <div class="mb-3">
            <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{ $client->cpf_cnpj }}" disabled>
        </div>
        <div>
            <label for="account_type" class="form-label">Tipo de conta</label>
            @if($client->account_type === 0)
                <input type="text" class="form-control" id="account_type" name="account_type" value="Conta Física" disabled>
            @else
                <input type="text" class="form-control" id="account_type" name="account_type" value="Conta Jurídica" disabled>
            @endif
        </div>

    </section>


</x-main>
