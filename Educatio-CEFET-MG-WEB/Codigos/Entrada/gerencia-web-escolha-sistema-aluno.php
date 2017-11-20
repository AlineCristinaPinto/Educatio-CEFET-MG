<?php 
  session_start(); 

  $usuario = $_SESSION['usuario'];
  
  echo "<script> 
          if(window.sessionStorage.getItem('logado') == 'N') 
            location.href = '../Login/gerencia-web-login.html'; 
        </script>";

   // header ('Content-type: text/html; charset=ISO-8859-1');      
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bem Vindo - Educatio CEFET-MG</title>
	<meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <!-- CSS do Bootstrap -->
  <link href="../../Estaticos/Bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../Estaticos/Bootstrap/css/bootstrap.css" rel="stylesheet"/>

  <!-- Arquivos js -->
  <script src="../../Estaticos/Bootstrap/js/popper.js"></script>
  <script src="../../Estaticos/Bootstrap/js/jquery-3.2.1.js" type="text/javascript"></script>
  <script src="../../Estaticos/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  
  <!-- Fontes e icones -->
  <link href="../../Estaticos/Bootstrap/css/nucleo-icons.css" rel="stylesheet">
 
  <style type="text/css">

    .profile{
      border: 1px solid;
      border-radius: 25px;
      width: 22px; 
      height: 22px;
    }

    h1{
      text-align: center;
      font-size: 45px;
      color: #d8ac29;
    }

    .par{
      font-size: 30px;
    }

    .entrada{
      height: 200px;
      width: 200px;
      position:absolute;
      top:50%;
      left:50%;
      margin-top:-50px;
      margin-left:-50px;
    }

    .centralizado{
      text-align: center;
    }
    
    .navbar{
      background-color: black;
    }
    
    .logo{
      margin-top: -5px;
      height: 31px;
      width: 30px;
    }
    
    .perfil{
      border: 1px solid;
      border-radius: 25px;
      width: 22px; 
      height: 22px;
    }
    
    .navbar-expand-md{
      background-color: #0a0744;
    }
     
    .navbar .navbar-toggler .navbar-toggler-bar {
      background: white;
    }
    
    .navbar .navbar-nav .nav-item .nav-link {
      color: white;
    }

  </style>  
  
  <script type="text/javascript">
    function fazerLogout(){
    window.sessionStorage.setItem('logado', 'N'); 
  }  
  </script> 
</head>
<body> 
  <nav class="navbar navbar-expand-md navbar-default">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand"><img class="logo" src="../../Estaticos/Logo/Educatio.png"></a>
            
        <div id="menu" class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nc-icon nc-book-bookmark"></i>Acessar Sistema Acadêmico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nc-icon nc-book-bookmark"></i>Acessar Biblioteca</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" role="button" aria-haspopup="true" aria-expanded="false">

                    <?php 

                        if($usuario['foto'] == null){
                          echo '<img class="profile" src="../../Estaticos/imagens/perfil.png"/>';

                        } else {
                          echo '<img class="profile" src="data:image/jpeg;base64,'.base64_encode( $usuario['foto'] ).'"/>';
                        }
                    ?>   

                    <?php echo $usuario['nome'];?> <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="gerencia-web-perfil-aluno.php">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href= "../Login/gerencia-web-login.html" onclick = "fazerLogout()">Sair</a>
                    </ul>
                </div> 
            </ul>
        </div>
  </nav> 

  <div>
  <h1>Bem Vindo(a) ao Sistema Educatio-CEFET-MG</h1><br>
  <p class="par centralizado">Escolha qual Sistema deseja acessar no momento.</p>
  <img class="entrada" src="../../Estaticos/Logo/Educatio.png">    
  </div>  

  <?php 

    require "../../Menu-Rodape/gerencia-web-rodape-caso-2.php";

  ?>

</body>
</html>  