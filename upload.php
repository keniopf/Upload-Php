<?php
session_start();


$nome = $_POST['nome'];
$setor = $_POST['setor'];
$data = $_POST['data'];
$livro = $_POST['livro'];
 
// Pasta onde o arquivo vai ser salvo

 $_UP['pasta'] = 'upload/'.$_POST['nome'].'/';

 print_r($_UP);

// switch($_POST['nome']){
//     case 'Raimundo':
//         $_UP['pasta'] = 'upload/Raimundo/';
//      break;

//  case 'Marcelo':
//         $_UP['pasta'] = 'upload/Marcelo/';
//      break;
//     }

//     print_r($_POST);



 
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 6; // 2Mb
 
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif', 'jpeg', 'pdf', 'mp4');
 
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;
 
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
 
// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; // Para a execução do script
}
 
// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
 
// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
// echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
$_SESSION['msg'] = "<div class='alert alert-danger text-center'>Por favor, envie arquivos com as seguintes extensões: jpg, jpeg, png, gif, pdf ou mp4";
header("Location: index.php");

}
 
// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
// echo "O arquivo enviado é muito grande!";
$_SESSION['msg'] = "<div class='alert alert-danger text-center'>O arquivo enviado é muito grande!";
header("Location: index.php");
}
 
// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
time().$nome_final = $livro." - ".$nome." - ".$setor." - ".$data.".".$extensao;
} else {
// Mantém o nome original do arquivo
//$nome_final = $_FILES['arquivo']['name'];
$nome_final = time().$livro." - ".$nome." - ".$setor." - ".$data.".".$extensao;
}
 
// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
// echo "Upload efetuado com sucesso!";
// echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';

$_SESSION['msg'] = "<div class='alert alert-success text-center'>Arquivo Enviado com Sucesso</div>";
header("Location: index.php");
} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
// echo "Não foi possível enviar o arquivo, tente novamente";
// var_dump($_UP);
$_SESSION['msg'] = "<div class='alert alert-danger text-center'>Não foi possível enviar o arquivo, tente novamente";
header("Location: index.php");
}
 
}
 
?>


