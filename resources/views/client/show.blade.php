<x-main>
    <x-slot:title>{{ $client->name }}</x-slot:title>

    <section class="d-flex justify-content-between align-content-center flex-wrap bg-body-tertiary rounded-3 p-3 mt-3"
             style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h5 class="m-0">Mostrar cliente</h5>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item"><a href="/clients">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mostrar cliente</li>
        </ol>
    </section>

    <section class="bg-body-tertiary d-md-flex justify-content-between flex-wrap rounded-3 p-3 mt-3">
        <div>
            <h4 class="mb-0">{{ strtoupper($client->name) }}</h4>
            <p class="f2-6 text-secondary-emphasis mb-0">
                <a class="text-decoration-none link-secondary text-secondary-emphasis"
                   href="mailto:{{ $client->email }}">{{ $client->email }}</a>
                •
                <a class="text-decoration-none link-secondary text-secondary-emphasis"
                   href="tel:{{ $client->phone_number }}">{{ $client->phone_number }}</a>
            </p>

            @if($client->account_type === 0)
                <p class="fs-6 text-secondary-emphasis mb-0">Conta Física • {{ $client->cpf_cnpj }}</p>
            @else
                <p class="fs-6 text-secondary-emphasis mb-0">Conta Jurídica • {{ $client->cpf_cnpj }}</p>
            @endif
        </div>

        <div>
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning mt-3"><i
                    class="bi bi-pencil-square"></i></a>
            <form action="{{ route('clients.destroy', $client->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3"><i class="bi bi-trash"></i></button>
            </form>
        </div>
    </section>

    <section class="bg-body-tertiary rounded-3 p-3 mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="{{ route('clients.address.create', $client->id) }}" class="col-12 btn btn-primary">
            Novo Endereço
        </a>
        @if($client->address !== null)
            @php($i = 0)
            @foreach($client->address as $address)
                <div class="d-md-flex justify-content-between flex-wrap mt-3">
                    <div>
                        <h4 class="mb-0">{{ $address->street }}, {{ $address->number }},</h4>
                        <p class="f2-6 text-secondary-emphasis mb-0">
                            @if($address->complement !== null)
                                {{ $address->complement }},
                            @endif
                            {{ $address->district }}, {{ $address->city }}, {{ $address->state }}, {{ $address->zip }}
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('address.edit', $address->id) }}"
                           class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('address.destroy', $address->id) }}" method="post"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                <hr class="mb-0">
            @endforeach
        @endif
    </section>
</x-main>
