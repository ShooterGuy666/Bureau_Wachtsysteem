<?php
//update
// including the database connection file
include_once("connect.php");

if(isset($_GET['update']))
{	
    $id = mysqli_real_escape_string($conn, $_GET['id']);

	$group = mysqli_real_escape_string($conn, $_GET['group_update']);

	
	
	// checking empty fields
	if(empty($group) )
	{

        if(empty($group)) {
            echo "<font color='red'>Group is empty.</font><br/>";
        }

      
       


    } else {
        //updating the table
        $time = time();
        $sql2 = "UPDATE groups SET 
        group_name= '$group',
        time= '$time'
        WHERE id=$id
        ";
        
		$result = mysqli_query($conn, $sql2);
      //echo $sql2;
        header("Location: edit.php");
    }
}
?>



<?php


$sq11 = "SELECT * FROM groups";
var_dump($sq11);




$result = mysqli_query($conn, $sq11);

while($res = mysqli_fetch_array($result))
{
    
    $id = $res['id'];
    $name_group = $res['group_name'];
   
}
//delete
if(isset($_GET['delete']))
{
 
    //including the database connection file
    include("connect.php");
    
    //getting id of the data from url
    $id = $_GET['delete'];
    
    //deleting the row from table
    $result = mysqli_query($conn, "DELETE FROM groups WHERE id=$id");
    
    //redirecting to the display page (index.php in our case)
    header("Location:edit.php");

    
    

}

// including the database connection file
include("connect.php");

//CREATE
if(isset($_POST['create']))
{	
    $time = mysqli_real_escape_string($conn, $_POST['time']);

	$group = mysqli_real_escape_string($conn, $_POST['group']);
    echo $time;
	
	
	// checking empty fields
	if(empty($group) || empty($time) )
	{

        if(empty($group)) {
            echo "<font color='red'>Group is empty.</font><br/>";
        }
        if(empty($time)) {
            echo "<font color='red'>Group is empty.</font><br/>";
        }

      
       


    } else {
        //updating the table
        $sql2 = "INSERT INTO 
        groups ( `group_name`, `time`) 
        VALUES ( '$group', '$time' )";
        
		$result = mysqli_query($conn, $sql2);
      //echo $sql2;
        // header("Location: edit.php");
        echo "update";
    }
}

?>
<html>
<head>
    <title>Edit Book </title>
</head>

<body>
    <a href="home.php">Home</a>
    <br/><br/>
    <!-- Update -->
    <form name="form1" method="GET" >
        <table border="0">
            <tr> 
                <td>group name</td>
                <p><?php echo $name_group;?></p>
                <td><input type="text" name="group_update" value="<?php echo $name_group;?>"></td>
            </tr>
            
            
            <tr>
                <td><input type="text" name="id" value=<?php echo $id;?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>

    <!-- END UPDATE -->


    <!-- delete -->
    <form method="GET" >
        <button type="submit" name="delete" value="<?php echo $id;?> ">delete</button>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- END DELETE -->

    <!-- create -->
    <form  method="POST">
        <table border="0">
            <tr> 
                <td>group name</td>
                <td><input type="text" name="group" ></td>
                <td>time</td>

                <td><input type="datetime-local" name="time" ></td>

            </tr>
            
            
            <tr>
                <td><input type="submit" name="create" value="Create"></td>
            </tr>
            <br>
            <br>
            <br>
            <br>
            <br>
        </table>
    </form>
    <!-- END CREATE -->
</body>
</html>
