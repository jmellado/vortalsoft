<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $titulo; ?></title>
        <link rel="stylesheet" href="<?php echo base_url();?>utilities/css/bootstrap.css">      
        <script type="text/javascript" src="<?php echo base_url();?>utilities/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>utilities/js/bootstrap.js"></script>
         <script src="http://code.jquery.com/jquery-1.8.3.js"></script>  
          <script type="text/javascript">
                function confirmarEliminar()
                  {
                    if (confirm("¿Esta seguro que desea eliminar?"))
                    { 
                        alert("El registro ha sido eliminado") 
                    }
                        else { 
                              return false
                             }
                  }
        </script>        
    </head>
    <body>
        <header>
            <section class="contenedor">
                <h1>VortalSoft</h1>
                <p>Software Para la Gestion Administrativa y Academica</p>
            </section>
        </header>
        