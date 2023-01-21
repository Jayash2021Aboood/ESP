<?php
// ====================================================
// ====================================================
// ======================= Start Booking Part ===========

class Booking
{
	public $id;
	public $engineer_id;
	public $service_id;
	public $customer_id;
	public $detail;
	public $end_date;
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
			$this->engineer_id = $row[1];
			$this->service_id = $row[2];
			$this->customer_id = $row[3];
			$this->detail = $row[4];
			$this->end_date = $row[5];
			$this->state = $row[6];
		}
	}

}

function getAllBookings()
{
	return selectAndOrder("select * from booking","id","desc");
}

function getBookingById($id)
{
	return selectById("*","booking", $id);
}

function getBookingByName($search)
{
	return select("SELECT * FROM booking WHERE name like '%$search%' and active = 1");
}

function addBooking( $engineer_id, $service_id, $customer_id, $detail, $end_date, $state)
{
    $sql = 
		"INSERT INTO booking VALUES(null,
$engineer_id,$service_id,$customer_id,'$detail','$end_date','$state')";	return query($sql);
}

function updateBooking( $id, $engineer_id, $service_id, $customer_id, $detail, $end_date, $state)
{
    $sql = 
		"UPDATE booking SET 
		engineer_id = $engineer_id
,		service_id = $service_id
,		customer_id = $customer_id
,		detail = '$detail'
,		end_date = '$end_date'
,		state = '$state'
		WHERE id = $id ";
    return query($sql);
}

function deleteBooking($id)
{   
     return query("DELETE FROM booking WHERE id = $id");
}
?>


