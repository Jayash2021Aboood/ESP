<?php
// ====================================================
// ====================================================
// ======================= Start Customer Part ===========

class Customer
{
	public $id;
	public $first_name;
	public $last_name;
	public $email;
	public $password;
	public $phone;
	public $card_number;
	public $state;

	function __construct($row)
	{
		$this->setData($row);
	}
	
	function setData($row)
	{
		if(is_array($row))
		{
			$this->id = $row[0];
			$this->first_name = $row[1];
			$this->last_name = $row[2];
			$this->email = $row[3];
			$this->password = $row[4];
			$this->phone = $row[5];
			$this->card_number = $row[6];
			$this->state = $row[7];
		}
	}

}

function getAllCustomers()
{
	return selectAndOrder("select * from customer","id","desc");
}

function getCustomerById($id)
{
	return selectById("*","customer", $id);
}

function getCustomerByName($search)
{
	return select("SELECT * FROM customer WHERE name like '%$search%' and active = 1");
}

function addCustomer( $first_name, $last_name, $email, $password, $phone, $card_number, $state)
{
    $sql = 
		"INSERT INTO customer VALUES(null,
'$first_name','$last_name','$email','$password','$phone','$card_number','$state')";	return query($sql);
}

function updateCustomer( $id, $first_name, $last_name, $email, $password, $phone, $card_number, $state)
{
    $sql = 
		"UPDATE customer SET 
		first_name = '$first_name'
,		last_name = '$last_name'
,		email = '$email'
,		password = '$password'
,		phone = '$phone'
,		card_number = '$card_number'
,		state = '$state'
		WHERE id = $id ";
    return query($sql);
}

function deleteCustomer($id)
{   
     return query("DELETE FROM customer WHERE id = $id");
}
?>


