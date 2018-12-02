
<?php
$xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");
print_r($xml->note[0]->a->b);
?>


<?php
$xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");
foreach($xml->children() as $note) { 
    echo $note->heading;
    echo "<br>"; 
} 
?>
