<?php
if(!empty(filter_input(INPUT_GET, 'id')))
{
    $id = filter_input(INPUT_GET, 'id');
    $query = "DELETE FROM Computers WHERE id=$id";
    include ('./Dbconnectphp.php');
    $db->exec($query);
    header("Location:index.php");
}
else
{
    header("Location:Formularhtml.html");
}
