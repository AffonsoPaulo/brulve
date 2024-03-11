<x-main>
    <x-slot:title>Clientes</x-slot:title>

    <section class="d-flex justify-content-between align-content-center bg-body-tertiary rounded-3 p-2 mt-2"
             style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h5 class="m-0">Clientes</h5>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Clientes</li>
        </ol>
    </section>

    <section>
        <button type="button" class="col-12 btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#createClient">
            Novo Cliente
        </button>
    </section>

    <section class="table-responsive">
        <table class="table table-hover mt-2">
            <thead>
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
    </section>

    <!-- Modal -->
    <div class="modal fade" id="createClient" tabindex="-1" aria-labelledby="createClientLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

            </div>
        </div>
    </div>

</x-main>
