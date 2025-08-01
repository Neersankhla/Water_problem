<?php
	$YourName  = $_POST['YourName'];
	$email = $_POST['email'];
	$Phone = $_POST['Phone'];
        $BillId = $_POST['BillId'];
        $NoOfUnitsConsumed = $_POST['NoOfUnitsConsumed'];
        $BillAmount = $_POST['BillAmount'];
	$NoOfFamilyMembers = $_POST['NoOfFamilyMembers'];

	$conn = new mysqli('localhost','root','','test');

	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO registration(YourName, email, Phone, BillId,NoOfUnitsConsumed , BillAmount,NoOfFamilyMembers ) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssisiii", $YourName, $email, $Phone, $BillId, $NoOfUnitsConsumed , $BillAmount, $NoOfFamilyMembers );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registered Successfully...";
		$stmt->close();
		$conn->close();
	}
?>
