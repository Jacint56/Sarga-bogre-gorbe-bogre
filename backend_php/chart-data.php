<?php
session_start();
require_once "db_config.php";
$select_query;
$data =array();
for($i = 1;$i<13;$i++){
$select_query = "SELECT sum(price) AS 'osszegahonapra'
                FROM expenses WHERE MONTH(date) = " . $i;
$executeQuery = $conn -> prepare($select_query);
$executeQuery -> execute();


$j = 0;
while($row = $executeQuery->fetch(PDO::FETCH_ASSOC)){
    $data[$j++] = $row["osszegahonapra"];
}
}
//var_dump($data);
//echo "<br><br>";    
    /*foreach($data as $row ){
        //unset($id, $name);
        $idExpenses = $row['ID'];
        $idPerson = $row['id_person']; 
        $idExpenseCategory = $row['id_expenses_category'];
        $expensesDetails = $row['details'];
        $expensesDate = $row['date'];
        $expensesPrice = $row['Price'];
        $idHouseManage = $row['id_house_manage'];
    }*/
    var_dump($data);
?>