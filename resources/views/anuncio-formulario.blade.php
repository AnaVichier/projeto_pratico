<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #333;
        background-color: #f5f5f5;
        padding: 20px;
    }

    h2 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }

    form {
        max-width: 800px;
        margin: 0 auto;
        padding: 30px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin: 15px 0 5px;
        font-weight: 600;
        color: #2c3e50;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        transition: border 0.3s;
        box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    button {
        display: block;
        width: 100%;
        padding: 12px;
        margin-top: 25px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #2980b9;
    }

    @media (max-width: 600px) {
        form {
            padding: 20px;
        }
        
        h2 {
            font-size: 24px;
        }
    }

    select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 15px;
    }
</style>


<h2>{{ isset($anuncio) ? 'Editar Anúncio' : 'Cadastrar Anúncio' }}</h2>

<form action="{{ isset($anuncio) ? route('anuncio-store') : route('anuncio-store') }}" method="POST">
    @csrf

    <input type="hidden" name="id_anuncio" value="{{ $anuncio->id_anuncio ?? '' }}">

    <label>Título:</label>
    <input type="text" name="titulo" value="{{ $anuncio->titulo ?? '' }}" required><br>

    <label>Descrição:</label>
    <textarea name="descricao">{{ $anuncio->descricao ?? '' }}</textarea><br>

    <label>Preço:</label>
    <input type="number" step="0.01" name="preco" value="{{ $anuncio->preco ?? '' }}" required><br>

    <label>Data Publicação:</label>
    <input type="date" name="data_publicacao" value="{{ $anuncio->data_publicacao ?? '' }}" required><br>

    <label>Proprietário:</label>
    <select name="id_proprietario">
        @foreach($proprietarios as $proprietario)
            <option value="{{ $proprietario->id_proprietario }}"
                {{ isset($anuncio) && $anuncio->id_proprietario == $proprietario->id_proprietario ? 'selected' : '' }}>
                {{ $proprietario->nome }}
            </option>
        @endforeach
    </select><br>

    <label>Veículo:</label>
    <select name="id_veiculo">
        @foreach($veiculos as $veiculo)
            <option value="{{ $veiculo->id_veiculo }}"
                {{ isset($anuncio) && $anuncio->id_veiculo == $veiculo->id_veiculo ? 'selected' : '' }}>
                {{ $veiculo->modelo }} - {{ $veiculo->placa }}
            </option>
        @endforeach
    </select><br>

    <button type="submit">{{ isset($anuncio) ? 'Atualizar' : 'Criar' }}</button>
</form>
