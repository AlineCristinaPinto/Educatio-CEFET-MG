$(document).ready( function(){
    $("#alertaSelecioneAlteracaoCampus").hide();
    $("#alertaConfirma").hide();
    $("#botaoSelecionarAlteracoesCampus").click(function() {
        if ($('.checkboxAltera:checked').length == 0){
            $("#alertaSelecioneAlteracaoCampus").show();
        } else {
        	$("#alertaConfirma").show();
        }
    });    
});

function fecharAlerta(){
	$("#alertaSelecioneAlteracaoCampus").hide();
    $("#alertaConfirma").hide();
}

function voltarParaPaginaAlteracaoCampus(){
    location.href = "JHJ-web-alterar-campus-1.php";
}
