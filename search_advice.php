<?php
require_once("pdo_init.php");

class Item{
    public $title;
    public $id;
}
if(isset($_GET["keyword"]) and $_GET["keyword"]!=""){
    $keyword=$_GET["keyword"];
    $statement = $dbh->prepare("SELECT id, title FROM items WHERE title LIKE '%$keyword%' OR other LIKE '%$keyword%' UNION SELECT id, title FROM facebook_items WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%' LIMIT 0, 12");
    $data = array();
    if ($statement->execute()) {
        while ($row = $statement->fetch()) {
            //print_r($row);
            $item=new Item();
            $item->id=$row["id"];
            $item->title=$row["title"];
            $data[]=$item;
        }
        $json = json_encode($data);
        echo $json;
    } else {

    }
}
echo "TEST";