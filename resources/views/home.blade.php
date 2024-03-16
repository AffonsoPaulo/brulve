<x-main>
    <x-slot:title>Brulve</x-slot:title>

    <section class="d-flex justify-content-between align-content-center flex-wrap bg-body-tertiary rounded-3 p-3 mt-3"
             style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h5 class="m-0">Início</h5>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item active" aria-current="page">Início</li>
        </ol>
    </section>

    <section class="mt-3">
        <div class="row">
            <div class="col-12 col-md-4 col-sm-12 col-lg-3 mb-3">
                <div class="card text-center">
                    <a href="{{ route('clients.index') }}" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                        <div class="card-body p-4">
                            <i class="bi bi-people-fill fs-1"></i>
                            <h5 class="card-title">Clientes</h5>
                            <p class="card-text">Gerencie seus clientes.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-4 col-sm-12 col-lg-3 mb-3">
                <div class="card text-center">
                    <a href="{{ route('users.index') }}" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                    <div class="card-body p-4">
                        <i class="bi bi-gear-fill fs-1"></i>
                        <h5 class="card-title">Sistema</h5>
                        <p class="card-text">Gerencie seus usuários</p>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </section>


</x-main>
