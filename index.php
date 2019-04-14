<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="jsmain.js"></script>
    <link rel="shortcut icon" type="image/png" href="icon.png"/>
    <title>Bios</title>
    
    <script language="javascript">
        function submitBio(){
            let name = document.getElementById('name').value.toString();
            let lastName = document.getElementById('last_name').value.toString();
            let address = document.getElementById('address').value.toString();

            if(!name){ 
                alert("Please enter name!");
                return false;
            }
            if(!lastName){ 
                alert("Please enter last name!");
                return false;
            }
            if(!address){ 
                alert("Please enter address!");
                return false;
            }
            
            return true;
        }
		
		function updateQuery(){
			let name = document.getElementById('name');
            let lastname = document.getElementById('last_name');
            let address = document.getElementById('address');
			let query = document.getElementById('current_query');
			
            let queryStr = "INSERT INTO bios (name, last_name, address) VALUES ('" + name.value + "', '" + lastname.value + "', '" + address.value + "')";
            query.innerHTML = queryStr;
		}
    </script>
</head>

<?php
$host="localhost";
$user="root";
$pass="";
$dbname="bios";

$conn=mysqli_connect($host, $user, $pass, $dbname);
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}
?>

<?php
if(!empty($_POST['register'])){
    $sql = "INSERT INTO bios (name, last_name, address) VALUES "
            . "('{$_POST['name']}', '{$_POST['last_name']}', '{$_POST['address']}')";
    if($conn->multi_query($sql)){
        echo '<div style="color: green; font-weight: bold; margin-bottom: 30px;">Bio inserted successfuly!</div>';
    }
    else echo '<div style="color: red; font-weight: bold; margin-bottom: 30px;">Something went wrong!</div>';
}
?>

<form method="post" class="forms">
    <p style="font-weight: 900; margin: 8px;">Register Form</p>
    <b>Name: </b>
    <input type="text" name="name" id="name" onkeyup="updateQuery();" onchange="updateQuery();">
    <br>        
    <b>Last Name: </b>
    <input type="text" name="last_name" id="last_name" onkeyup="updateQuery();" onchange="updateQuery();">
    <br>
    <b>Address: </b>
    <input type="text" name="address" id="address" onkeyup="updateQuery();" onchange="updateQuery();">
    <br><br>
    <input type="submit" value="Register" name="register" onclick="return submitBio();">
</form>

<span style="font-size: 22px;" id="current_query">INSERT INTO bios (name, last_name, address) VALUES ('', '', '')</span>

<?php
$sql = "SELECT * FROM bios";
$result = $conn->query($sql);
$bios = Array();
if($result){
    $index=0;
    while ($row = mysqli_fetch_array($result)) $bios[$index++] = $row;
}
$conn->close();
?>

<div class="tables_panel">
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Address</th>
        </tr>
        <?php foreach($bios as $bio){ ?>
            <tr>
                <td><?php echo $bio['name']; ?></td>
                <td><?php echo $bio['last_name']; ?></td>
                <td><?php echo $bio['address']; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

<div style="margin-top: 50px;">
<span><a href="screen.png" style="text-decoration: none; color: Crimson;" target="_blank">Screen1</a></span>
<span> | </span>
<span><a href="screen2.png" style="text-decoration: none; color: Crimson;" target="_blank">Screen2</a></span>
</div>





