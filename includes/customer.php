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

function addCustomer( $first_name, $last_name, $email, $password)
{
    $sql = 
		"INSERT INTO customer VALUES(null,
'$first_name','$last_name','$email','$password')";	return query($sql);
}

function updateCustomer( $id, $first_name, $last_name, $email, $password)
{
    $sql = 
		"UPDATE customer SET 
		first_name = '$first_name'
,		last_name = '$last_name'
,		email = '$email'
,		password = '$password'
		WHERE id = $id ";
    return query($sql);
}

function deleteCustomer($id)
{   
     return query("DELETE FROM customer WHERE id = $id");
}
?>


