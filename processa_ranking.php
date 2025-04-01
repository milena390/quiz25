<?php
// Conectar ao banco de dados (ou criar um novo)
$dsn = 'sqlite:db_quiz.tbl_usuario'; // Usando SQLite
try {
    $conn = new PDO($dsn);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criar a tabela de ranking (se não existir)
    $conn->exec('
    CREATE TABLE IF NOT EXISTS ranking (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        pontuacao INTEGER NOT NULL
    )
    ');

    // Função para inserir um novo jogador no ranking
    function inserir_jogador($conn, $nome, $pontuacao) {
        $stmt = $conn->prepare('
        INSERT INTO ranking (nome, pontuacao)
        VALUES (:nome, :pontuacao)
        ');
        $stmt->execute([':nome' => $nome, ':pontuacao' => $pontuacao]);
    }

    // Função para atualizar a pontuação de um jogador
    function atualizar_pontuacao($conn, $nome, $nova_pontuacao) {
        $stmt = $conn->prepare('
        UPDATE ranking
        SET pontuacao = :nova_pontuacao
        WHERE nome = :nome
        ');
        $stmt->execute([':nova_pontuacao' => $nova_pontuacao, ':nome' => $nome]);
    }

    // Função para consultar o ranking
    function consultar_ranking($conn, $limite = 10) {
        $stmt = $conn->prepare('
        SELECT nome, pontuacao
        FROM ranking
        ORDER BY pontuacao DESC
        LIMIT :limite
        ');
    
        $stmt->bindParam(':limite', $limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Inserir alguns jogadores (exemplo)
    inserir_jogador($conn, 'usuario1', 1500);
    inserir_jogador($conn, 'usuario2', 2000);
    inserir_jogador($conn, 'usuario3', 1800);

    // Atualizar a pontuação de um jogador
    atualizar_pontuacao($conn, 'usuario1', 1600);

    // Consultar o ranking
    $ranking = consultar_ranking($conn);
    echo "Ranking:\n";
    foreach ($ranking as $row) {
        echo "{$row['nome']}: {$row['pontuacao']}\n";
    }

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar a conexão
$conn = null;
?>