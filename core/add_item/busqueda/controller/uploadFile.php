
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    include('..\..\core\conexion.php');
    $nombre = $_POST['nom_doc'];
    $fecha_doc = $_POST['fecha_documento'];
    $id_dep = $_POST['id_dep'];
    $id_area = $_POST['id_area'];
    $id_subarea = $_POST['id_subarea'];
    $id_documento  = $_POST['documento'];
    $id_responsable = $_POST['responsable'];

    $targetDirectory = "../../data_upload/respaldos/"; // Directorio donde se guardarán los archivos
    $targetFile = $targetDirectory . basename($_FILES["pdffile"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $ubicacion = "respaldos/". basename($_FILES["pdffile"]["name"]);

    if ($fileType !== "pdf") 
    {
        echo "Solo se permiten archivos PDF.";
    }
     else 
     {
        // Mover el archivo al directorio de destino
     if (move_uploaded_file($_FILES["pdffile"]["tmp_name"], $targetFile)) 
        {
                        $sql = "INSERT INTO tb_files (
                            nom_doc,
                            ubicacion_doc,
                            fecha_documento,
                            id_dependencia,
                            id_area,
                            id_subarea,
                            id_responsable,
                            id_documento)
                VALUES (
                        '$nombre',
                        '$ubicacion',
                        '$fecha_doc',
                        '$id_dep',
                        '$id_area',
                        '$id_subarea',
                        '$id_responsable',
                        '$id_documento'
                )";
            if (mysqli_query($conn, $sql)) 
            {
            print "<script>
            alert('Registro Cargado');
            window.location.href ='../../data_upload/main.htm';

            </script>";
            } 
            else 
            {
            print "Error: " . $sql . "<br>" . mysqli_error($conn);
            }  
                    } 
                    else 
                    {
                        echo "Hubo un error al cargar el archivo.";
                    }
    }


   
         
}       
?>
