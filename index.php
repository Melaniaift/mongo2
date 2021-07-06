<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
require_once 'connection.php';
$query=new MongoDB\Driver\Query([]);
$rows =$client->executeQuery("flori.flowers",$query);
?>
        <table>
            <tr>
                <th>Nume</th>
                <th>Marime</th>
                <th>Culoare</th>
                <th>Pret</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php foreach ($rows as $val):?>
    <?php if((isset($val->nume))&&(isset($val->culoare))&&(isset($val->marime))&&(isset($val->pret))&&
($val->nume!="")&& ($val->culoare!="")):?>        
            <tr>
    <td><?php echo $val->nume;?></td>
    <td><?php echo $val->culoare;?></td>
    <td><?php echo $val->marime;?></td>
    <td><?php echo $val->pret;?></td>
    <td><?php echo "<a href=\"view.php?id=".$val->_id."\">View</a>";?></td>
 <td><?php echo "<a href=\"edit.php?id=".$val->_id."\">Edit</a>";?></td>
  <td>
<?php echo "<a href=\"delete.php?id=".$val->_id."\" onclick=\" return confirm('Are you sure you want to delete this document?')\";> Delete</a>";?> 
</td> 
            </tr>
    <?php endif;?>
    <?php endforeach;?>
</table>
        <a href="insert.php">Add a new line</a>
        <a href="search_form.php">Search</a>
</body>
</html>