-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2023 às 03:20
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tca2023`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL COMMENT 'Nome do administrador',
  `email` varchar(300) NOT NULL COMMENT 'Email do administrador',
  `senha` varchar(64) NOT NULL COMMENT 'Senha do administrador (em sha256)',
  `datahora` datetime NOT NULL COMMENT 'Registro: YYY-MM-DD HH:MM:SS',
  `poder` int(1) NOT NULL COMMENT 'Nivel do administrador (9 = maximo)',
  `status` int(1) NOT NULL COMMENT '1 = ativo ; 0 = inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `email`, `senha`, `datahora`, `poder`, `status`) VALUES
(1, 'Adm', 'adm123@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2023-08-03 19:41:14', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinhos`
--

CREATE TABLE `carrinhos` (
  `id_carrinho` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `id_endereco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrinhos`
--

INSERT INTO `carrinhos` (`id_carrinho`, `id_cliente`, `id_produto`, `nome`, `preco`, `quantidade`, `total`, `datahora`, `status`, `id_endereco`) VALUES
(23, 7, 43, 'Fire Emblem', 100.00, 4, 100.00, '2023-12-01 00:03:55', 'No carrinho', NULL),
(31, 2, 44, 'Red Dead Redemption II', 149.00, 1, 149.00, '2023-12-03 21:52:10', 'Concluido', NULL),
(32, 2, 44, 'Red Dead Redemption II', 149.00, 1, 149.00, '2023-12-04 00:40:16', 'Concluido', NULL),
(33, 8, 45, 'Animal Crossing: New Horizons Nintendo Switch', 332.00, 1, 332.00, '2023-12-05 01:34:38', 'Concluido', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL COMMENT 'Nome do cliente',
  `email` varchar(300) NOT NULL COMMENT 'Email do cliente',
  `telefone` int(50) NOT NULL COMMENT 'Telefone do cliente',
  `senha` varchar(64) NOT NULL COMMENT 'Senha do cliente (em sha256)',
  `cpf` int(11) NOT NULL COMMENT 'CPF do cliente',
  `datahora` datetime NOT NULL COMMENT 'Registro: YYY-MM-DD HH:MM:SS',
  `status` int(1) NOT NULL COMMENT '1 = ativo ; 0 = inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `telefone`, `senha`, `cpf`, `datahora`, `status`) VALUES
(10, 'Celso Massoti', 'celso@gmail.com', 2147483647, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2147483647, '2023-12-04 22:24:06', 1),
(11, 'Luana', 'luana@gmail.com', 2147483647, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 123456789, '2023-12-04 22:24:44', 1),
(12, 'Xavier', 'xavier@gmail.com', 56001400, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2147483647, '2023-12-04 22:25:30', 1),
(13, 'Gugu Corral', 'gugu@gmail.com', 56001400, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 148632000, '2023-12-04 22:25:30', 1),
(14, 'Daniel Caldas', 'caldas@gmail.com', 56001400, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 506014000, '2023-12-04 22:25:30', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `cep` int(8) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `datahora` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id`, `id_cliente`, `pais`, `cep`, `endereco`, `numero`, `datahora`, `status`) VALUES
(1, 2, 'PR', 202, 'w', '43', '2023-12-04 17:43:10', ''),
(2, 7, 'PB', 2296478, 'ali', '43', '2023-11-30 21:04:28', 'Ativo'),
(3, 8, 'SP', 4470, 'Travessa Rosa-do-Natal', '30', '2023-12-04 22:38:56', 'Ativo'),
(4, 11, 'PA', 49730, 'Vila Olímpia', '32', '2023-12-04 22:40:39', 'Ativo'),
(5, 12, 'RJ', 5462, 'São Caetano', '20', '2023-12-04 22:41:21', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `id_estoque` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `status` int(10) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`id_estoque`, `nome`, `quantidade`, `status`, `datahora`) VALUES
(1, 'TESTE', 100, 1, '2023-11-29 22:33:54'),
(2, 'TESTE', 100, 1, '2023-12-04 21:10:53');

-- --------------------------------------------------------

--
-- Estrutura para tabela `logotipo`
--

CREATE TABLE `logotipo` (
  `id` int(11) NOT NULL,
  `imgpq` varchar(500) NOT NULL COMMENT 'Imagem pequena',
  `imggd` varchar(500) NOT NULL COMMENT 'Imagem grande',
  `menu_logo` varchar(500) NOT NULL,
  `datahora` datetime NOT NULL COMMENT 'Registro: YYY-MM-DD HH:MM:SS',
  `status` int(1) NOT NULL COMMENT '1 = ativo ; 0 = inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `pagamento` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `id_endereco`, `valor`, `pagamento`, `status`, `datahora`) VALUES
(53, 2, 1, 149.00, 'Pagamento Concluido', 'Item comprado', '2023-12-04 00:42:34'),
(55, 8, 3, 332.00, 'Pagamento Concluido', 'Item comprado', '2023-12-05 01:34:44'),
(56, 8, 3, 332.00, 'Pagamento Concluido', 'Item comprado', '2023-12-05 01:39:02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produtos` int(11) NOT NULL,
  `imgpq` varchar(500) NOT NULL COMMENT 'Imagem grande',
  `imggd` varchar(500) NOT NULL COMMENT 'Imagem media',
  `nome` varchar(500) NOT NULL COMMENT 'Imagem pequena',
  `preco` varchar(500) NOT NULL COMMENT 'Nome do produto',
  `titulo_desc` varchar(500) NOT NULL COMMENT 'Vai ver se é um console, jogo ou apetrecho gaymer',
  `descri` varchar(10000) NOT NULL COMMENT 'Ve de que marca ele pertence',
  `tipo_produto_macro` varchar(500) NOT NULL COMMENT 'Ve de que marca ele pertence',
  `datahora` datetime NOT NULL COMMENT 'Registro: YYY-MM-DD HH:MM:SS',
  `status` int(1) NOT NULL COMMENT '1 = ativo ; 0 = inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produtos`, `imgpq`, `imggd`, `nome`, `preco`, `titulo_desc`, `descri`, `tipo_produto_macro`, `datahora`, `status`) VALUES
(43, 'pq_1701094342.jpg', 'gd_1701094342.jpg', 'Fire Emblem', '100', 'O jogo', 'Assuma o papel de Shez, enquanto conhece Edelgard, Dimitri, Claude e outros personagens de Fire Emblem: Three Houses e luta pelo futuro de Fóblan. Tenha um líder como aliado para construir e comandar um exército em batalhas estratégicas de 1 contra 1.000. A casa que escolher levará você a uma das três histórias emocionantes, cada uma com um final diferente. Cada personagem de Fire Emblem: Three Houses que você recrutar nessas jornadas tem um conjunto distinto de combos impressionantes e poderosos capazes de atravessar hordas de inimigos.  Use a estratégia de Fire Emblem para obter a vantagem tática no estilo de jogo Warriors  Mergulhe em batalhas em tempo real enquanto você e seu exército de personagens de Fire Emblem: Three Houses enfrentam centenas de oponentes e usam elementos de Fire Emblem para maximizar sua estratégia. Dê comandos ao seu exército nas batalhas caóticas para completar missões e alcançar objetivos. Organize-se com antecedência e prepare-se para a batalha equipando armas, habilidades e classes para explorar as fraquezas dos inimigos. Atribua elementos de Fire Emblem: Three Houses, como brasões ou batalhões, a personagens para aprimorar ainda mais como você planeja a sua abordagem.  Fortaleça seus laços dentro e fora da batalha  Construa e desenvolva relacionamentos em batalha com outros personagens de Fire Emblem: Three Houses enquanto luta pelo futuro de Fóblan. Fortaleça os relacionamentos entre os personagens para obter uma vantagem tática no campo de batalha e ouvir os seus diálogos de apoio. Aproxime os personagens juntando-os na batalha ou passando tempo juntos no acampamento base. Desenvolva seu acampamento base e treine, equipe e prepare cada um dos membros de sua equipe antes de se jogar na batalha.', 'Nintendo', '2023-11-27 11:12:22', 1),
(44, 'pq_1701094540.jpg', 'gd_1701094540.jpg', 'Red Dead Redemption II', '149,00', 'Red Dead Redemption II', 'O jogo Red Dead Redemption II desenvolvido pela Rockstar Games para PS4 acontece nos Estados Unidos, em 1899.O fim da era do velho oeste começou, e as autoridades estão caçando as últimas gangues de fora da lei que restam. Os que não se rendem, nem sucumbem, são mortos.Depois de tudo dar errado durante um roubo em uma cidade do oeste chamada Blackwater, Arthur Morgan e a gangue Van der Linde são forçados a fugir.Com agentes federais e os melhores caçadores de recompensas no seu encalço, a gangue precisa roubar, assaltar e lutar para sobreviver no impiedoso coração dos Estados Unidos.Conforme divisões internas profundas ameaçam despedaçar a gangue, Arthur deve fazer uma escolha entre os seus próprios ideais e a lealdade à gangue que o criou.', 'Playstation', '2023-11-27 11:15:40', 1),
(45, 'pq_1701096713.jpg', 'gd_1701096713.jpg', 'Animal Crossing: New Horizons Nintendo Switch', '332,40', 'Animal Crossing', 'Esse é o Animal Crossing: New Horizons, um jogo de Simulação, agora para Nintendo Switch. Escape para uma ilha deserta e crie o seu próprio paraíso enquanto explora, cria e customiza em nesse game Animal Crossing: New Horizons. A sua ilha traz uma variedade incrível de recursos naturais que podem ser usados para criar de tudo, desde objetos para o seu conforto a ferramentas. Você pode caçar insetos ao amanhecer, decorar o seu paraíso durante o dia ou desfrutar do pôr do sol na praia enquanto pesca no oceano. A hora do dia e as estações do ano correspondem à realidade, então aproveite a oportunidade de conferir a sua ilha a cada dia para encontrar novas surpresas durante o ano todo.', 'Nintendo', '2023-11-27 11:51:53', 1),
(53, 'pq_1701739862.jpg', 'gd_1701739862.jpg', 'Animal Crossing New Horizons - Switch', '299,71', 'Animal Crossing', 'JOGO MÍDIA FÍSICA, NOVO E LACRADO, ORIGINAL - A amada franquia Animal Crossing se prepara para sua estréia no Nintendo Switch!Se a agitação da vida moderna o derrubou, Tom Nook tem um novo empreendimento na manga que ele sabe que você vai adorar: o Pacote de Refúgio da Ilha Deserta da Nook Inc.! Claro, você cruzou caminhos com personagens coloridos próximos e distantes. Tivemos um grande momento como uma das pessoas da cidade. Pode até ter virado uma nova folha e se dedicado ao serviço público! Mas no fundo, não há uma parte sua que anseia por liberdade? Então talvez uma longa caminhada na praia de uma ilha deserta, onde uma rica riqueza de natureza intocada o aguarde, seja exatamente o que o médico ordenou! Criatividade e charme pacíficos aguardam você arregaçar as mangas e tornar a sua nova vida o que você quiser. Colete recursos e crie tudo, desde confortos de criaturas a ferramentas úteis. Abrace seu polegar verde ao interagir com flores e árvores de novas maneiras. Configure uma propriedade onde as regras do que entra e sai de casa não sejam mais aplicáveis. Faça amizade com os recém-chegados, aproveite as estações do ano, salte com vara através dos rios enquanto explora e muito mais! Esta nova adição à série Animal Crossing será lançada em 20 de março de 2020, exclusivamente para o sistema Nintendo Switch.JOGO IMPORTADO, IDIOMA EM INGLÊS', 'Nintendo', '2023-12-04 22:31:02', 1),
(54, 'pq_1701739998.jpg', 'gd_1701739998.jpg', 'Mario Kart 8 Deluxe, Nintendo Switch', '293,00', 'Mario Kart 8', 'Mario kart 8 deluxe reúne novamente os personagens mais icônicos da nintendo, como mario, luigi, peach, bowser, link e muitos outros, para disputarem quem é o melhor piloto de todos. Depois de selecionar seu personagem, escolha também seu veículo, que pode ser personalizado com diferentes pneus, chassis e planadores.  Agora é possível transportar até dois itens de cada, permitindo recorrer a novas estratégias tanto nas corridas como nas batalhas. Acelere em terra, debaixo da água, pelos céus e até ao longo de paredes e tetos em mais de 45 pistas, algumas inspiradas em the legend of zelda, animal crossing e excitebike. Para os principiantes, uma nova funcionalidade auxilia sua condução, para que sempre permaneça dentro da pista.', 'Nintendo', '2023-12-04 22:33:18', 1),
(55, 'pq_1701740050.jpg', 'gd_1701740050.jpg', 'Mario + Rabbids Sparks Of Hope - Nintendo Switch', '292,15', 'Mario + Rabbids Sparks Of Hope ', 'Chegou a hora de embarcar em um nova aventura de Mario + Rabbids Sparks of Hope. Junte-se a Mario, Luigi, Princess Peach, Rabbid Peach, Rabbid Luigi e amigos numa aventura galáctica para derrotar uma entidade malvada e salvar seus companheiros Spark. Explore os planetas da galáxia enquanto descobre segredos misteriosos e missões imperdíveis.  Lidere uma equipe com seus personagens favoritos de Mario e Rabbids para restaurar ordem ao universo e salvar os Sparks por planetas misteriosos, estranhos e surpreendentes, repletos de habitantes fascinantes. Libere as habilidades de seus heróis, mas planeje bem para saber como derrotar inimigos, formar alianças e aproveitar as coberturas.  EMBARQUE EM UMA VIAGEM ÉPICA Monte a equipe dos seus sonhos com três heróis únicos. Derrote os novos chefes, junto com alguns dos vilões mais conhecidos de toda a galáxia. Resgate pela galáxia os preciosos Sparks. Libere as habilidades de seus heróis e seja imbatível.', 'Nintendo', '2023-12-04 22:34:10', 1),
(56, 'pq_1701740117.jpg', 'gd_1701740117.jpg', 'Mega Man Battle Network Legacy Collection', '259,00', 'Mega Man Battle Network Legacy Collection', 'A renomada série Mega Man Battle Network, que se expandiu para anime e quadrinhos, está de volta em Mega Man Battle Network Legacy Collection. Este pacote inclui dez jogos cheios de ação, além de novidades adicionais como uma galeria de ilustrações e música! Além disso, tem suporte a jogo online!', 'Nintendo', '2023-12-04 22:35:17', 1),
(57, 'pq_1701740169.jpg', 'gd_1701740169.jpg', 'Metroid, Samus Returns - 3DS', '277,90', 'Metroid', 'Perca-se em um clássico com metroid: samus returns. Esta aventura envolvente reinventa o mundo virtual visto no metroid de 1991 da nintendo para game boy e segue as aventuras do caçador de recompensas samus aran. Derrote uma ameaça metroid ameaçadora e acesse uma variedade de novos conteúdos ao jogar metroid: samus returns no seu nintendo 3ds.', 'Nintendo', '2023-12-04 22:36:09', 1),
(58, 'pq_1701740224.jpg', 'gd_1701740224.jpg', 'Minecraft - Switch', '195,55', 'Minecraft', 'Minecraft é um jogo que consiste em colocar blocos e embarcar em aventuras. Explore mundos gerados aleatoriamente e construa coisas espantosas, da casa mais modesta ao mais grandioso castelo. Jogue no modo criativo com recursos ilimitados ou escave até às profundezas do mundo no modo de sobrevivência, fabricando armas e armaduras para se defender de criaturas perigosas.', 'Nintendo', '2023-12-04 22:37:04', 1),
(59, 'pq_1701740307.jpg', 'gd_1701740307.jpg', 'Marvels Spider-man: Miles Morales (edição Ultimate) Para Ps5', '237,41', 'Marvels Spider-Man', 'Franquia: Spiderman Saga: Marvel Título: Miles Morales Edição: Ultimate Plataforma: PS5 Desenvolvedores: Indomniac Ano de lançamento: 2020 Gêneros: Ação Classificação de jogo: E12+ ESPECIFICAÇÕES Formato: Físico É multijogador: Sim É Online: Sim Idiomas de áudio: Português BR Idiomas de Legendas: Português BR ARQUIVO Tamanho do arquivo: 10 GB OBSERVAÇÔES · Se você curte o Spider-Man e os games da Marvel, precisa conhecer esse lançamento. Que tal explorar e viver essa aventura na pele do Homem Aranha, o adolescente Miles Morales? Pra isso você precisa dominar os poderes para se tornar o novo Spider-Man. · Na Nova York da Marvel uma guerra entre dois lados começa a estourar e ameaça a vizinhança do adolescente Miles Morales. Ele descobre que tem poderes que o …', 'Playstation', '2023-12-04 22:38:27', 1),
(60, 'pq_1701740384.jpg', 'gd_1701740384.jpg', 'Armored Core VI: Fires of Rubicon, PS4', '246,31', 'Armored Core VI', 'Uma nova substância misteriosa foi descoberta no planeta remoto, Rubicon 3. Como fonte de energia, esperava-se que essa substância aumentasse dramaticamente as capacidades tecnológicas e de comunicação da humanidade. Em vez disso, causou uma catástrofe que submergiu o planeta e as estrelas circundantes em chamas e tempestades, formando um Sistema Estelar Ardente.  Quase meio século depois, a mesma substância ressurgiu em Rubicon 3, um planeta agora contaminado e isolado como resultado da catástrofe. Corporações extraterrestres e grupos de resistência lutam pelo controle da substância.  O jogador se infiltra no Rubicon como um mercenário independente e se encontra em uma luta pela substância com as corporações e outras facções.', 'Playstation', '2023-12-04 22:39:44', 1),
(61, 'pq_1701740421.jpg', 'gd_1701740421.jpg', 'Cyberpunk 2077, PS4', '120,95', 'Cyberpunk 2077', 'Cyberpunk 2077 transfere o jogador para um mundo futurístico obcecado por poder, glamour e biomodificações. Controle V, um ambicioso mercenário equipado com melhorias cibernéticas, na busca de um implante que carrega a chave da imortalidade. O jogo define um novo patamar no gênero de mundo aberto, com infinitas opções de jogabilidade, missões e customizações. O jogo se passa em Night City, uma cidade viva com distritos únicos e cheios de personalidade. O estilo de jogabilidade está, totalmente nas mãos do jogador, que pode hackear diversos elementos do cenário para uma abordagem furtiva, ou optar por armas pesadas e partir para agressividade contra seus inimigos. Cyberpunk 2077 é, um jogo extraordinário, com uma vasta gama de elementos de jogabilidade e personalizações, que agradam a todos os tipos de jogadores.', 'Playstation', '2023-12-04 22:40:21', 1),
(62, 'pq_1701740545.jpg', 'gd_1701740545.jpg', 'Death Stranding Director S Cut Ps5', '199,00', 'Death Strading', 'Conecte uma sociedade fragmentada na experiência definitiva de Death Stranding para PlayStation®5 Da mente do desenvolvedor de jogos lendário Hideo Kojima, nasce uma experiência que redefine um gênero, agora expandida e remasterizada para o PS5 neste DIRECTORS CUT definitivo. No futuro, um evento misterioso conhecido como Death Stranding abriu uma passagem entre o mundo dos vivos e o dos mortos, fazendo criaturas grotescas do pós-vida invadirem um mundo arruinado por uma sociedade desolada. No papel de Sam Bridges, sua missão é dar esperança à humanidade ao conectar os últimos sobreviventes de uma América dizimada. Conseguirá você reunir aos poucos um mundo despedaçado? Remasterizado para o console PS5 Encare as provações de Sam Bridges com combate avançado, mais ações de personagem e um sistema de classificação competitivo para desafios* especiais nesta experiência definitiva de DEATH STRANDING. Conteúdo expandido Viva uma história estendida por meio de novas missões em uma área expandida. Use mais armas e veículos, enfrente novos tipos de inimigos e explore locais inéditos, como o campo de tiro e a pista de corrida, que contêm missões e minijogos extras. Sistema de Cordão Social inovador Mantenha-se conectado com jogadores do mundo todo*. Doe recursos valiosos para reconstruir estruturas no seu mundo e no de outros jogadores e dê curtidas nas estruturas de outros jogadores que aparecerem no seu mundo para recompensar o jogador pela contribuição dele. *Requer conexão com a internet e uma conta na PlayStation™Network.', 'Playstation', '2023-12-04 22:42:25', 1),
(63, 'pq_1701740665.jpg', 'gd_1701740665.jpg', 'Final Fantasy XVI, PS5', '307,91', 'Final Fantasy XVI', 'Conheça Valisthea, um mundo sombrio de fantasia, neste tão aguardado RPG de ação para um jogador. O 16o jogo independente da lendária série Final Fantasy representa uma guinada mais sombria para a franquia de RPG, com uma trama complexa de vingança, disputas pelo poder e tragédia inevitável.  Final Fantasy XVI reinterpreta as icônicas invocações da série, agora chamadas de Eikons. Essas criaturas letais são hospedadas dentro dos Domin', 'Playstation', '2023-12-04 22:44:25', 1),
(64, 'pq_1701740702.jpg', 'gd_1701740702.jpg', 'Ghost Of Tsushima Versão Do Diretor - PS4', '263,91', 'Ghost Of Tsushima', 'host of Tsushima é um jogo eletrônico de ação-aventura desenvolvido pela Sucker Punch Productions e publicado pela Sony Interactive Entertainment. A história acompanha Jin Sakai, um samurai que precisa proteger a Ilha de Tsushima durante a primeira invasão mongol do Japão. Ele se vê dividido entre escolher seguir o código do guerreiro para lutar honradamente ou usar métodos práticos e desonrosos para subjugar os mongóis', 'Playstation', '2023-12-04 22:45:02', 1),
(65, 'pq_1701740807.jpg', 'gd_1701740807.jpg', 'God of War Ragnarök para PS5', '191,90', 'God of War Ragnarök ', 'O jogo God of War Ragnarök da Santa Mônica Studio está em pré-venda para PS4, embarque em uma jornada épica e comovente onde Kratos e Atreus lutam entre o desejo de manterem-se unidos ou separar-se. Aqueles que desafiam o destino: Atreus anseia por conhecimento para ajudá-lo a entender a profecia de “Loki” e o papel que ele desempenhará no Ragnarök. Kratos deve decidir se será acorrentado pelo medo de repetir seus erros ou se libertar de seu passado para ser o pai que Atreus precisa. Armas de Guerra: O Machado Leviatã, Lâminas do Caos e Escudo Guardião retornam juntamente com uma série de novas habilidades para Kratos e Atreus. Enquanto eles enfrentam inimigos nos Nove Reinos, as habilidades mortais de Kratos serão testadas como nunca antes enquanto ele luta para proteger sua família. Explore os Reinos: Viaje para paisagens perigosas e deslumbrantes enquanto enfrenta uma grande variedade de criaturas inimigas, monstros e deuses nórdicos enquanto Kratos e Atreus procuram respostas e aliados. Aventure-se por todos os Nove Reinos em direção à batalha profetizada que acabará com o mundo. Derrote deuses e monstros nórdicos em combates fluidos e expressivos.', 'Playstation', '2023-12-04 22:46:47', 1),
(66, 'pq_1701740857.jpg', 'gd_1701740857.jpg', 'Assassins Creed Valhalla para Xbox One Ubisoft', '136,31', 'Assassins Creed Valhalla', 'Século IX d.C. Forçado a sair da Noruega por guerras sem fim e escassez de recursos, Eivor, um invasor viking, lidera um clã de nórdicos para atravessar o gélido Mar do Norte até as terras ricas dos reinos despedaçados da Inglaterra. A missão deles: estabelecer um novo lar permanente, custe o que custar.No Assassin’s Creed Valhalla para Xbox One e Xbox Series X, você é Eivor, um guerreiro viking temível que cresceu em meio a histórias de batalhas e glória. Explore um mundo aberto misterioso e belo, que tem como cenário a Idade das Trevas da Inglaterra. Faça invasões contra seus inimigos, desenvolva o seu assentamento e aumente o seu poder político na busca para ganhar um lugar entre os deuses no Valhalla.Guerras serão travadas. Reinos cairão. Esta é a era dos vikings.Assassins Creed mais uma vez é trazido pela Ubisoft.Inicie ataques em larga escala contra fortalezas e tropas saxônicas por toda a Inglaterra. Lidere o seu clã em ataques surpresa a partir do seu dracar, e saqueie territórios inimigos para trazer riquezas e recursos para o seu povo.Mecânicas avançadas de RPG possibilitam a você desenvolver seu personagem e influenciar o mundo à sua volta. A cada decisão, desde alianças políticas e estratégia de combate até a escolha de diálogos e progressão de equipamentos, você vai trilhar o seu próprio caminho para a glória.Mecânicas avançadas de RPG possibilitam a você desenvolver seu personagem e influenciar o mundo à sua volta. A cada decisão, desde alianças políticas e estratégia de combate até a escolha de diálogos e progressão de equipamentos, você vai trilhar o seu próprio caminho para a glória.Use nas duas mãos armas poderosas como machados, espadas e até escudos para reviver o estilo de luta impiedoso dos guerreiros vikings. Decapite seus inimigos com brutalidade, derrote-os de longe ou assassine alvos furtivamente com sua lâmina oculta. Desafie suas habilidades com a mais variada coleção de inimigos letais já vista em Assassin’s Creed.Veleje pelos mares misteriosos e brutais da Noruega até os reinos belos e hostis da Inglaterra e além. Envolva-se no modo de vida viking com pesca, caça, jogos de bebida e mais.A edição limitada de Assassin\s Creed Valhalla vem com a missão \"A Trajetória do Bárbaro\".', 'Xbox', '2023-12-04 22:47:37', 1),
(67, 'pq_1701740993.jpg', 'gd_1701740993.jpg', 'Forza Horizon 5 para Xbox One e Xbox Series X', '223,09', 'Forza Horizon 5 ', 'Sua Aventura Definitiva de Horizon o aguarda! Com o jogo Forza Horizon 5 da Microsoft você vai explorar as paisagens do mundo aberto vibrante e em constante evolução do México, com uma ação de direção divertida e ilimitada em centenas dos melhores carros do mundo. Indicado para as plataformas Xbox Series X e Xbox One esse incrível game de corrida conquista pela sua jogabilidade singular e também pela qualidade da ambientação de seus cenários. Esteja preparo para adentrar nesse jogo que mescla sons da natureza com o rugido dos motores de alta performance enquanto você estiver apostando suas corridas pelo cenário. A pré-venda do game Forza Horizon 5 promete localizações variadas que evolui conforme você joga e ainda acompanha um Boné Exclusivo Forza Horizon 5!', 'Xbox', '2023-12-04 22:49:53', 1),
(68, 'pq_1701741030.jpg', 'gd_1701741030.jpg', 'UFC 3 para Xbox One', '91,19', 'UFC 3', 'EA SPORTSTM UFC® 3 revoluciona o movimento de luta com Real Player Motion Tech, entregando o movimento de lutador mais fluido e responsivo de todos. No novo G.O.A.T. Modo de carreira, suas escolhas fora do Octagon agora importam tanto quanto sua performance dentro do Octagon como você promove as lutas, cria fortes rivalidades e ainda mais na estrada para se tornar o maior de todos os tempos.UMA REVOLUÇÃO NA TECNOLOGIA DE JOGO• Real Player Motion (RPM) Tech é uma revolucionária nova tecnologia de animação EA SPORTS que define um novo patamar para o movimento e a capacidade de resposta no melhor aspecto e agora, o melhor sentimento – EA SPORTS UFC game ever. Com mais de 5.000 novas animações capturadas e reconstruídas desde o início, agora você pode mover, atacar eCriar combinações perfeitas com a fluidez e a liberdade dos melhores atletas UFC.do mundo. Os jogadores agora podem escorregar e atacar enquanto estão em pleno movimento para executar contra-ataques perigosos, adicionando novos níveis de estratégia e competição para cada luta. RPM Tech também recria os estilos de lutadores de UFC de classe mundial, refletindo a aparência e a sensação precisa de seus atletas favoritos como Conor McGregor, Georges St-Pierre e Joanna Jedrzejcyzk.SEJA O G.O.A.T.• ApresentandoG.O.A.T. Career Mode no EA SPORTS UFC 3 onde - pela primeira vez - as escolhas que você faz fora do Octagon impactam seu caminho para a grandeza dentro do Octagon. Fora de suas lutas, faça escolhas promocionais para construir sua campanha de luta, ganhe fãs, ganhe mais dinheiro através de grandes contratos e capture a atenção do mundo. Crie fortes rivalidades com outros lutadores do UFC através do novo sistema de mídia social no jogo, dando-lhe a liberdade de assumir a personalidade que você quer entre o candidato legal ou o infame. Aqueça a campanha por trás de suas maiores lutas equilibrando seu tempo na academia com aparências promocionais que espalham o boca a boca e aumentam sua base de fãs. Ao treinar, decida qual ginásio se juntar, cada um com seus próprios parceiros de treinamento do UFC e movimentos únicos para aprender. E, finalmente, observe tudo acontecer diante de seus olhos em todos os novos Career Milestones apresentados ao longo de sua carreira, incluindo conferências de imprensa, pesagens e autêntica programação UFC como  e UFC Minute hospedado por Megan Olivi.TUDO O QUE É PRECISO É UM GOLPE• Ao contrário de qualquer outro esporte, na vitória do Octagon pode acontecer em um piscar de olhos. No EA SPORTS UFC 3 você decide como lutar e como ganhar com um novo conjunto de modos de jogo projetado para lutas rápidas e divertidas que são perfeitas para permitir que os punhos voem contra seus amigos. Jogue no Modo Nocaute, Submissão, Luta em Pé & Bang, ou dê ao seu lutador resistência ilimitada em Fight Now Custom. No EA SPORTS UFC 3, você tem a liberdade de criar e personalizar as regras de sua partida antes de assumir seus amigos. O modo de Torneio totalmente novo permite que você persiga os melhores direitos de se vangloriar entre seus amigos, pois você tenta assumir tantos oponentes que você pode terminar em rodadas de eliminação com danos contínuos e fadiga.CRIE SUA EQUIPE DOS SONHOS• Ultimate TeamTM no EA SPORTS UFC 3 introduz mais personalização, estratégia e colecionáveis. Pela primeira vez, combine seu crie-um-lutador personalizado com lutadores do UFC da vida real como Conor McGregor, Anderson Silva e Demetrious Johnson para construir a melhor lista de luta. All-new Fighter Chemistry permite-lhe perseguir e emparelhar movimentos específicos que concedem impulsos a seu lutador por uma vantagem estratégica. Os Novos Desafios Únicos Team Solo desafiam dinamicamente os desafios de jogabilidade de jogador único que desbloqueiam recompensas no jogo, enquanto os novos Ultimate Team Sets permitem coletar itens temáticos e comercializá-los para itens de maior valor. Tudo em um pacote com uma experiência de streamline mais forte, com aberturas de pacotes redesenhadas e visuais que tornam mais fácil do que nunca construir sua própria equipe máxima.', 'Xbox', '2023-12-04 22:50:30', 1),
(69, 'pq_1701741080.jpg', 'gd_1701741080.jpg', 'Screamride Para Xbox One', '149,99', 'Screamride', 'Já pensou em criar um brinquedo para um parque de diversões capaz de arrancar os gritos mais escandalosos daqueles que estão curtindo a atração? Então ScreamRide é um game que você certamente vai curtir. O game pertence a Frontier Developments, que trabalhou anteriormente nos games da saga Roller Coaster Tycoon, que é do mesmo gênero.  A proposta, que envolve “ação em montanha-russa”, foi confundido com um Roller Coaster por um momento, mas não, a ideia aqui de acordo com a equipe, é “criar, destruir, acelerar e gritar”. Ao lado de Major Nelson, figurinha carimbada da comunidade Xbox, o produtor executivo Jorg Neumann explica um pouco melhor em vídeos no youtube como o game funciona.', 'Xbox', '2023-12-04 22:51:20', 1),
(70, 'pq_1701741121.jpg', 'gd_1701741121.jpg', 'The Elder Scrolls V: Skyrim - Xbox-360', '132,43', 'The Elder Scrolls V', 'JOGO MÍDIA FÍSICA, NOVO E LACRADO, ORIGINAL - The Elder Scrolls V: Skyrim é um RPG eletrônico desenvolvido pela Bethesda Game Studios e publicado pela Bethesda Softworks. É o quinto jogo da série The Elder Scrolls, seguindo The Elder Scrolls IV: Oblivion. É o primeiro jogo ocidental da história a receber 40/40 (nota máxima) na conceituada revista japonesa Famitsu. O Jogo conseguiu três prêmios no VGA 2011, incluindo melhor jogo do ano.Contem algumas características novas em relação a edição anterior de The Elder Scrolls, como aproximando-se mais da realidade, seis classes de magia, não será preciso dormir para progredir de nível, e se em Oblivion um homem trabalhou na criação das dungeons, em Skyrim houve um grupo de 14 designers, entre muitos outros.Imagens meramente ilustrativasTodas informações são de responsabilidade do fabricante/fornecedorJOGO IMPORTADO, IDIOMA EM INGLÊSCaso o jogo possua DLC´s ou códigos com conteúdo extra, para utilizar será necessário criar uma conta do país do jogo', 'Xbox', '2023-12-04 22:52:01', 1),
(71, 'pq_1701741182.jpg', 'gd_1701741182.jpg', 'Shadow Of The Tomb Raider - Croft Edition - Xbox-one', '129,19', 'Shadow Of The Tomb Raider ', 'JOGO MÍDIA FÍSICA, NOVO E LACRADO, ORIGINAL - Viva o momento decisivo de Lara Croft quando ela se torna a Tomb Raider. Em Shadow of the Tomb Raider, Lara deve dominar uma selva mortal, superar tumbas aterrorizantes e perseverar em seus momentos mais sombrios. Enquanto ela corre para salvar o mundo de um apocalipse maia, Lara será forjada no Tomb Raider que ela está destinada a ser.A Croft Edition inclui:- Jogo Shadow of the Tomb Raider.- Passe de temporada.- 3 armas e roupas adicionais.- Digital OST.Se o jogo tiver DLC´s ou códigos de conteúdo extra, é necessário criar uma conta do país do jogo para poder utilizar este conteúdo.JOGO IMPORTADO, IDIOMA EM INGLÊS', 'Xbox', '2023-12-04 22:53:02', 1),
(72, 'pq_1701741273.jpg', 'gd_1701741273.jpg', 'Nba 2k21 - Xbox One', '263,03', 'Nba 2k21 ', 'NBA 2K21 traz aos fãs a melhor e maior experiência em simulação de basquete de todos os tempos, com um modo de jogo imersivo e realista. NBA 2K21 traz diversas melhorias gráficas e de jogabilidade, funcionalidades online competitivas, modos de jogos variados e aprofundados que trarão ao jogador uma imersão profunda no maior campeonato de basquete do mundo. Com seu motor gráfico atualizado, NBA 2K21 é o maior e mais completo simulador de basquete dos últimos anos. O controle das jogadas está muito mais fluidos, com movimentos autênticos dos jogadores em quadra proporcionam uma experiência de jogo definitiva. A nova jogabilidade oferece estratégias e táticas inéditas durante suas jogadas de ataque e defesa.', 'Xbox', '2023-12-04 22:54:33', 1),
(73, 'pq_1701741354.jpg', 'gd_1701741354.jpg', 'Jogo Sonic Generations, Xbox 360, Xbox One', '119,11', 'Sonic Generations', 'JOGO MÍDIA FÍSICA, NOVO E LACRADO, ORIGINAL - POSSUI RETROCOMPATIBILIDADE, FUNCIONA NO XBOX-360 E NO XBOX-ONEA Celebração De 20 Anos Do Sonic! O Universo Do Sonic Vira O Caos Quando Um Novo Poder Misterioso Ganha Força, Criando Buracos Do Tempo Que Levam Sonic E Seus Amigos De Volta Ao Passado. Como Resultado, Sonic Se Encontra Com Personagens Bastante Familiares Incluindo A Versão Clássica Dele Mesmo! Agora O Sonic Moderno E O Clássico Precisam Derrotar Os Inimigos, Salvar Seus Amigos E Descobrir Quem Está Por Trás Dessa Obra Diabólica!Marca: Mundo GamesTodas as informações divulgadas são de responsabilidade do fabricante/fornecedor.Imagens Meramente Ilustrativas.Verifique com os fabricantes do produto e de seus componentes eventuais limitações à utilização de todos os recursos e funcionalidades.JOGO IMPORTADO, IDIOMA EM INGLÊSCaso o jogo possua DLC´s ou códigos com conteúdo extra, para utilizar será necessário criar uma conta do país do jogo', 'Xbox', '2023-12-04 22:55:54', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `carrinhos`
--
ALTER TABLE `carrinhos`
  ADD PRIMARY KEY (`id_carrinho`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id_estoque`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produtos`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `carrinhos`
--
ALTER TABLE `carrinhos`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
