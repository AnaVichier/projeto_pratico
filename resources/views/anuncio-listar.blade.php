<style>
    /* Estilo geral da página de listagem */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #333;
        background-color: #f5f5f5;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    h2 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color: #2c3e50; /* Preto azulado */
        color: white;
    }

    th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        border: none; /* Remove bordas */
    }

    td {
        padding: 12px 15px;
        border-bottom: 1px solid #e9ecef; /* Linha divisória mais suave */
    }

    tr:last-child td {
        border-bottom: none;
    }

    /* Efeito hover sem piscar */
    tbody tr {
        transition: background-color 0.2s ease;
    }

    tbody tr:hover {
        background-color: #f8f9fa; /* Cor mais suave que não pisca */
    }

    /* Mensagem de sucesso */
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 12px;
        border-radius: 4px;
        text-align: center;
        margin-bottom: 20px;
        border: 1px solid #c3e6cb;
    }

    /* Container da tabela */
    .table-container {
        background-color: white;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        margin-top: 20px;
    }

    


    /* Botões */
    .add-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .add-button:hover {
        background-color: #218838;
    }

    .nav-button {
        display: inline-block;
        padding: 10px 15px;
        margin: 0 5px 5px 0;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-weight: 500;
        transition: background-color 0.3s;
    }

    .nav-button:hover {
        background-color: #5a6268;
    }

    .button-group {
        margin-bottom: 20px;
    }

    /* Links de ação */
    .action-link {
        color: #3498db;
        text-decoration: none;
        margin: 0 5px;
        font-weight: 500;
        transition: color 0.3s;
    }

    .action-link:hover {
        color: #2980b9;
        text-decoration: underline;
    }

    .action-link.delete {
        color: #e74c3c;
    }

    .action-link.delete:hover {
        color: #c0392b;
    }

    /* Formatação especial */
    .price {
        font-weight: 600;
        color: #27ae60;
    }

    .vehicle-info {
        font-weight: 500;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .table-container {
            overflow-x: auto;
        }
        
        th, td {
            padding: 10px;
            font-size: 14px;
        }
        
        h2 {
            font-size: 24px;
        }
        
        .add-button, .nav-button {
            padding: 8px 12px;
            font-size: 14px;
        }
    }

    /* Separador entre links */
    .action-separator {
        color: #ddd;
        margin: 0 5px;
    }
</style>

<h2>Lista de Anúncios</h2>

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="button-group">
    <a href="{{ route('anuncio-formulario') }}" class="add-button">+ Novo Anúncio</a>
    <a href="{{ route('veiculo-formulario') }}" class="nav-button">+ Veículo</a>
    <a href="{{ route('proprietario-formulario') }}" class="nav-button">+ Proprietário</a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Proprietário</th>
                <th>Veículo</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anuncios as $anuncio)
                <tr>
                    <td>{{ $anuncio->titulo }}</td>
                    <td>{{ $anuncio->proprietario->nome ?? 'N/A' }}</td>
                    <td class="vehicle-info">{{ $anuncio->veiculo->modelo ?? 'N/A' }} - {{ $anuncio->veiculo->placa ?? '' }}</td>
                    <td class="price">R$ {{ number_format($anuncio->preco, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('anuncio-editar', ['id_anuncio' => $anuncio->id_anuncio]) }}" class="action-link">Editar</a>
                        <span class="action-separator">|</span>
                        <a href="{{ route('anuncio-remove', ['id_anuncio' => $anuncio->id_anuncio]) }}" 
                           class="action-link delete"
                           onclick="return confirm('Tem certeza que deseja remover este anúncio?')">
                           Remover
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>