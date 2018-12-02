<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=labase;charset=utf8mb4', 'root', '');
  
  
  // SELECT
  
  $stmt = $db->query("SELECT * FROM T1");
    
  $row_count = $stmt->rowCount();
  echo $row_count.' rows selected';
  
  //$rr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
  {
    echo '<br/> ROW__:'.$row['n'].' '.$row['s']; 
  }
  
    //print_r( $rr); 
  
    foreach($db->query('SELECT * FROM T1') as $row) 
    {
      echo '<br/> ROW:'.$row['n'].' '.$row['s']; 
    }
  
  // INSERT
  
  $result = $db->exec("INSERT INTO T1(n, s) VALUES('popo2', 'pepe2')");
  $insertId = $db->lastInsertId();
  echo $insertId.' es el ultimo id insertado';
  
  // UPDATE
  
  $affected_rows = $db->exec("UPDATE T1 SET n='ggYY' where s='A'");
  echo $affected_rows.' were affected';
  
  
  // SELECT CON PARAMETROS
  
  $stmt = $db->prepare("SELECT * FROM T1 WHERE id=? AND n=?");
  $data = $stmt->execute(array(23, "popo2"));
  //$rows = $stmt->fetchAll();
  //print_r($rows);
  
  
  while ($row = $stmt->fetch()) 
  {
    print "<p>Name: ".$row['n'].$row['s']."</p>";
  }
 // var_dump($data);

  
  
  // CONTINUA...
  
  
  //var_dump( $rr);
} catch(PDOException $ex) {
    echo "An Error occured! ".$ex->getMessage();
}
?>