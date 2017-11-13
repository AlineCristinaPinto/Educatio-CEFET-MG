<?php
	ini_set('default_charset','UTF-8');

	$strNomeServer = "localhost";
	$strNomeUsuario = "root";
	$strSenha = null;
	$strDBnome = "Educatio";

	//Cria conexão
	$conn = new mysqli($strNomeServer, $strNomeUsuario, $strSenha);
	//Verifica conexão
	if ($conn->connect_error) {
   		die("Falha na conexão: " . $conn->connect_error."<br>");
	}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Alterar Departamento</title>
	<meta charset="utf-8">

	<!-- CSS do Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/bootstrap.css" rel="stylesheet"/>

	<!-- CSS do grupo -->
 	<link href="css/CSSGrupo.css" rel="stylesheet" />
	 

	<!-- Arquivos js -->
	<script src="js/popper.js"></script>
	<script src="js/jquery-3.2.1.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

	<!-- Fontes e icones -->
	<link href="css/nucleo-icons.css" rel="stylesheet">

</head>

<body>

<div class="wrapper">
	<div class="container">
		<div class="col-md-8 ml-auto mr-auto">

			<h1 class="text-center">Alterar Departamento</h1>

			<form method="POST" action="" class="contact-form">

			<div class="input-group">
					<span class="input-group-addon"><i class="nc-icon nc-hat-3"></i></span>
					<select name="idCampi" class="form-control" required="required">
						<option value="">Selecione o Campus</option>
						<!-- Pega os dados do banco e coloca no select -->
						<?php $strSQL = $conn->query("SELECT nome, id, ativo, cidade FROM `Educatio`.`campi`"); ?>	
						<?php while($arrLinha2 = $strSQL->fetch_assoc()) { ?>
						<?php if ($arrLinha2['ativo'] != 'N') {?>	
						<option value="<?php echo $arrLinha2['id']?>"><?php echo $arrLinha2['nome']." - Cidade: ".$arrLinha2['cidade']; ?></option>
						<?php }} ?>
					</select>
				</div>

				<br>

				<div class="input-group">
					<span class="input-group-addon"><i class="nc-icon nc-settings-gear-65"></i></span>
					<select name="Opc" class="form-control" required="required">
						<option value="">Selecione o que Alterar</option>
						<option value="Nome">Nome</option>
						<option value="IdCampi">Id-Campi</option>
					</select>
				</div>
				
				<div class="row">
					<div class="col-md-4 ml-auto mr-auto">
						<input type="submit" name="Selecionar" value="Selecionar" class="btn btn-info btn-round">
					</div>
				</div>	
							
			</form>

		</div>
	</div>
</div>

</body>
</html>

<?php
	if (isset($_POST["Selecionar"])){
		if($_POST['Opc'] == "Nome"){
	  		header('Location: DepartamentoAlterarNome.php?intIdCampi='.$_POST['idCampi']);
  		}else if ($_POST["Opc"] == "IdCampi"){
			header('Location: DepartamentoAlterarIdCampi.php?&intIdCampi='.$_POST['idCampi']); 
		}
	}
 	
	//Fecha a conexão
	$conn->close();
?>