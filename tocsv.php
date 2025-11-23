<?php
include "simplehtmldom_1_5/simple_html_dom.php";
$table = '<table border="1">
<tr>
<th>Header 1</th>
<th>Header 2</th>
</tr>
<tr>
<td>row 1, cell 1</td>
<td>row 1, cell 2</td>
</tr>
<tr>
<td>row 2, cell 1</td>
<td>row 2, cell 2</td>
</tr>
</table>';

$html = str_get_html($table);



header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename=sample.csv');

$fp = fopen("php://output", "w");

foreach($html->find('tr') as $element)
{
        $th = array();
        foreach( $element->find('th') as $row)  
        {
            $th [] = $row->plaintext;
        }

        $td = array();
        foreach( $element->find('td') as $row)  
        {
            $td [] = $row->plaintext;
        }
        !empty($th) ? fputcsv($fp, $th) : fputcsv($fp, $td);
}


fclose($fp);
?>