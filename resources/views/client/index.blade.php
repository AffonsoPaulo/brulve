<x-main>
    <x-slot:title>Clientes</x-slot:title>
    <x-slot:links>
        @vite(['resources/js/clientIndex.js'])
    </x-slot:links>
    <section class="d-flex justify-content-between align-content-center flex-wrap bg-body-tertiary rounded-3 p-3 mt-3"
             style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h5 class="m-0">Clientes</h5>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Clientes</li>
        </ol>
    </section>
    <section class="bg-body-tertiary rounded-3 p-3 mt-3">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ route('clients.create') }}" class="col-12 btn btn-primary">
            Novo Cliente
        </a>

        <form action="{{ route('clients.search') }}" method="post" class="input-group mb-3 mt-3" id="search_form">
            <div class="input-group-text">
                <input class="form-check-input mt-0 me-1" type="radio" value="name" id="name" name="search_filter"
                       checked>
                <label for="name">Nome</label>
            </div>
            <div class="input-group-text">
                <input class="form-check-input mt-0 me-1" type="radio" value="email" id="email"
                       name="search_filter">
                <label for="email">E-mail</label>
            </div>
            <div class="input-group-text">
                <input class="form-check-input mt-0 me-1" type="radio" value="phone_number" id="phone_number"
                       name="search_filter">
                <label for="phone_number">Telefone</label>
            </div>
            <div class="input-group-text">
                <input class="form-check-input mt-0 me-1" type="radio" value="cpf_cnpj" id="cpf_cnpj"
                       name="search_filter">
                <label for="cpf_cnpj">CPF/CNPJ</label>
            </div>
            <input type="text" class="form-control" name="search" id="search" aria-label="Procurar"
                   placeholder="Procurar">
            @csrf
            <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
        </form>


        <div class="table-responsive rounded-3 mt-3">
            <table class="table table-hover align-middle">
                <thead class="rounded-3">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Tipo de conta</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <th scope="row">{{ $client->id }}</th>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone_number }}</td>
                        @if($client->account_type === 0)
                            <td>Conta Física</td>
                        @else
                            <td>Conta Jurídica</td>
                        @endif
                        <td>{{ $client->cpf_cnpj }}</td>
                        <td>
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary"><i
                                    class="bi bi-person-lines-fill"></i></a>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="post"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-main>
