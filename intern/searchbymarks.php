<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Search by Marks</title>
<link rel="stylesheet" href="styles.css">
</head>
<body bgcolor = "#CCFFFF" text = "#660099">
<h1> Search by Marks</h1>

<p> Go to <a href="index.html"> Menu </a></p>
<?php
$self = $_SERVER['PHP_SELF'];
?>
<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'Abhi@1234';
   
   $conn= new mysqli("localhost","root","Abhi@1234","intern");
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error());
   }
   
   $ser=$_POST['valueToSearch'];
   $sql="select sname,Phone from studdetails where Total>'$ser'";

        $res=$conn->query($sql);

        if ($res->num_rows < 1) {
            echo "no data found";
        }
        function test($s){
            $ser=$_POST['name'];
   $sql="select * from studdetails where sname like '$ser'";

        $res=$conn->query($sql);

        if ($res->num_rows < 1) {
            echo "no data found";
        }
   ?>
   <table border="2">
       <tr>
           <th>Name</th>
           <th>Phone</th>
           <th>Email</th>
           <th>Sub1</th>
           <th>Sub2</th>
           <th>Sub3</th>
           <th>Sub4</th>
           <th>Sub5</th>
           <th>Total</th>
       </tr>

   
   <?php
        

        $total=mysqli_num_rows($res);

        if($total!=0){
            while($row=$res->fetch_assoc()){
                echo "
                <tr>
                <td>".$row["sname"]."</td>
                <td>".$row["Phone"]."</td>
                <td>".$row["Email"]."</td>
                <td>".$row["Marks_Subject1"]."</td>
                <td>".$row["Marks_Subject2"]."</td>
                <td>".$row["Marks_Subject3"]."</td>
                <td>".$row["Marks_Subject4"]."</td>
                <td>".$row["Marks_Subject5"]."</td>
                <td>".$row["Total"]."</td>
                </tr> ";
                
      
      
      
      
                }

        }

        }
        while($row=$res->fetch_assoc()){
            
         echo '<form action="res.php" method="post">';
         echo 'Name: <button type="submit" name="search" value="'.$row["sname"].'" class="btn-link">'.$row["sname"].'</button><br>' ;
         echo '</form>';
          
          
          


          } 
   mysqli_close($conn);

?>

</body>
</html>