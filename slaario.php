<?php

class Empregado {
    private $nome;
    private $sobrenome;
    private $salarioMensal;

    public function __construct($nome, $sobrenome, $salarioMensal) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->salarioMensal = $salarioMensal;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function getSalarioMensal() {
        return $this->salarioMensal;
    }

    public function setSalarioMensal($salarioMensal) {
        $this->salarioMensal = $salarioMensal;
    }

    public function salarioAnual() {
        return $this->salarioMensal * 12;
    }

    public function aplicarAumento($porcentagem) {
        $aumento = $this->salarioMensal * ($porcentagem / 100);
        $this->salarioMensal += $aumento;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Salário Anual de Empregados</title>
</head>
<body>

<?php
$empregado1 = new Empregado("João", "Silva", 3000);
$empregado2 = new Empregado("Maria", "Santos", 4000);

echo "<h2>Salário Anual Antes do Aumento:</h2>";
echo "Empregado 1: " . $empregado1->getNome() . " " . $empregado1->getSobrenome() . " - Salário Anual: " . $empregado1->salarioAnual() . "<br>";
echo "Empregado 2: " . $empregado2->getNome() . " " . $empregado2->getSobrenome() . " - Salário Anual: " . $empregado2->salarioAnual() . "<br>";

$empregado1->aplicarAumento(10);
$empregado2->aplicarAumento(10);

echo "<h2>Salário Anual Após Aumento de 10%:</h2>";
echo "Empregado 1: " . $empregado1->getNome() . " " . $empregado1->getSobrenome() . " - Salário Anual: " . $empregado1->salarioAnual() . "<br>";
echo "Empregado 2: " . $empregado2->getNome() . " " . $empregado2->getSobrenome() . " - Salário Anual: " . $empregado2->salarioAnual() . "<br>";
?>

</body>
</html>
