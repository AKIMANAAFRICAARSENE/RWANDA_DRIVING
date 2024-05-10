<?php
    include "../../db/db.php";
    if(isset($_GET['id'])){
    $id=($_GET['id']);
    $sql="DELETE FROM grade WHERE candidate_nation_id='$id'";
    $query=mysqli_query($db,$sql);
    if($query){
        $sql="DELETE FROM candidate WHERE candidate_nation_id='$id'";
       $query=mysqli_query($db,$sql);
       if($query){
           if($sql)
           header('location: ../../candidates.php');
       }
        else{
           echo 'not deleted';
        }
    }
}
?>