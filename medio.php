<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Quiz rank E</title>
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
            <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="ranking.php">Visualizar ranking</a></li>
                <li><a href="index.html">Voltar ao início</a></li>
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
                question: "Qual foi o papel de Ashborn antes de se tornar o Monarca das Sombras?",
                options: ["A) Monarca da Destruição", "B) Um Soberano", "C) Um Humano Normal", "D) O Primeiro Monarca "],
                answer: 'B'
            },
            {
                question: "O que Sung Jin-Woo faz após alcançar um nível de poder extraordinário?",
                options: ["A) Ele se torna um líder de guilda ", "B) Ele decide explorar novas Dungeons ", "C) Ele busca entender mais sobre os Soberanos ", "D) Ele se retira da vida de caçador."],
                answer: 'C'
            },
            {
                question: "Qual é o nome do Monarca que controla os Dragões?",
                options: ["A)  Antares", "B) Ashborn ", "C) Baran", "D) Bellion"],
                answer: 'A'
            },
            {
                question: "O que Sung Jin-Woo descobre sobre o verdadeiro propósito do sistema?",
                options: ["A) É uma armadilha dos Monarcas", "B)  Foi criado para equilibrar os poderes dos mundos", "C) Foi uma criação dos Soberanos para derrotar os Monarcas", "D) É uma ferramenta para dominar as Dungeons"],
                answer: 'C'
            },
            {
                question: "Quem foi o primeiro humano a ser possuído por um Monarca na história?",
                options: ["A) Go Gun-Hee ", "B) Christopher Reed", "C) Hwang Dong-Su", "D) Kamish"],
                answer: 'B'
            },
            {
                question: "Quantos Monarcas existem na história principa?",
                options: ["A) 7", "B) 9", "C) 5", "D) 8"],
                answer: 'B'
            },
            {
                question: "Qual o principal objetivo dos Soberanos em sua guerra contra os Monarcas?",
                options: ["A) Salvar a humanidade", "B)  Recuperar seu poder perdido", "C) Proteger seus mundos originais ", "D) Destruir os portais interdimensionais"],
                answer: 'C'
            },
            {
                question: "Qual é o nome do item que Sung Jin-Woo usa para acessar a Dungeon de Rank S no Japão?",
                options: ["A) Chave do Castelo Sombrio ", "B) Relíquia Perdida dos Soberanos", "C) Chave da Prisão Eterna", "D) Chave para o Paraíso "],
                answer: 'C'
            },
            {
                question: "Qual habilidade específica torna Beru um comandante tão poderoso?",
                options: ["A) Controle mental sobre outros insetos", "B)  Regeneração acelerada", "C) Velocidade acima da média", "D) Grito Paralizante "],
                answer: 'A'
            },
            {
                question: "Quem são os dois Soberanos que se aliaram a Ashborn?",
                options: ["A) Soberano da Luz e Soberano das Tempestades", "B) Soberano da Gelo e Soberano da Chama", "C) Soberano da Transcendência e Soberano da Eternidade", "D) Soberano das Bestas e Soberano do Gelo"],
                answer: 'C'
            },
            {
                question: "Qual é o verdadeiro nome do Rei Formiga derrotado por Sung Jin-Woo?",
                options: ["A) Hekaton ", "B)  Kamish", "C)  Arsha", "D) Baruka "],
                answer: 'D'
            },
            {
                question: "Como Sung Jin-Woo derrota Antares, o Monarca dos Dragões?",
                options: ["A) Usando a força total de suas sombras", "B) Recebendo ajuda direta dos Soberanos ", "C)  Atraindo Antares para uma armadilha ", "D) Usando o poder de Ashborn "],
                answer: 'A'
            },
            {
                question: "Qual o maior exército controlado por Sung Jin-Woo em batalha?",
                options: ["A) 100 mil sombras", "B)  150 mil sombras", "C) 200 mil sombras ", "D)250 mil sombras"],
                answer: 'C'
            },
            {
                question: "Qual é a fraqueza mais significativa do Sistema que Sung Jin-Woo descobre?",
                options: ["A) Ele pode ser hackeado por Monarcas ", "B) Ele depende da força do usuário para funcionar", "C) Ele tem limitações contra monstros de nível de Monarca", "D) Ele é controlado pelos Soberanos"],
                answer: 'C'
            },
            {
                question: "Qual é o nome da habilidade final que Sung Jin-Woo utiliza para selar os Monarcas?",
                options: ["A) Apocalipse das Sombras", "B) Grito do Rei das Sombras ", "C) Governança Absoluta", "D) Mãos Eternas "],
                answer: 'B'
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