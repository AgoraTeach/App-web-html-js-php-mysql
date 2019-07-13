$(function(){
    console.log('JQuery esta funcionando');
    $('#gastoresult').hide();
    $('#search').keyup(function(){  //Capture el elemento con ID search
        let search = $('#search').val(); // let solo es un modificaro para que sea una variable local
        $.ajax({
            url: 'search.php',
            type: 'POST',


            data: { search },
            success: function(response){
                let gastodata = JSON.parse(response);//esto es un arreglo
                let template = '';
                gastodata.forEach(element => { 
                    template += `<li> 
                                ${element.monto} 
                                </li>` });
                $('#container').html(template);
                $('#gastoresult').show();
            }
        });
    });

    $('#inputData').submit(function(e){
        const datospost={
            descrip : $('#Descripcion').val(),
            monto : $('#monto').val()
        }
        $.post('enviarGastos.php',datospost,function(response){
            console.log(response);
            $('#inputData').trigger('reset');
        });
        e.preventDefault();
    });

    $.ajax({
        url: 'listarDatos.php',
        type: 'GET',
        success: function(response){
            let lista = JSON.parse(response);
            let template = '';
            lista.forEach(element => {
                template += `
                    <tr>
                        <td>
                            ${element.id}
                        </td>
                        <td>
                            ${element.descrip}
                        </td>
                        <td>
                            ${element.monto}
                        </td>
                    </tr>
                
                `
            });
            $('#Gastos').html(template);
            console.log(response);
        }
    });
});