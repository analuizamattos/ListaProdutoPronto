<?php



class ProdutoDAO {

    public static function inserir($produto) {
        $sql = "INSERT INTO produtos "
                . " ( nome, quantidade, preco  ) VALUES "
                . " ( '" . $produto->getNome() . "' , "
                . "  " . $produto->getQuantidade() . " , "
                . "  " . $produto->getPreco() . "  "
                . " ); ";
        Conexao::executar($sql);
    }

    public static function editar($produto) {
        $sql = "UPDATE produtos SET "
                . " nome = '" . $produto->getNome() . "' , "
                . " quantidade = " . $produto->getQuantidade() . " , "
                . " preco = " . $produto->getPreco() . "  "
                
                . " WHERE id = " . $produto->getId();
        
       // echo $sql;

        Conexao::executar($sql);
    }

    public static function excluir($produto) {
        $sql = "DELETE FROM produtos "
                . "WHERE id = " . $produto->getId();

        Conexao::executar($sql);
    }

    public static function getProdutos() {
        $sql = " SELECT id, nome, quantidade, preco "
                . " FROM produtos  "
                . " ORDER BY nome ";


        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        while (list( $cod, $nome, $quantidade, $preco ) = mysqli_fetch_row($result)) {
            
            $produto = new Produto();
            $produto->setId($cod);
            $produto->setNome($nome);
            $produto->setQuantidade($quantidade);
            $produto->setpreco($preco);
            $lista->append($produto);
        }
        return $lista;
    }
    
    public static function getProdutoById( $id ) {
        $sql = " SELECT id, nome, quantidade, preco "
                . " FROM produtos  "
                . " WHERE id = ".$id;
                

        $result = Conexao::consultar($sql);
        
        list( $cod, $nome, $quant, $preco ) = mysqli_fetch_row($result);
            $produto = new Produto();
            $produto->setId($cod);
            $produto->setNome($nome);
            $produto->setQuantidade($quant);
            $produto->setpreco($preco);
        return $produto;
    }

}


