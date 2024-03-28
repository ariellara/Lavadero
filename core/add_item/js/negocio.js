function RecojerDatosDependencia()
{ 
    let codigo = document.getElementById('codigo_dependencia').value;
    let nombre = document.getElementById('nombre_dependencia').value;


   
    $.ajax({
        type: "POST",
        url: "../controller/save_dependencia.php",
        data: {
                 codigo: codigo,
                 nombre : nombre
              },
        cache: false,
        success: function(data) {
        alert(data);
        },
        error: function(xhr, status, error) {
        console.error(xhr);
        }
        });
    
}
function clearForm()
{
    $('#ff').form('clear');
}