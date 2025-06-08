<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Previsão do Tempo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4">☀️ Previsão do Tempo</h1>
            <p class="lead">Consulte a previsão atual da sua cidade</p>
        </div>

        {{-- Mensagens de sucesso ou erro --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @endif

        {{-- Formulário de busca --}}
        <form action="{{ route('previsao.buscar') }}" method="POST" class="mb-4">
            @csrf
            <div class="input-group">
                <input 
                    type="text" 
                    name="cidade" 
                    class="form-control" 
                    placeholder="Digite o nome da cidade (ex: São Paulo)" 
                    required 
                    autofocus
                >
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </form>

        {{-- Previsões exibidas --}}
        <div class="row">
            @forelse($previsoes as $previsao)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $previsao->cidade }}</h5>
                            <p class="card-text"><strong>Descrição:</strong> {{ ucfirst($previsao->descricao) }}</p>
                            <p class="card-text"><strong>Temperatura:</strong> {{ $previsao->temperatura }} °C</p>
                        </div>
                        <div class="card-footer text-muted small">
                            Atualizado em: {{ $previsao->updated_at->format('d/m/Y H:i') }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Nenhuma previsão encontrada.</p>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
