<?php
include("auth.php"); 
require('db.php');
$result = mysqli_query($con, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<style>
    #myInput {
    background-image: url('/css/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
  }
  
  #myTable {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ddd;
    font-size: 18px;
  }
  
  #myTable th, #myTable td {
    text-align: left;
    padding: 12px;
  }
  
  #myTable tr {
    border-bottom: 1px solid #ddd;
  }
  
  #myTable tr.header, #myTable tr:hover {
    background-color: #f1f1f1;
  }
    </style>
</head>
<body>
<h2 style="color:red;">Welcome <?php echo $_SESSION['username']; ?><h2>
<table id="myTable">
<tr class="header">
    <th style="width:33%;">Username</th>
    <th style="width:33%;">Email</th>
    <th style="width:33%;">Password</th>
  </tr>
<?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {  
?>		
            <tr>
           <td><?php echo $res['username']; ?></td>
           <td> <?php echo $res['email']; ?></td>
           <td> <?php echo $res['password']; ?></td>
			</tr>     
       <?php
	   }
        ?>
		</table>
        <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<br></br>
<a href="logout.php">Logout</a>


</body>
</html>
