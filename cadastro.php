<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Sistema Solo Leveling</title>
    <style>
        /* Estilo geral */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #0e0e0e, #1f1f1f);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column; /* Alinha o conteúdo verticalmente */
        }

        /* Container com efeito de animação */
        .container {
            background-color: #121212;
            border: 2px solid #6e6e6e;
            border-radius: 8px;
            padding: 20px;
            width: 350px;
            box-shadow: 0 0 15px #6e6e6e;
            animation: fadeIn 1.5s ease-in-out; /* Efeito de entrada */
            position: relative; /* Para o z-index funcionar */
            z-index: 1; /* Garante que o container fique acima do fundo */
            margin-top: 80px; /* Espaço para não ficar atrás do header */
        }

        /* Animação de entrada */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Cabeçalho estilizado com animação */
        header {
            background: linear-gradient(135deg, rgb(0, 0, 0), rgb(23, 34, 53));
            color: #E0E0E0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            padding: 10px 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); /* Sombra mais suave */
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: background 0.3s; /* Transição suave para o fundo */
        }

        header h1 {
            color: rgb(32,178,170);
            font-size: 28px;
            margin: 0;
        }

        header p {
            font-size: 16px;
            color: rgb(192,192,192);
            margin: 5px 0 15px;
        }

        hr {
            width: 60%;
            border: none;
            border-top: 2px solid #4682B4;
            margin: 20px auto;
            opacity: 0.5;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 30px;
            margin-top: 10px;
        }

        nav a {
            color: rgb(192,192,192);
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            text-transform: uppercase;
            position: relative;
            transition: color 0.3s, transform 0.3s;
        }

        nav a:hover {
            color: rgb(70,130,180);
            transform: translateY(-3px);
        }

        /* Estilo dos labels e inputs */
        .container label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            color: #ccc;
        }

        .container input[type="text"],
        .container input[type="email"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
            background-color: #1f1f1f;
            color: #fff;
            outline: none;
            box-shadow: 0 0 5px #6e6e6e;
            transition: box-shadow 0.3s ease;
        }

        .container input:focus {
            box-shadow: 0 0 10px rgb(20, 32, 102); /* Efeito ao focar */
        }

        /* Botão com animação */
        .container button {
            width: 100%;
            padding: 10px;
            background-color: rgb(46, 69, 117);
            color: #121212;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .container button:hover {
            background-color: rgb(49, 57, 122);
            transform: scale(1.1); /* Botão aumenta ao passar o mouse */
        }

        /* Adicionando gráficos (elemento visual ao fundo) */
        .background-effect {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(18, 42, 150, 0.2) 20%, transparent 80%);
            animation: rotateEffect 10s infinite linear; /* Efeito de rotação suave */
            z-index: 0; /* Fundo deve estar atrás do container */
        }

        @keyframes rotateEffect {
            from {
                transform: translate(-50%, -50%) rotate(0deg);
            }
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Quiz</h1>
        <p>Bem-vindo Jogador</p>
        <hr>
        <nav>
            <ul>
                <li><a href="../cadastro/cadastro.php">Cadastro</a></li>
                <li><a href="../ranking/ranking.php">Visualizar ranking</a></li>
                <li><a href="../index.html">Voltar ao início</a></li>
            </ul>
        </nav>
    </header>

    <!-- Elemento de fundo gráfico -->
    <div class="background-effect"></div>

    <!-- Formulário de cadastro -->
    <div class="container">
        <h1>Cadastro</h1>
        <form action="processa_cadastro.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
