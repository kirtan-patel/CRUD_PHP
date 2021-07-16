<?php 
        include_once 'connect.php';
    if (isset($_POST['add'])) {
        add();
    }

    if (isset($_POST['delete'])) {
        delete();
    }
    if (isset($_POST['bringback'])) {
        add_deleted_user();
    }
 
 function popuplate(){
     require 'connect.php';

     $sql="SELECT * from details where isActive=0";
     $res=mysqli_query($con,$sql);
     
     
     //populating the data to the table using a loop
     while ($row=mysqli_fetch_array($res)) {
          echo '<tr>';
          $link='function.php?edit='.$row['ID'].'';
         echo '<td>' .$row['ID']. '</td>';
         echo '<td>' .$row['FirstName']. '</td>';
         echo '<td>' .$row['LastName']. '</td>';
         echo '<td>' .$row['Age']. '</td>';
         echo '<td>'.'<a href="'.$link.'">'.'Edit'. '</a>'. '</td>';
         echo '</tr>';
     }
 }

 function add(){
     require 'connect.php';
     $fname=$_POST['fname'];
     $lname=$_POST['lname'];
     $age=$_POST['age'];

     $sql="INSERT into details (`FirstName`,`LastName`,`Age`) values ('$fname','$lname','$age')";

     if (mysqli_query($con,$sql)) {
         header("Location:index.php");
     }else{
         echo mysqli_error($con);
     }
 }

 function delete(){
     require 'connect.php';
     $id=$_POST['id'];

     $sql="UPDATE details set  isActive=1 where ID='$id'";
     $res=mysqli_query($con,$sql);
     if ($res) {
        header("Location:index.php");
     }else{
         echo "opppsss error";
     }
 }

 function check_deleted_user(){
     require 'connect.php';
     $sql="SELECT ID from details where isActive=1";
     $res=mysqli_query($con,$sql);
     $num_res=mysqli_num_rows($res);

     for ($i=0; $i <$num_res ; $i++) { 
         $row=mysqli_fetch_array($res);
         $data=$row['ID'];
         echo '<option value="'.$data.'" name="pop" >' .$data. '</option>';
     }
 }

 function add_deleted_user(){
    require 'connect.php';
    $id=$_POST['bring'];
    $sql="UPDATE details set isActive=0 where ID='$id'";

    $res=mysqli_query($con,$sql);
    if (!$res) {
        header("Location:index.php");
        
    }

 }

?>