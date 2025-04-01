<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Quiz rank S</title>
    <style>
    body {
        font-family: 'Playfair Display', serif;
        background: linear-gradient(135deg, rgb(20, 21, 22), #0d0c17); 
        color: #E0E0E0;
        margin: 0;
        padding: 0;
        padding-top: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Faz o body ocupar toda a altura da tela */
        flex-direction: column; /* Alinha os itens verticalmente */
    }
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
    header:hover {
        background: linear-gradient(135deg, rgb(23, 34, 53), rgb(0, 0, 0)); /* Efeito de hover */
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
    .quiz-container {
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #444;
        border-radius: 10px;
        background: linear-gradient(145deg, #2e2e2e, #1a1a1a);
        max-width: 600px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.7);
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 100px; /* Adiciona espaço acima do container */
    }
    h1 {
        font-size: 2em;
        color: rgb(32,178,170);
    }
    .question {
        margin: 20px 0;
    }
    button {
        background-color: #4682B4;
        color: #fff;
        border: none;
        padding: 10px 20px;
        margin: 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
    }
    button:hover {
        background-color: rgb(12, 38, 71);
    }
    .result {
        font-size: 1.5em;
        margin-top: 20px;
    }
    #restart-button {
        background-color: #4682B4;
        color: #fff;
        border: none;
        padding: 10px 20px;
        margin: 10px;
        border-radius: 50px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s;
        display: none;
    }
    #restart-button:hover {
        background-color: rgb(12, 38, 71);
    }
    .notification {
        background: linear-gradient(135deg, #16106f, #00aaff);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 20px rgba(42, 39, 104, 0.5);
        position: fixed; /* Mudei de relative para fixed */
        top: 20px; /* Ajuste a posição vertical conforme necessário */
        left: 20px; /* Ajuste a posição horizontal conforme necessário */
        animation: fadeIn 0.5s ease, scaleIn 0.3s ease; /* Animações de fade e escala mais suaves */
        text-align: center; /* Centraliza o texto dentro da notificação */
        display: none; /* Inicialmente escondido */
        color: #ffffff; /* Cor do texto */
        font-size: 16px; /* Tamanho da fonte */
        z-index: 2000; /* Adicione um z-index alto para garantir que fique acima de outros elementos */
    }
    .close-btn {
        background: transparent; /* Torna o fundo do botão transparente */
        border: none; /* Remove a borda */
        color: #ffffff; /* Cor do texto do botão */
        font-size: 20px; /* Tamanho do texto do botão */
        cursor: pointer; /* Muda o cursor para indicar que é clicável */
        position: absolute; /* Posiciona o botão no canto superior direito da notificação */
        top: 10px; /* Distância do topo */
        right: 10px; /* Distância da direita */
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1; /* Corrigido de 01 para 1 */
        }
    }
    @keyframes scaleIn {
        from {
            transform: scale(0.8);
        }
        to {
            transform: scale(1);
        }
    }
</style>
</head>

