Laravel PHP Framework

O que é este projeto?

Simulação de plataforma de cadastro de cursos, alunos e registro de matrícula.
O projeto tem como objetivo aplicar conhecimentos adquiridos para a criação de aplicação utilizando html, CSS, JavaScript e PHP, com o framework Laravel.

Para rodar este projeto

$ git clone https://github.com/ArianeValasques/cursos
$ cd projeto
$ composer install
$ php artisan key:generate

#antes de rodar este comando verifique sua configuracao com banco em .env

#Vale ressaltar que a criação do banco e sua configuração é necessária

$ php artisan migrate

## Ferramentas adicionadas

Neste projeto, foram utilizadas as seguintes ferramentas:

-   AdminLTE (template administrativo)
-   DataTables (plugin para a biblioteca jQuery para interação com tabelas)
-   MaskedInput (plugin para máscaras em campos HTML)


![cursos](https://github.com/ArianeValasques/cursos/assets/87836797/db29ba8c-ea81-4729-87af-01628d932f9e)
                                                                                                                    

Anotações/Extras

As seções a seguir são anotações sobre a aplicação e o seu desenvolvimento.

Estruturas importantes

    app/Http/routes.php: arquivo que define as rotas da aplicação.
    app/Http/Controllers: ficam os controllers da aplicação.
    resources: ficam as views da aplicação. Imagens, CSS, JS e arquivos úteis na /public.
    As Models foram criadas na raiz de /app.

Banco de dados

    Em config/database.php existem as configurações de conexão com o banco de dados.
    O Laravel se baseia em migrations, ou seja, é possível criar arquivos com toda a infraestrutura das tabelas. Isto facilita o controle das modificações de banco e registros padrão de testes podem ser utilizados/gerados.
    Após criar as migrações necessárias, podemos requisitar a criação das mesmas para o banco de dados executando: $ php artisan migrate

    MassAssigment: é comum que para criar um registro no banco de dados, setamos todas as informações em um objeto e depois realizamos o insert do mesmo. Precisamos codificar no Model quais campos da tabela serão permitidos para MassAssigment. Para isso basta criar um array protegido chamado $fillable e especificar os nomes dos campos (ver model Cliente.php para exemplo).
