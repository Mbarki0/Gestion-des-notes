<?php
$csv_file_name  = 'export.csv';
$handle =fopen($csv_file_name,'r');
$data = fgetcsv($handle , 1000 , 'r');
$data = fgetcsv($handle ,1000 , ",");
$all_record_arr =[];
while(($data = fgetcsv($handle,1000,","))!== FALSE )
{
    $all_record_arr[] = $data;
}
fclose($handle);
?>
<h1> Les notes des etudiants </h1>
<table>
    <tr>
    <th>Apogée</th>
    <th>Nom</th>
    <th>Prenom</th>
    </tr>
    
        <?php foreach($all_record_arr as $rec ){?>
    </tr> 
            <td><?=$rec[0]?></td><td><?=$rec[1]?></td><td><?=$rec[2]?></td>
            <?php }?>
    </tr>
        </table>