<body>
    <div class="notification" id="notification1">
        <button class="close-btn" onclick="closeNotification('notification1')">×</button>
        <h2>Notificação</h2>
        <p>As perguntas podem conter spoilers do manga!</p>
    </div>

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

    <div class="quiz-container">
        <h1>Perguntas:</h1>
        <div id="question-container">
            <!-- Perguntas serão injetadas aqui -->
        </div>
        <div id="result" class="result"></div>
        <button id="restart-button" style="display: none;">Reiniciar Quiz</button>
    </div>

    <script>
        const questions = [
            {
                question: "Qual era o método usado por Sung Jin-Woo para calcular sua experiência e progresso no sistema?",
                options: ["A) Através de um contador de energia mágica  ", "B) Por meio de missões e conquistas ", "C) Medindo a força dos inimigos derrotados  ", "D) Usando uma fórmula pré-determinada pelo sistema   "],
                answer: 'B'
            },
            {
                question: "Qual habilidade inicial foi crucial para Sung Jin-Woo sobreviver às Dungeons de maior risco?",
                options: ["A) Resistência mágica   ", "B)  Movimento furtivo   ", "C) Capacidade de adaptação rápida  ", "D) Poder de invocação  "],
                answer: 'B'
            },
            {
                question: "O que define o funcionamento do sistema que Sung Jin-Woo utiliza?",
                options: ["A) Ele é baseado em uma programação misteriosa   ", "B)  Ele responde diretamente às ações do jogador  ", "C) Ele opera como uma interface de aprendizado progressivo ", "D) Ele cria desafios adaptados às condições do jogador  "],
                answer: 'B'
            },
            {
                question: "Qual tipo de criatura oferecia os maiores desafios iniciais nas Dungeons comuns?",
                options: ["A) Monstros de habilidades mágicas ", "B) Inimigos de ataque em grupo  ", "C)  Criaturas com ataques venenosos  ", "D) Guardiões de corredores estreitos "],
                answer: 'C'
            },
            {
                question: "Que estratégia Sung Jin-Woo usava frequentemente para superar monstros mais fortes?",
                options: ["A) Usar armadilhas inteligentes   ", "B)  Combinar ataques diretos e distrações  ", "C) Explorar pontos fracos específicos  ", "D) Evitar confrontos desnecessários  "],
                answer: 'C'
            },
            {
                question: "Em que momento o sistema recompensava Sung Jin-Woo com itens ou habilidades raras?",
                options: ["A) Após completar desafios épicos ", "B) Quando derrotava chefes únicos  ", "C) Ao atingir certos marcos de progresso ", "D) Após decifrar enigmas dentro das Dungeons  "],
                answer: 'A'
            },
            {
                question: " Qual era o papel das missões diárias no desenvolvimento de Sung Jin-Woo?",
                options: ["A) Testar sua resistência mental e física", "B) Prepará-lo para desafios maiores  ", "C) Garantir que ele permanecesse ativo no sistema ", "D) Permitir que ele acumulasse experiência básica  "],
                answer: 'C'
            },
            {
                question: "Que elemento-chave tornava as habilidades de Sung Jin-Woo versáteis em batalha?",
                options: ["A) A diversidade de poderes mágicos disponíveis ", "B) A personalização dos atributos conforme a situação   ", "C) A evolução de habilidades específicas com o tempo ", "D)  O controle sobre o ambiente ao seu redor"],
                answer: 'B'
            },
            {
                question: "Qual foi o maior obstáculo que Sung Jin-Woo enfrentou em uma Dungeon de alto rank?",
                options: ["A) Criaturas que anulavam suas habilidades ", "B) Desafios que exigiam trabalho em equipe ", "C) Barreira mágica que limitava movimentos  ", "D) Chefes que testavam sua capacidade estratégica  "],
                answer: 'A'
            },
            {
                question: "Que tipo de item Sung Jin-Woo usava para melhorar suas estatísticas principais?",
                options: ["A) Armaduras reforçadas", "B) Relíquias mágicas encontradas em missões", "C) Amuletos com poderes especiais ", "D) Ferramentas invocadas pelo sistema "],
                answer: 'B'
            },
            {
                question: "Qual técnica Sung Jin-Woo dominou para maximizar seu desempenho em combates?",
                options: ["A) Combinação de habilidades ofensivas e defensivas  ", "B) Uso de invocações como suporte estratégico ", "C) Aperfeiçoamento de movimentos rápidos e precisos ", "D)  Treinamento constante em batalhas simuladas "],
                answer: 'A'
            },
            {
                question: "O que diferenciava os aliados que Sung Jin-Woo invocava em combate?",
                options: ["A) A força individual deles era adaptável  ", "B) Eles tinham habilidades complementares únicas", "C)  A conexão dele com eles os tornava mais poderosos ", "D) Eles podiam evoluir conforme o jogador crescia "],
                answer: 'B'
            },
            {
                question: "Que característica das Dungeons fazia com que elas fossem mais desafiadoras para Sung Jin-Woo?",
                options: ["A) Ambientes imprevisíveis", "B) Limitações mágicas impostas ao jogador ", "C) Criaturas que aprendiam com os padrões de ataque  ", "D) Chefes que se regeneravam durante batalhas "],
                answer: 'A'
            },
            {
                question: "Como Sung Jin-Woo conseguia equilibrar estratégia e combate direto nas missões?",
                options: ["A)  Planejando cada etapa com antecedência ", "B) Adaptando-se rapidamente ao desconhecido", "C) Usando habilidades para manipular o campo de batalha", "D)  Reforçando sua força física e mental "],
                answer: 'A'
            },
            {
                question: " Que atributo era mais importante para Sung Jin-Woo durante seus treinamentos diários?",
                options: ["A) Precisão e velocidade de reação  ", "B) Controle sobre os poderes mágicos", "C) Resistência a ataques imprevistos", "D) Determinação para superar seus próprios limites"],
                answer: 'D'
            }
        ];

        let currentQuestionIndex = 0;
        let score = 0;

        function showQuestion(index) {
            const questionContainer = document.getElementById('question-container');
            questionContainer.innerHTML = ''; // Limpa a pergunta anterior
            const question = questions[index];

            const questionElement = document.createElement('div');
            questionElement.className = 'question';
            questionElement.innerHTML = `<p>${index + 1}. ${question.question}</p>`;

            question.options.forEach(option => {
                const button = document.createElement('button');
                button.innerText = option;
                button.onclick = () => checkAnswer(question.answer, option.charAt(0));
                questionElement.appendChild(button);
            });

            questionContainer.appendChild(questionElement);
        }

        function checkAnswer(correctAnswer, selectedOption) {
            if (correctAnswer === selectedOption) {
                score++;
            }
            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) {
                showQuestion(currentQuestionIndex);
            } else {
                showResult();
            }
        }

        function showResult() {
            const questionContainer = document.getElementById('question-container');
            questionContainer.innerHTML = ''; // Limpa as perguntas
            const resultElement = document.getElementById('result');
            resultElement.innerText = `Sua pontuação foi: ${score} de ${questions.length}`;
            document.getElementById('restart-button').style.display = 'block'; // Mostra o botão de reiniciar
        }

        document.getElementById('restart-button').onclick = function() {
            currentQuestionIndex = 0; // Reinicia o índice da pergunta
            score = 0; // Reinicia a pontuação
            showQuestion(currentQuestionIndex); // Mostra a primeira pergunta
            this.style.display = 'none'; // Esconde o botão de reiniciar
        };

        function closeNotification(notificationId) {
            document.getElementById(notificationId).style.display = 'none'; // Esconde a notificação
        }

        // Inicia o quiz mostrando a primeira pergunta
        showQuestion(currentQuestionIndex);

        // Exibe a notificação ao carregar a página
        document.getElementById('notification1').style.display = 'block';
    </script>
</body>
</html>