var validaComensales = function(){
    
    var bandera;
    
    if($('#nombre').val() !== '' && $('#apaterno').val() !== '' && $('#amaterno').val() !== '' && $('#correo').val() !== ''){
        return bandera = true;
    }else{
        return bandera = false;
    }
}