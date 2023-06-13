<?php if(!isset($_GET['editar'])){ ?>

<h1>Inserir novo aluno</h1>
<form method="post" action="processa_aluno.php">
	<br>
	<label class="badge badge-secondary">Nome:</label><br>
	<input class="form-control col-4" type="text" name="nome_aluno" placeholder="Insira o nome do aluno">
	<br>
	<label class="badge badge-secondary">CPF:</label><br>
	<input class="form-control col-4" type="text" name="cpf" placeholder="Insira o CPF do aluno">
	<br>
	<label class="badge badge-secondary">E-mail:</label><br>
	<input class="form-control col-4" type="text" name="email" placeholder="Insira o e-mail do aluno">
	<br>
	<label class="badge badge-secondary">Telefone:</label><br>
	<input class="form-control col-4" type="text" name="telefone" placeholder="Insira o telefone do aluno">
	<br>
	<label class="badge badge-secondary">Data de nascimento:</label><br>
	<input class="form-control col-4" type="date" name="data_nascimento" placeholder="Insira a data de nascimento"><br>
	<input type="submit" class="btn btn-success" value="Inserir aluno">
</form>

<?php } else { ?>
	<?php while($linha = mysqli_fetch_array($consulta_alunos)){ ?>
		<?php if($linha['id_aluno'] == $_GET['editar']){ ?>
			<h1>Editar aluno</h1>
				<form method="post" action="edita_aluno.php">
					<input type="hidden" name="id_aluno" value="<?php echo $linha['id_aluno']; ?>">
					<br>
					<label class="badge badge-secondary">Nome:</label><br>
					<input class="form-control col-4" type="text" name="nome_aluno" placeholder="Insira o nome do aluno" value="<?php echo $linha['nome_aluno']; ?>">
					<br><br>
					<label class="badge badge-secondary">CPF:</label><br>
					<input class="form-control col-4" type="text" name="cpf" placeholder="Insira o CPF do aluno" value="<?php echo $linha['cpf']; ?>">
					<br><br>
					<label class="badge badge-secondary">E-mail:</label><br>
					<input class="form-control col-4" type="text" name="email" placeholder="Insira o e-mail do aluno" value="<?php echo $linha['email']; ?>">
					<br><br>
					<label class="badge badge-secondary">Telefone:</label><br>
					<input class="form-control col-4" type="text" name="telefone" placeholder="Insira o telefone do aluno" value="<?php echo $linha['telefone']; ?>">
					<br><br>
					<label class="badge badge-secondary">Data de nascimento:</label><br>
					<input class="form-control col-4"  type="date" name="data_nascimento" placeholder="Insira a data de nascimento" value="<?php echo $linha['data_nascimento']; ?>"><br><br>
					<input class="btn btn-success" type="submit" value="Editar aluno">
				</form>
			<?php } ?>
	<?php } ?>
<?php } ?>