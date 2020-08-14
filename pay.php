<?php

$username=$_POST['username'];
$email=$_POST['email'];
$pnumber=$_POST['PhoneNumber'];
$amount=$_POST['amount'];
$purpose='donation';

include 'Instamojo.php';

$api = new Instamojo\Instamojo('test_27d3f205e64d8fe617484f2c684', 'test_8e6b9391a9db53efb09b6412ebf', 'https://test.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $amount,
        "send_email" => true,
        "email" => $email,
		"phone" => $pnumber,
		"allow_repeated_payments" => false,
        "redirect_url" => "https://gogiving.000webhostapp.com/thankyou.php"
        ));
		$pay_url=$response['longurl'];
        header("location:$pay_url");
	}
	catch (Exception $e) {
		print('Error: ' . $e->getMessage());
	}
?>