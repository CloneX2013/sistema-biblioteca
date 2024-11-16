# Sistema de Biblioteca

Sistema de gerenciamento de biblioteca desenvolvido com Laravel 11 e Bootstrap 5.

## Requisitos

- PHP >= 8.2
- Composer
- MySQL >= 5.7
- Node.js >= 14.x
- NPM >= 6.x

## Instalação

1. Clone o repositório

git clone https://github.com/seu-usuario/laravel-react-test.git

2. Instale as dependências do PHP

composer install

3. Copie o arquivo de ambiente e configure o banco de dados

cp .env.example .env

4. Configure o arquivo .env com suas credenciais de banco de dados

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biblioteca
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

5. Gere a chave da aplicação

php artisan key:generate

6. Execute as migrações e seeders

php artisan migrate:fresh --seed

7. Inicie o servidor

php artisan serve


O sistema estará disponível em `http://localhost:8000`

## Funcionalidades

O sistema permite o gerenciamento completo de:

### Livros
- Listagem de livros
- Cadastro de novos livros
- Edição de livros existentes
- Exclusão de livros
- Relacionamento com autores, gêneros e editoras

### Autores
- Cadastro completo de autores com:
  - Nome
  - Ano de nascimento
  - Sexo
  - Nacionalidade
- Edição e exclusão de autores

### Gêneros Literários
- Gerenciamento de gêneros literários
- Relacionamento com livros
- Gêneros pré-cadastrados:
  - Romance
  - Ficção Científica
  - Fantasia
  - Drama
  - Terror
  - Suspense
  - Biografia
  - História
  - Autoajuda
  - Técnico
  - Literatura Brasileira
  - Literatura Estrangeira
  - Infantil
  - Juvenil
  - Poesia

### Editoras
- Cadastro e gerenciamento de editoras
- Relacionamento com livros
- Editoras pré-cadastradas:
  - Companhia das Letras
  - Rocco
  - Aleph
  - Darkside
  - Intrínseca
  - Suma
  - Record
  - Globo
  - Sextante
  - Nova Fronteira
  - Arqueiro
  - Martin Claret
  - Saraiva
  - Atlas
  - Moderna

## Estrutura do Banco de Dados

### Tabela authors

php
Schema::create('authors', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->integer('birth_year');
$table->enum('gender', ['M', 'F', 'O']);
$table->string('nationality');
$table->timestamps();
});


### Tabela publishers

php
Schema::create('publishers', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->timestamps();
});

### Tabela genres

php
Schema::create('genres', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->timestamps();
});

### Tabela books

php
Schema::create('books', function (Blueprint $table) {
$table->id();
$table->string('title');
$table->foreignId('author_id')->constrained()->onDelete('cascade');
$table->foreignId('genre_id')->constrained()->onDelete('cascade');
$table->foreignId('publisher_id')->constrained()->onDelete('cascade');
$table->integer('release_year');
$table->timestamps();
});


## Desenvolvimento

O projeto foi desenvolvido utilizando:

- Laravel 11 como framework backend
- Bootstrap 5 para interface
- MySQL como banco de dados
- Migrations para versionamento do banco
- Seeders para dados iniciais
- Eloquent ORM para relacionamentos

## Comandos Úteis

### Limpar cache

php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

### Recriar banco de dados

php artisan migrate:fresh --seed


### Atualizar autoload

composer dump-autoload


## Contribuição

1. Faça um Fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## Suporte

Em caso de dúvidas ou problemas:
1. Abra uma issue no repositório
2. Entre em contato através do email: pedropaulo19@gmail.com
3. Consulte a documentação do Laravel em https://laravel.com/docs