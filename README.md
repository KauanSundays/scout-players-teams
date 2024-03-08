## Sistema de Scout de Jogadores de Futebol Americano
Este é um sistema desenvolvido em fullstack utilizando Laravel, Bootstrap e MySQL, destinado a auxiliar faculdades e avaliadores na identificação e seleção de talentos no futebol americano.

<h1>Funcionalidades Principais</h1>
<h2>Autenticação de Usuários: </h2>
    Sistema de login e registro seguro para faculdades e avaliadores, com diferentes níveis de permissões.

<h2>Perfil de Usuário: </h2>
Permite que faculdade possam personalizar seu perfil, cadastrar suas necessidades.  Já os avaliadores, os estados que trabalha, podem cadastrar jogadores que avaliaram ser promissores.

<h2>Gerenciamento de Necessidades das Faculdades: </h2>
Faculdades podem cadastrar suas necessidades específicas de jogadores por posição, habilidades desejadas, critérios acadêmicos, entre outros.

<h2>Busca e Filtros Avançados: </h2>
Sistema de busca e filtros avançados para encontrar jogadores com base em critérios específicos.

<h2>Avaliação de Jogadores: <h2>
Avaliadores podem registrar informações detalhadas sobre os jogadores avaliados, incluindo habilidades técnicas, físicas e mentais, critérios acadêmicos, estado que nasceu.

Tecnologias Utilizadas
Laravel: Framework PHP para o desenvolvimento de aplicativos web.

Bootstrap: Framework front-end para desenvolvimento ágil e responsivo de interfaces.

MySQL: Banco de dados relacional para armazenamento de dados.

Pré-requisitos
PHP >= 8.1
Composer
MySQL
Instalação
Clone este repositório: git clone https://github.com/seu-usuario/nome-do-repositorio.git
Instale as dependências do Composer: composer install
Copie o arquivo .env.example para .env e configure as variáveis de ambiente, como as credenciais do banco de dados.
Gere uma nova chave de aplicativo: php artisan key:generate
Execute as migrações do banco de dados: php artisan migrate
Inicie o servidor: php artisan serve
Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para abrir uma issue ou enviar um pull request.

Licença
Este projeto está licenciado sob a MIT License.

Este README fornece uma visão geral do projeto, instruções de instalação e informações sobre como contribuir e a licença do projeto. Certifique-se de adaptá-lo conforme necessário para o seu projeto específico.
