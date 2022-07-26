
function maskcep(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2")         //Coloca o traço
    return v;
}

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

//função para aplicar a máscara após cada tecla pressionada
$('.cep').unbind('keyup');
$('.cep').keyup(function(event) {
    mascara(this, eval('maskcep'));
});