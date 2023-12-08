-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2023 às 15:55
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `administrador`
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
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `email`, `senha`, `datahora`, `poder`, `status`) VALUES
(1, 'Adm', 'adm123@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2023-08-03 19:41:14', 1, 1),
(7, 'Assassins Creed', 'a@gmail.com', 'ef2d127de37b942baad06145e54b0c619a1f22327b2ebbcfbec78f5564afe39d', '2023-11-27 01:58:45', 2, 1),
(8, '', 'a@gmail.com', 'ef2d127de37b942baad06145e54b0c619a1f22327b2ebbcfbec78f5564afe39d', '2023-11-27 02:00:06', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinhos`
--

CREATE TABLE `carrinhos` (
  `id_carrinho` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `id_endereco` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_carrinho`)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carrinhos`
--

INSERT INTO `carrinhos` (`id_carrinho`, `id_cliente`, `id_produto`, `nome`, `preco`, `quantidade`, `total`, `datahora`, `status`, `id_endereco`) VALUES
(1, 2, 15, 'god of war', '20.00', 2, '0.00', '0000-00-00 00:00:00', 'No carrinho', NULL),
(2, 0, 0, 'Mudados', '0.00', 1, '0.00', '2023-11-26 06:23:49', 'No carrinho', NULL),
(3, 0, 0, 'Mudados', '0.00', 1, '0.00', '2023-11-26 06:24:15', 'No carrinho', NULL),
(4, 0, 0, 'Assassins Creed', '0.00', 0, '0.00', '2023-11-27 06:31:44', 'No carrinho', NULL),
(5, 0, 0, 'Fire Emblem', '100.00', 0, '0.00', '2023-11-27 14:21:50', 'No carrinho', NULL),
(6, 0, 0, 'Fire Emblem', '100.00', 0, '0.00', '2023-11-27 14:43:25', 'No carrinho', NULL),
(7, 0, 0, 'Fire Emblem', '100.00', 0, '0.00', '2023-11-27 14:44:19', 'No carrinho', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(100) NOT NULL,
  `nome` varchar(300) NOT NULL COMMENT 'Nome do cliente',
  `email` varchar(300) NOT NULL COMMENT 'Email do cliente',
  `telefone` int(50) NOT NULL COMMENT 'Telefone do cliente',
  `senha` varchar(64) NOT NULL COMMENT 'Senha do cliente (em sha256)',
  `cpf` int(11) NOT NULL COMMENT 'CPF do cliente',
  `datahora` datetime NOT NULL COMMENT 'Registro: YYY-MM-DD HH:MM:SS',
  `status` int(1) NOT NULL COMMENT '1 = ativo ; 0 = inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `telefone`, `senha`, `cpf`, `datahora`, `status`) VALUES
(1, 'Nicolás', 'nicolas.corral@gmail.com', 937392730, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2147483647, '2023-08-29 17:31:43', 1),
(2, 'Lucas Lopes Gualberto', 'llg@gmail.com', 973055294, '8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72', 123, '2023-08-29 17:31:43', 0),
(0, 'Amanda', 'a@gmail.com', 0, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 123, '2023-11-26 15:37:48', 0);

-- --------------------------------------------------------


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
-- Estrutura da tabela `logotipo`
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
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `pagamento` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
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
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produtos`, `imgpq`, `imggd`, `nome`, `preco`, `titulo_desc`, `descri`, `tipo_produto_macro`, `datahora`, `status`) VALUES
(40, 'pq_1701066427.jpg', 'gd_1701066427.jpg', 'Assassins Creed', 'R$ 110,00', 'rwah', 'lj', 'Xbox', '2023-11-27 03:27:07', 1),
(41, 'pq_1701067046.jpg', 'gd_1701067046.jpg', 'Animal Crossing', 'R$ 110,00', 'nãosei', 'lorem', 'Xbox', '2023-11-27 03:37:26', 1),
(43, 'pq_1701094342.jpg', 'gd_1701094342.jpg', 'Fire Emblem', '100', 'O jogo', 'Assuma o papel de Shez, enquanto conhece Edelgard, Dimitri, Claude e outros personagens de Fire Emblem: Three Houses e luta pelo futuro de Fóblan. Tenha um líder como aliado para construir e comandar um exército em batalhas estratégicas de 1 contra 1.000. A casa que escolher levará você a uma das três histórias emocionantes, cada uma com um final diferente. Cada personagem de Fire Emblem: Three Houses que você recrutar nessas jornadas tem um conjunto distinto de combos impressionantes e poderosos capazes de atravessar hordas de inimigos.  Use a estratégia de Fire Emblem para obter a vantagem tática no estilo de jogo Warriors  Mergulhe em batalhas em tempo real enquanto você e seu exército de personagens de Fire Emblem: Three Houses enfrentam centenas de oponentes e usam elementos de Fire Emblem para maximizar sua estratégia. Dê comandos ao seu exército nas batalhas caóticas para completar missões e alcançar objetivos. Organize-se com antecedência e prepare-se para a batalha equipando armas, habilidades e classes para explorar as fraquezas dos inimigos. Atribua elementos de Fire Emblem: Three Houses, como brasões ou batalhões, a personagens para aprimorar ainda mais como você planeja a sua abordagem.  Fortaleça seus laços dentro e fora da batalha  Construa e desenvolva relacionamentos em batalha com outros personagens de Fire Emblem: Three Houses enquanto luta pelo futuro de Fóblan. Fortaleça os relacionamentos entre os personagens para obter uma vantagem tática no campo de batalha e ouvir os seus diálogos de apoio. Aproxime os personagens juntando-os na batalha ou passando tempo juntos no acampamento base. Desenvolva seu acampamento base e treine, equipe e prepare cada um dos membros de sua equipe antes de se jogar na batalha.', 'Nintendo', '2023-11-27 11:12:22', 1),
(44, 'pq_1701094540.jpg', 'gd_1701094540.jpg', 'Red Dead Redemption II', '149,00', 'Red Dead Redemption II', 'O jogo Red Dead Redemption II desenvolvido pela Rockstar Games para PS4 acontece nos Estados Unidos, em 1899.O fim da era do velho oeste começou, e as autoridades estão caçando as últimas gangues de fora da lei que restam. Os que não se rendem, nem sucumbem, são mortos.Depois de tudo dar errado durante um roubo em uma cidade do oeste chamada Blackwater, Arthur Morgan e a gangue Van der Linde são forçados a fugir.Com agentes federais e os melhores caçadores de recompensas no seu encalço, a gangue precisa roubar, assaltar e lutar para sobreviver no impiedoso coração dos Estados Unidos.Conforme divisões internas profundas ameaçam despedaçar a gangue, Arthur deve fazer uma escolha entre os seus próprios ideais e a lealdade à gangue que o criou.', 'Playstation', '2023-11-27 11:15:40', 1),
(45, 'pq_1701096713.jpg', 'gd_1701096713.jpg', 'Animal Crossing: New Horizons Nintendo Switch', '332,40', 'Animal Crossing', 'Esse é o Animal Crossing: New Horizons, um jogo de Simulação, agora para Nintendo Switch. Escape para uma ilha deserta e crie o seu próprio paraíso enquanto explora, cria e customiza em nesse game Animal Crossing: New Horizons. A sua ilha traz uma variedade incrível de recursos naturais que podem ser usados para criar de tudo, desde objetos para o seu conforto a ferramentas. Você pode caçar insetos ao amanhecer, decorar o seu paraíso durante o dia ou desfrutar do pôr do sol na praia enquanto pesca no oceano. A hora do dia e as estações do ano correspondem à realidade, então aproveite a oportunidade de conferir a sua ilha a cada dia para encontrar novas surpresas durante o ano todo.', 'Nintendo', '2023-11-27 11:51:53', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produtos`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

  ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
