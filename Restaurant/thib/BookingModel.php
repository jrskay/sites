<?php


class BookingModel
{
	public function create(
		$userId,
		$bookingDate,
        $bookingTime,
		$numberOfSeats)
	{
    	$sql = "INSERT INTO Booking
        (
			User_Id,
			BookingDate,
			BookingTime,
			CreationTimestamp,
			NumberOfSeats
		) VALUES (?, ?, ?, NOW(), ?)";

        $database = new Database();
        $database->executeSql($sql,
		[
            $userId,
            $bookingDate,
            $bookingTime,
            $numberOfSeats
		]);

    }



}
