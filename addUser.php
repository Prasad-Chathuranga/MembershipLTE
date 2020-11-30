<?php
session_start();
include_once 'db_conn.php';
if(isset($_POST['add']))
{	 
    // echo '<script>alert ( "Oops, something went wrong!" )</script>';
    
     $sql2 = mysqli_query($conn,"SELECT MAX(customer_id) as mem_id FROM customers;");
     $row = mysqli_fetch_assoc($sql2); 
     $max_id = $row['mem_id']; 
     $max_id = $max_id + 1;
     $txt = "MEM_";
     $membership_id = $txt . $max_id; 
    //  echo $membership_id;
  
     $first_name = $_POST['firstname'];
     $last_name = $_POST['lastname'];
     $mobile = $_POST['mobile'];
     $nic = $_POST['nic'];
     date_default_timezone_set("Asia/Tokyo");
     $date = date("Y-m-d H:i:s");

     if (empty($first_name)) {
        // header("Location: addCustomerForm.php?error=First Name is Required !");	
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        $_SESSION['customer_error'] =  "First Name is Required !";
	 
	}else if(empty($last_name)){
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        $_SESSION['customer_error'] =  "Last Name is Required !";
	    exit();
	}else if(empty($nic)){
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        $_SESSION['customer_error'] =  "NIC is Required !";
	    exit();
	}else if(empty($mobile)){
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        $_SESSION['customer_error'] =  "Mobile is Required !";
	    exit();
	}else{

	 $sql = "INSERT INTO customers (first_name,last_name,nic,mobile,membership_id,added_date)
     VALUES ('$first_name','$last_name','$mobile','$nic','$membership_id','$date')";
     
	 if (mysqli_query($conn, $sql)) {

        $_SESSION['result'] = 'Customer Saved Successfully !';
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        exit();
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
     mysqli_close($conn);
    }
}
?>