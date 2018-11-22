
<?php

include_once 'model/clsProduto.php';
include_once 'dao/clsProdutoDAO.php';
include_once 'dao/clsConexao.php';

$nome = "";
$quantidade = "";
$preco = "";
$action = "inserir";


if (isset($_REQUEST['editar'])) {
    $id = $_REQUEST['idProduto'];
    $produto = ProdutoDAO::getProdutoById($id);
    $nome = $produto->getNome();
    $quantidade = $produto->getQuantidade();
    $preco = $produto->getPreco();
   
    $action = "editar&idProduto=" . $produto->getId();
}
?>

<!DOCTYPE html>
<!--
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>produtos - Cadastrar produto</title>
    </head>
    <body>
        <?php
        require_once 'menu.php';
        ?>
        
        <h1 align="center">Cadastrar Produto</h1>
        
        <br><br><br>
        
        <form action="controller/salvarProduto.php?<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
            
            <label>Nome:</label>
            <input type="text" name="txtNome" value="<?php echo $nome; ?>"required maxlength="100"/> <br>
            <label>Quantidade:</label>
            <input type="text" name="txtQuantidade" value="<?php echo $quantidade; ?>" maxlength="30"/> <br>
            <label>Preco:</label>
            <input type="double" name="txtPreco" value="<?php echo $preco; ?>" required/> <br><br>
            
                </select><br><br>
            
             <br><br>
             <input type="submit" value="Salvar" />
