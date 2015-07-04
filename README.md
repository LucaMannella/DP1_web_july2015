# dp_web_lug2015
This repository contains my exam assignment for Distributed Programming I

$i = 0;
while($row!=NULL) {
	$actID = $row['id'];
	echo "<form id='activity$i' action='./personalPage.php' method='post'>";
		echo "<TABLE><TR><TH><h7>".$row['name']."</h7></TH><TH><input name='id' value='$actID' type='text' readonly style='display:none'/></TH>";
		echo "<TR><TD> Number of available place: <span id='av$i' class='green'>".$row['availability']."</span> <br>";
		echo "Total places for the activity: <span id='place$i' class='cyan'>".$row['places']."</span> </TD>";
		echo "<TD style='padding-left: 25px;'>";	dropDownMenu(('menu'), 0, 3);
		echo "<input class='button' id='reserve$i' type='submit' value='Reserve' style='margin-left: 20px;' onclick='return checkAvailability($i);'/></TD></TR>";	
	echo "</TABLE></form>";
	$row = mysqli_fetch_array($res);
	$i++;
}