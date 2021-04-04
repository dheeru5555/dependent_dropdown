<?php 
  $conn = mysqli_connect('localhost','root','','test');

  $id = $_POST['id'];

  $sql = "SELECT * FROM student WHERE id= $id ";

  $result = mysqli_query($conn,$sql);

  $out='';
  while($row = mysqli_fetch_assoc($result)) 
  {   
      
     $out .=  '<option>'.$row['phone'].'</option>'; // Storing to $out
  }

   echo $out;


?>