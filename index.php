<?php
  
  $connect=mysqli_connect("localhost","root","","fake");
  $filename="valid.json";

  $data=file_get_contents($filename);
  $array=json_decode($data,true);

  foreach((array)$array as $array)
  {
  	$sql="INSERT INTO name(name) VALUES('".$array["name"]."')";

  	mysqli_query($connect,$sql);
  }
 
  
  if(isset($_POST['name']))
{
 
    $dbhandle=mysqli_connect("localhost","root","","fake");
    $name = mysqli_real_escape_string($dbhandle, $_POST['name']);
 
    $query = "SELECT name FROM name WHERE name = '$name'";
    $result = mysqli_query($dbhandle, $query);
 
    if(mysqli_num_rows($result) > 0)
    {
       
        echo '<b>'.$name.'</b> seems like a fake name';
    }
    else
    {
       
        echo '<b>'.$name.'</b> seems like a real name';
    }
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="index.php" method="POST">
		<p>Name:</p><input type="text" name="name"/>
		<br/>
		<input type="submit" value="submit"/>
	</form>

</body>
</html>