<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #333;
        background-color: #f8f9fa;
        padding: 20px;
    }

    form {
        max-width: 600px;
        margin: 30px auto;
        padding: 30px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }

    label {
        display: block;
        margin: 20px 0 8px;
        font-weight: 600;
        color: #495057;
        font-size: 15px;
    }

    input[type="text"] {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ced4da;
        border-radius: 6px;
        font-size: 16px;
        transition: all 0.3s;
        box-sizing: border-box;
    }

    input[type="text"]:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    }

    button[type="submit"] {
        width: 100%;
        padding: 14px;
        margin-top: 30px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #2980b9;
    }

    .error-message {
        color: #e74c3c;
        font-size: 14px;
        margin-top: 5px;
    }

    input.error {
        border-color: #e74c3c;
    }

    @media (max-width: 768px) {
        form {
            padding: 20px;
        }
        
        h2 {
            font-size: 24px;
        }
    }

    @media (min-width: 992px) {
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .full-width {
            grid-column: span 2;
        }
    }
</style>
<h2>{{ isset($veiculo) ? 'Editar' : 'Cadastrar' }}</h2>

<form action="{{ route('veiculo-store') }}" method="POST">
    @csrf

    {{-- Essa linha irá recuperar o ID e deixar invisível --}}
    <input type="hidden" name="id_veiculo" value="{{ $veiculo->id_veiculo ?? '' }}">

    
    <label for="marca">Marca</label>
    <input type="text" name="marca" id="marca" value={{ $veiculo-> marca ?? old('marca') }}>

    <label for="modelo">Modelo</label>
    <input type="text" name="modelo" id="modelo" value={{ $veiculo-> modelo ?? old('modelo') }}>

    <label for="ano">ano</label>
    <input type="text" name="ano" id="ano" value={{ $veiculo-> ano ?? old('ano') }}>

    <label for="placa">Placa</label>
    <input type="text" name="placa" id="placa" value={{ $veiculo-> placa ?? old('placa') }}>

    <label for="cor">Cor</label>
    <input type="text" name="cor" id="cor" value={{ $veiculo-> cor ?? old('cor') }}>

    <button type="submit">Cadastrar</button>
</form>