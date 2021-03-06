<?php 
session_start();
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">






    <title>Arquivos Externos</title>
</head>

<body>
    <div class="row justify-content-md-center">

        <div class="container col-md-6">
            <div class="alert alert-primary text-center mt-5 text-uppercase" role="alert">
                Serviço de Envio de arquivos Externos
            </div>

            <?php
                if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
            ?>


            <form enctype="multipart/form-data" action="upload.php" method="POST" id="formEnviarArquivo">


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Nome</label>
                    </div>
                    <select name="nome" class="custom-select" id="inputGroupSelect01">
                        <option selected>Escolha o Escrevente...</option>
                        <option value="Raimundo">Raimundo</option>
                        <option value="Marcelo">Marcelo</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Setor</label>
                    </div>
                    <select name="setor" class="custom-select" id="inputGroupSelect01">
                        <option selected>Escolha o Setor...</option>
                        <option value="proc">Procuração</option>
                        <option value="escrit">Escritura</option>
                        <option value="rcivil">Registro Civil</option>
                        <option value="tit">Titulos</option>
                        <option value="apt">Apostilamento</option>
                        <option value="fir">Firma</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="input-group-text">Data</button>
                    </div>
                    <input name="livro" type="text" class="form-control"
                        placeholder="Livro - Folha - Protocolo - Registro">
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="input-group-text">Data</button>
                    </div>
                    <input name="data" type="date" class="form-control" placeholder=""
                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>



                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input name="arquivo" type="file" class="custom-file-input" id="file"
                            aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Envie seu arquivo...</label>
                    </div>
                </div>
                <button class="submit btn btn-primary btn-block mt-3">Enviar</button>

                <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <div class="progress progress-striped active">
                        <div class="progress-bar" style="width: 0%">
                        </div>
                    </div>
                </div>
            </div>


            </form>



          



        </div>

        <div class="row justify-content-md-center">


            
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                crossorigin="anonymous">
            </script>
</body>

</html>