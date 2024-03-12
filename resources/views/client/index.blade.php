<x-main>
    <x-slot:title>Clientes</x-slot:title>

    <section class="d-flex justify-content-between align-content-center bg-body-tertiary rounded-3 p-2 mt-3"
             style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h5 class="m-0">Clientes</h5>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Clientes</li>
        </ol>
    </section>
    <section class="bg-body-tertiary rounded-3 p-2 mt-3">
        <a href="{{ route('clients.create') }}" class="col-12 btn btn-primary">
            Novo Cliente
        </a>
        <div class="table-responsive rounded-3 mt-3">
            <table class="table table-hover">
                <thead class="rounded-3">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
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
                        <td>
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-main>
