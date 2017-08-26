<?php
include($_SERVER['DOCUMENT_ROOT'] . '/migracao/model/Dadosantigos.php');

$data = new Dadosantigos();

?>
<a href='#'>migrar</a>
<table>
    <tr>
        <th>#</th>
        <th>Produto</th>
        <th>cor</th>
        <th>Tamanho</th>
    
    </tr>
    
    
    <?php
    foreach ($data->dataLst() as $value) {
//        print "<pre>";
//        print_r($value);
//        die();
        echo "<tr><td>".$value->codigo."</td>";
        echo "<td>".$value->titulo."</td>";
        echo "<td>".$value->cor."</td>";
        echo "<td>".$value->tamanho."</td></tr>";
    }
    ?>
        
</table>
