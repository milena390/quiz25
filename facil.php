<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Quiz rank A</title>
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
        <p>As perguntas podem conter spoilers do anime!</p>
    </div>


    <header>
    <h1>Quiz</h1>
    <p>Bem-vindo Jogador</p>
    <hr>
    <nav>
        <ul>
        <li>
                <a href="../cadastro/cadastro.php">Cadastro</a></li>
                <li><a href="../ranking/ranking.php">Visualizar ranking</a></li>
                <li><a href="../index.html">Voltar ao início</a></li> <!-- Modificado aqui -->
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
                question: "Qual é o nome do protagonista de Solo Leveling?",
                options: ["A) Sung Jin-Woo", "B) Cha Hae-In", "C) Yoo Jin-Ho", "D) Baek Yoon-Ho"],
                answer: 'A'
            },
            {
                question: "Qual era o ranking inicial de Sung Jin-Woo antes de se tornar mais forte?",
                options: [" E-Rank", "B) C-Rank", "C) B-Rank", "D) F-Rank"],
                answer: 'A'
            },
            {
                question: "Qual o nome do sistema que ajuda Sung Jin-Woo a subir de nível?",
                options: ["A) Sistema de Monarcas", "B) Sistema de Caçadores", "C) Sistema Sombrio", "D) Sistema de Jogadores"],
                answer: 'D'
            },
            {
                question: "Quem é a irmã mais nova de Sung Jin-Woo?",
                options: ["A) Jin-Ah", "B) Ji-Hye", "C) Sun-Hee", "D) Min-Ji"],
                answer: 'A'
            },
            {
                question: "Qual era a profissão do pai de Sung Jin-Woo antes de desaparecer?",
                options: ["A) Cientista", "B) Operário", "C) Engenheiro", "D) Policial"],
                answer: 'B'
            },
            {
                question: "Qual é a cor dos portais mais perigosos no mundo de Solo Leveling?",
                options: ["A) Azul", "B) Vermelho", "C) Branco", "D) Preto"],
                answer: 'B'
            },
            {
                question: "Qual foi a primeira guilda que Yoo Jin-Ho tentou se juntar?",
                options: ["A) White Tiger", "B) Hunters", "C) Ahjin", "D) Blue Dragon"],
                answer: 'A'
            },
            {
                question: "O que é uma Dungeon Break?",
                options: ["A) Quando os Hunters desistem de uma Dungeon", "B) Quando os monstros escapam de uma Dungeon", "C) Quando uma Dungeon desaparece", "D) Quando uma Dungeon desaparece permanentemente"],
                answer: 'B'
            },
            {
                question: "Quem é Cha Hae-In?",
                options: ["A) Líder de uma guilda rival", "B) Uma caçadora de Rank S", "C) Uma amiga de infância de Sung Jin-Woo", "D) Uma invocação de sombras"],
                answer: 'B'
            },
            {
                question: "O que Sung Jin-Woo encontra no Templo de Cártia?",
                options: ["A) Uma chave mágica", "B) O Sistema", "C) O Rei das Sombras", "D) Uma Dungeon oculta"],
                answer: 'B'
            },
            {
                question: "Qual é o apelido de Sung Jin-Woo depois que ele se torna poderoso?",
                options: ["A) Caçador Solitário", "B) Monarca da sombras", "C) Assassino de Sombras", "D) O Jogador"],
                answer: 'B'
            },
            {
                question: "Como Sung Jin-Woo ajuda sua mãe?",
                options: ["A) Ele encontra uma cura para sua doença", "B) Ele paga um hospital de luxo", "C) Ele a protege dos monstros", "D) Ele usa seus poderes para regenerá-la"],
                answer: 'A'
            },
            {
                question: "Qual é a arma principal usada por Igris, a sombra leal de Sung Jin-Woo?",
                options: ["A) Espada longa", "B) Machado duplo", "C) Arco mágico", "D) Lança sombria"],
                answer: 'A'
            },
            {
                question: "Qual palavra é usada por Sung Jin-Woo para extrair as sombras dos monstros?",
                options: ["A) Levante-se", "B) Erga-se", "C) Venha", "D) Sombra"],
                answer: 'B'
            },
            {
                question: "Por que Sung Jin-Woo decide criar sua própria guilda?",
                options: ["A) Para proteger sua família", "B) Para se tornar rico", "C) Para evitar trabalhar com guildas corruptas", "D) Para explorar Dungeons sozinho"],
                answer: 'C'
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









