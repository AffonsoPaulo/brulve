<x-main>
    <x-slot:title>Novo Cliente</x-slot:title>

    <section class="d-flex justify-content-between align-content-center bg-body-tertiary rounded-3 p-2 mt-3"
             style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h5 class="m-0">Adicionar clientes</h5>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item"><a href="/clients">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Adicionar cliente</li>
        </ol>
    </section>

    <section class="bg-body-tertiary rounded-3 p-2 mt-3">
        <form action="{{ route('clients.store') }}" method="post">
            @csrf
            <p class="form-label">
                Tipo de conta
            </p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="account_type" id="account_typeF" value="0"
                       checked>
                <label class="form-check-label" for="account_typeF">
                    Pessoa Física
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="account_type" id="account_typeJ" value="1">
                <label class="form-check-label" for="account_typeJ">
                    Pessoa Jurídica
                </label>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="nome@dominio.com">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number"
                       placeholder="(22) 99999-9999">
            </div>
            <div class="mb-3">
                <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
                <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj"
                       placeholder="999.999.999-99 ou 99.999.999/9999-99">
            </div>
            <button type="reset" class="btn btn-secondary">Resetar</button>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </section>

</x-main>
