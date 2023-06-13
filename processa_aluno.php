<?php 

include 'db.php';

$nome_aluno = $_POST['nome_aluno'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$data_nascimento = $_POST['data_nascimento'];;

$query = "INSERT INTO ALUNOS(nome_aluno, cpf, email, telefone, data_nascimento) VALUES('$nome_aluno', '$cpf','$email', '$telefone', '$data_nascimento')";

mysqli_query($conexao, $query);

header('location:index.php?pagina=alunos');
