<?php

class Fatura {
    private $numero;
    private $descricao;
    private $quantidade;
    private $preco;

    public function __construct($numero, $descricao, $quantidade, $preco) {
        $this->numero = $numero;
        $this->descricao = $descricao;
        $this->quantidade = max(0, $quantidade); //  quantidade seja positiva ou 0
        $this->preco = max(0.0, $preco); //  preço seja positivo ou 0.0
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = max(0, $quantidade);
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = max(0.0, $preco);
    }
    public function getTotalFatura() {
        $total = $this->quantidade * $this->preco;
        return max(0, $total);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Criar uma instância da classe Fatura com os dados fornecidos pelo formulário
    $fatura1 = new Fatura($_POST['numero'], $_POST['descricao'], $_POST['quantidade'], $_POST['preco']);
}




?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Fatura</title>
</head>
<body>
    <h2>Formulário de Fatura</h2>
    <form method="post" action="">
        <label for="numero">Número da Fatura:</label><br>
        <input type="text" id="numero" name="numero"><br>  
        
        
        <label for="descricao">Descrição:</label><br>
        <input type="text" id="descricao" name="descricao"><br>

        
        <label for="quantidade">Quantidade:</label><br>
        <input type="number" id="quantidade" name="quantidade"><br>

        
        <label for="preco">Preço por Item:</label><br>
        <input type="number" step="0.01" id="preco" name="preco"><br><br>
        
        
        <input type="submit" name="submit" value="Calcular Total">
    </form>

    <?php
    if (isset($fatura1)) {
        echo "<h2>Detalhes da Fatura</h2>";
        echo "Número da Fatura: " . $fatura1->getNumero() . "<br>";
        echo "Descrição: " . $fatura1->getDescricao() . "<br>";
        echo "Quantidade: " . $fatura1->getQuantidade() . "<br>";
        echo "Preço por item: " . $fatura1->getPreco() . "<br>";
        echo "Total da Fatura: " . $fatura1->getTotalFatura() . "<br>";
    }
    
    ?>
</body>
</html>
