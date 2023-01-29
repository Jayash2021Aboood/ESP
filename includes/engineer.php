<?php
// ====================================================
// ====================================================
// ======================= Start Engineer Part ===========

class Engineer
{
	public $id;
	public $first_name;
	public $last_name;
	public $email;
	public $password;
	public $specialty;
	public $cv;
	public $date_of_birth;
	public $phone;
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
			$this->specialty = $row[5];
			$this->cv = $row[6];
			$this->date_of_birth = $row[7];
			$this->phone = $row[8];
			$this->state = $row[9];
		}
	}

}

function getAllEngineers()
{
	return selectAndOrder("select * from engineer","id","desc");
}

function getEngineerById($id)
{
	return selectById("*","engineer", $id);
}

function getEngineerByName($search)
{
	return select("SELECT * FROM engineer WHERE name like '%$search%' and active = 1");
}

function addEngineer( $first_name, $last_name, $email, $password, $specialty, $cv, $date_of_birth, $phone, $state)
{
    $sql = 
		"INSERT INTO engineer VALUES(null,
'$first_name','$last_name','$email','$password','$specialty','$cv','$date_of_birth','$phone','$state')";	return query($sql);
}

function updateEngineer( $id, $first_name, $last_name, $email, $password, $specialty, $cv, $date_of_birth, $phone, $state)
{
    $sql = 
		"UPDATE engineer SET 
		first_name = '$first_name'
,		last_name = '$last_name'
,		email = '$email'
,		password = '$password'
,		specialty = '$specialty'
,		cv = '$cv'
,		date_of_birth = '$date_of_birth'
,		phone = '$phone'
,		state = '$state'
		WHERE id = $id ";
    return query($sql);
}

function deleteEngineer($id)
{   
     return query("DELETE FROM engineer WHERE id = $id");
}
?>