<?php
session_start();
include_once 'db_conn.php';
if(isset($_POST['add_submission']))
{	
    $membership_id = $_POST['mem_id'];
    $amount = $_POST['amount'];
    date_default_timezone_set("Asia/Tokyo");
    $date = date("Y-m-d H:i:s");

    if(empty($membership_id)) {
        // header("Location: addCustomerForm.php?error=First Name is Required !");	
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        $_SESSION['submission_error'] =  "Membership ID is Required ! [ Find it From All Customers Table ]";
        exit();
	}else if(empty($amount)) {
        // header("Location: addCustomerForm.php?error=First Name is Required !");	
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        $_SESSION['submission_error'] =  "Amount is Required !";
        exit();
	}else{

         
    $customer_name_sql = mysqli_query($conn,"SELECT first_name FROM customers WHERE membership_id = '$membership_id';");
    $row = mysqli_fetch_assoc($customer_name_sql); 
    $customer_name = $row['first_name']; 

    $sub_count_sql = mysqli_query($conn,"SELECT MAX(submission_count) as submission_count FROM submissions WHERE membership_id = '$membership_id';");
    $row_sub = mysqli_fetch_assoc($sub_count_sql); 
    $max_id = $row_sub['submission_count']; 
    $count = $max_id + 1 ; 
      
       
	 $sql = "INSERT INTO submissions(membership_id, customer_name,amount,submitted_date, submission_count)
     VALUES ('$membership_id','$customer_name','$amount','$date','$count')";
     
	 if (mysqli_query($conn, $sql)) {

        $_SESSION['submission_result'] = 'Submission Saved Successfully !';
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