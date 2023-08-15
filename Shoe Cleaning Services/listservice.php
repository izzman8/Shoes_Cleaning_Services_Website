<?php
session_start(); 
include "database.php";

class checkboxlist{
	public function sublist()
	{
        $type_cl = $_SESSION['type_cl'];
        $sql = "select type_cl from service";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        if (mysqli_num_rows($result) === 1) {
            echo'
			    <div class="divp35"><input type="checkbox" name="chk1[]" value=$type_cl['type_cl']><span>$type_cl['type_cl']</span></div>';
	    }else{
            echo "error"
        }
    }
}
?>