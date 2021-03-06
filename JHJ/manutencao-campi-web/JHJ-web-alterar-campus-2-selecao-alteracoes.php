<?php
    session_start();
    $select = $_POST['selectParaAlterarCampus'];
    foreach($select as $_valor){
        //pega id do campus que sera alterado
        $intIdCampus = $_valor;
        $_SESSION['intIdCampus'] =  $intIdCampus;
    }

    // Conectando com o servidor MySQL
    $link = mysqli_connect("localhost", "root", "");
    if (!$link){
    //     die("Conexao falhou: ".mysqli_connect_error()."<br/>");
    } else {
    //     echo "Conexao efetuada com sucesso!<br/>";
    }
    // Selecionado BD
    $sql = mysqli_select_db($link, 'Educatio');

    //Seleciona os dados do campus com id recebido pelo select
    $query = mysqli_query($link, " SELECT nome, cidade, UF, ativo FROM campi WHERE id = $intIdCampus ");
    while($campus = mysqli_fetch_array($query)) { 
        $strNomeCampus = $campus['nome'];
        $_SESSION['strNomeCampus'] = $strNomeCampus;

        $strCidadeCampus = $campus['cidade'];
        $_SESSION['strCidadeCampus'] = $strCidadeCampus;

        $strUFCampus = $campus['UF'];
        $_SESSION['strUFCampus'] = $strUFCampus;

        $strAtivoCampus = $campus['ativo']; 
    }
?>
<html>
    <head>
        <title>Alterar Campus</title>
        <meta charset="utf-8">

        <!-- CSS do Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/bootstrap.css" rel="stylesheet"/>

        <!-- CSS do grupo -->
        <link href="css/JHJ-web-estilos.css" rel="stylesheet"/>
        <link href="css/JHJ-web-estilos-painel.css" rel="stylesheet"/>

        <!-- Arquivos js -->
        <script src="js/popper.js"></script>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/JHJ-web-script-alterar-campus.js" type="text/javascript"></script>

        <!-- Fontes e icones -->
        <link href="css/nucleo-icons.css" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">         
            <div class="section landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <h2 class="text-center">ALTERAÇÃO DE CAMPUS</h2>
                            <!-- exibindo informações originais do campus -->
                            <div class='container' style='margin-top: 50px;'>
                                <div class='row'>
                                    <div class='col-md-8 ml-auto mr-auto'>                    
                                        <div class='panel'>
                                            <div class='panel-heading' style='margin-top: 0px;'>
                                                <div class='panel-title'>Informações do Campus</div>
                                            </div>  
                                            <div style='padding-top: 20px' class='panel-body' id='padin'>  
                                                <p style="font-weight: bold;">As informações originais do campus são:</p> 
                                                <p><label style="font-weight: bold; margin-bottom: 0;">Nome:</label><?php echo " ".$strNomeCampus ?></p>
                                                <p><label style="font-weight: bold; margin-bottom: 0;">Cidade:</label><?php echo " ".$strCidadeCampus ?></p>
                                                <p><label style="font-weight: bold; margin-bottom: 0;">UF:</label><?php echo " ".$strUFCampus ?></p>

                                                <form class="contact-form" action="JHJ-web-alterar-campus-3-adicao-alteracoes.php" method="POST" onsubmit="return valida();">
                                                    <p style="font-weight: bold; margin-bottom: 0;">Selecione as informações que você deseja alterar:</p> 
                                                    <div class="col-md-6 checkbox">
                                                        <label style="margin-bottom: 0;"><input type="checkbox" class="checkboxAltera" name="checkboxParaAlterarCampus[]" value="Nome"> Nome</label>
                                                    </div>
                                                    <div class="col-md-6 checkbox">
                                                        <label style="margin-bottom: 0;"><input type="checkbox" class="checkboxAltera" name="checkboxParaAlterarCampus[]" value="Cidade"> Cidade</label>
                                                    </div>
                                                    <div class="col-md-6 checkbox">
                                                        <label style="margin-bottom: 0;"><input type="checkbox" class="checkboxAltera" name="checkboxParaAlterarCampus[]" value="UF"> UF</label>
                                                    </div>
                                                <div class='row'>
                                                    <div style='float: left;' class='col-md-4 ml-auto mr-auto'>
                                                        <input style='margin-bottom: 10px; margin-left: 50px;' id="botaoSelecionarAlteracoesCampus" type='submit' class='btn btn-info btn-round' value='PROSSEGUIR'>
                                                    </div>
                                                    <div style='float: left;' class='col-md-4 ml-auto mr-auto'>
                                                        <input style='margin-bottom: 10px; margin-left: -40px;' type='button' class='btn btn-info btn-round' onClick='voltarParaPaginaAlteracaoCampus()' value="VOLTAR">
                                                    </div>
                                                </div>                     
                                            </div>  
                                        </div> <!-- panel -->
                                    </div>
                                </div> <!-- row -->
                            </div> <!-- conteiner -->   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- alerta para verificar se o usuario selecionou pelo menos uma das opções de alteração -->
        <div class="modal fade" id="alertaSelecioneAlteracaoCampus" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">Alerta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecione pelo menos umas das opções disponíveis para alteração!</div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-success btn-link" data-dismiss="modal" onclick="fecharAlerta()">Entendi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  fim do alerta para verificar se o usuario selecionou pelo menos uma das opções de alteração -->
    </body>
</html>