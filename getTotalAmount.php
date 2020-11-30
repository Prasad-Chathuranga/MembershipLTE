<?php
session_start();
include_once 'db_conn.php';
if(isset($_POST['get_amount']))
{	 
      
    $membership_id = $_POST['mem_id'];

    if(empty($membership_id))
    {
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        $_SESSION['total_error'] =  "Membership ID is Required !";
	    exit();
    }

    


        $sql = "SELECT membership_id,customer_name,SUM(amount) as amount FROM submissions WHERE membership_id = '$membership_id' GROUP BY membership_id;";
        $query_result = mysqli_query($conn,$sql);
        
        
        while ($row = mysqli_fetch_assoc($query_result)) {
           $_SESSION['customer'] = $row['customer_name'];
           $_SESSION['total_amount'] = $row['amount'];
           $_SESSION['member'] = $row['membership_id'];
         }
  
      

	
	 if (mysqli_query($conn, $sql)) {
        
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        exit();
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
     mysqli_close($conn);
    
}
?>