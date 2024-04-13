function openModal(parametro) {
    $.get(`resultados.php?parametro=${parametro}`, function(data) {
        let modalBody = $('#modalBody');
        modalBody.empty(); // Limpiar el contenido actual del modal
 
        // Agregar los datos recibidos al modal
        data.forEach(function(item) {
            modalBody.append(`<p>${item.columna}</p>`);
        });
    });
 }
 