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
        <h3>Dados</h3>
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
            <input type="tel" class="form-control" id="phone_number" name="phone_number"
                   value="{{ $client->phone_number }}" disabled>
        </div>
        <div class="mb-3">
            <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{ $client->cpf_cnpj }}"
                   disabled>
        </div>
        <div>
            <label for="account_type" class="form-label">Tipo de conta</label>
            @if($client->account_type === 0)
                <input type="text" class="form-control" id="account_type" name="account_type" value="Conta Física"
                       disabled>
            @else
                <input type="text" class="form-control" id="account_type" name="account_type" value="Conta Jurídica"
                       disabled>
            @endif
        </div>
    </section>

    <section class="bg-body-tertiary rounded-3 p-2 mt-3">
        <a href="{{ route('clients.address.create', $client->id) }}" class="col-12 btn btn-primary">
            Novo Endereço
        </a>
        @if($client->address != null)
            @php($i = 0)
            @foreach($client->address as $address)
                <div class="mt-3">
                    <h3>Endereço {{ ++$i }}</h3>
                    <div class="mb-3">
                        <label for="street" class="form-label">Logradouro</label>
                        <input type="text" class="form-control" id="street" name="street" value="{{ $address->street }}"
                               disabled>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Número</label>
                        <input type="text" class="form-control" id="number" name="number" value="{{ $address->number }}"
                               disabled>
                    </div>
                    <div class="mb-3">
                        <label for="complement" class="form-label">Complemento</label>
                        <input type="text" class="form-control" id="complement" name="complement"
                               value="{{ $address->complement }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="district" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="district" name="district"
                               value="{{ $address->district }}"
                               disabled>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $address->city }}"
                               disabled>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="state" name="state" value="{{ $address->state }}"
                               disabled>
                    </div>
                    <div class="mb-3">
                        <label for="zip" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="zip" name="zip" value="{{ $address->zip }}"
                               disabled>
                    </div>

                    <a href="{{ route('address.edit', $address->id) }}"
                       class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('address.destroy', $address->id) }}" method="post"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            @endforeach
        @endif
    </section>
</x-main>
