<?php

  $conn = mysqli_connect('localhost','root','','test') // Connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
 <div class="container mt-4">
 <h4 class="text-center">Data show using Jquery-Ajax Dropdown</h4><br>
   <div class="row">

    <div class="col-sm-4">
      <h6>Employee Name</h6>
        <select class="custom-select" name="select" id="selectID">
        <option>Select Option</option>
<!-- 
        // We are showing data in dropdown using php -->

        <?php $sql = "SELECT * FROM student";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)) {?>
            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

            <!-- ID will pass to PHP for data fetch using ID  -->
            <?php }?>

        </select>
     </div> 

     <div class="col-sm-4">  
     <h6>Employee Phone</h6>
      <select  class="custom-select"  name="select" id="show">
          <!-- So our output is printing here  -->
      </select>
    </div>
   
   </div>
 </div>    
</body>
</html>

<script>
  $(document).ready(function(){
     $('#selectID').change(function(){ // We will select anything It will call change event
      var Stdid = $('#selectID').val();    // Storing id val to variable 

      $.ajax({
        type: 'POST',
        url: 'fetch.php',
        data: {id:Stdid},  // id store and It will send to fetch.php

        success: function(data)  // Here we receive or got our output
         {
            $('#show').html(data); //Now will show data to #show id 
         }
        });
     });
  });
</script>
