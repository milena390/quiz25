<?php
$servername = "localhost";
$username = "root";
$password = "&tec77@info!";
$dbname = "db_quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT usr.nome_usuario, rk.pontuacao FROM db_quiz.tbl_ranking rk 
            INNER JOIN db_quiz.tbl_usuario usr
            ON rk.tbl_usuario_usuario_id = usr.usuario_id
            ORDER BY rk.pontuacao DESC";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking - Sistema Solo Leveling</title>
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

        /* Cabeçalho estilizado */
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
            transition: background 0.3s;
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

        /* Estilo da tabela de ranking */
        .ranking-container {
            background-color: #121212;
            border-radius: 8px;
            width: 600px;
            padding: 20px;
            box-shadow: 0 0 15px #6e6e6e;
            margin-top: 100px; /* Adiciona espaço acima do container */
            text-align: center;
        }

        .ranking-container h2 {
            color: rgb(32,178,170);
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #444;
        }

        table th {
            background-color: rgb(32,178,170);
            color: #121212;
        }

        table tr:nth-child(even) {
            background-color: #1a1a1a;
        }

        table tr:hover {
            background-color: #333;
        }

        /* Botão de voltar */
        .back-button {
            background-color: rgb(46, 69, 117);
            color: #fff;
            padding: 10px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: rgb(49, 57, 122);
        }
    </style>
</head>

<body>

    <header>
        <h1>Quiz</h1>
        <p>Bem-vindo ao Ranking</p>
        <hr>
        <nav>
            <ul>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="ranking.php">Visualizar ranking</a></li>
                <li><a href="index.html">Voltar ao início</a></li>
            </ul>
        </nav>
    </header>

    <!-- Container do ranking -->
    <div class="ranking-container">
        <h2>Ranking dos Jogadores</h2>

        <table>
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Nome</th>
                    <th>Pontos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    $colocao = 1;
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                            echo '<td>' . $colocao . '</td>';
                            echo '<td>' . $row["nome_usuario"] . '</td>';
                            echo '<td>' . $row["pontuacao"] . '</td>';
                        echo '</tr>';  
                        $colocao = $colocao + 1;
                    }
                }else {
                    echo "0 results";
                }
                  $conn->close();
                ?>
                              
            </tbody>
        </table>
       

        <!-- Botão para voltar -->
        <button class="back-button" onclick="window.location.href='../index.html'">Voltar ao início</button>
    </div>
</body>
</html>
