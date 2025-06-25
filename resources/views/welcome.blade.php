<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Anúncios</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }
        
        .container {
            text-align: center;
            max-width: 900px;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }
        
        .description {
            margin-bottom: 40px;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        .button-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }
        
        .nav-button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s;
            min-width: 180px;
        }
        
        .nav-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .nav-button.veiculos {
            background-color: #2ecc71;
        }
        
        .nav-button.proprietarios {
            background-color: #9b59b6;
        }
        
        .nav-button.anuncios {
            background-color: #e74c3c;
        }
        
        .footer {
    
            color: #7f8c8d;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Sistema de Anúncios</h1>

        <div class="description">
            <p>Gerencie veículos, proprietários e anúncios de forma simples, rápida e eficiente.</p>
            <p>Escolha uma opção abaixo para começar:</p>
        </div>

        <div class="button-group">
            <a href="{{ route('veiculo-formulario') }}" class="nav-button veiculos">Gerenciar Veículos</a>
            <a href="{{ route('proprietario-formulario') }}" class="nav-button proprietarios">Gerenciar Proprietários</a>
            <a href="{{ route('anuncio-formulario') }}" class="nav-button anuncios">Gerenciar Anúncios</a>
        </div>

        <div class="footer">
            <p>Sistema desenvolvido por © {{ date('Y') }}</p>
        </div>
    </div>
</body>
</html>