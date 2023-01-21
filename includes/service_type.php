<?php
// ====================================================
// ====================================================
// ======================= Start ServiceType Part ===========

class ServiceType
{
	public $id;
	public $name;

	function __construct($row)
	{
		$this->setData($row);
	}
	
	function setData($row)
	{
		if(is_array($row))
		{
			$this->id = $row[0];
			$this->name = $row[1];
		}
	}

}

function getAllServiceTypes()
{
	return selectAndOrder("select * from service_type","id","desc");
}

function getServiceTypeById($id)
{
	return selectById("*","service_type", $id);
}

function getServiceTypeByName($search)
{
	return select("SELECT * FROM service_type WHERE name like '%$search%' and active = 1");
}

function addServiceType( $name)
{
    $sql = 
		"INSERT INTO service_type VALUES(null,
'$name')";	return query($sql);
}

function updateServiceType( $id, $name)
{
    $sql = 
		"UPDATE service_type SET 
		name = '$name'
		WHERE id = $id ";
    return query($sql);
}

function deleteServiceType($id)
{   
     return query("DELETE FROM service_type WHERE id = $id");
}
?>


