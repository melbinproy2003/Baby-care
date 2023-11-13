<?php
session_start();
//submit_rating.php
include("../Connection/Connection.php");

if(isset($_POST["rating_data"]))
{

	$ins = "INSERT INTO tbl_userfeedbacktoshop(user_id,feedback_count,feedback_review,feedback_date,product_id)VALUES('".$_SESSION["user_id"]."','".$_POST["rating_data"]."','".$_POST["user_review"]."',NOW(),'".$_POST["tool_id"]."')";
	
	if($con->query($ins))
{
	echo "Your Review & Rating Successfully Submitted";
}
else
{
	echo "Your Review & Rating Insertion Failed";
}

}

if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM tbl_userfeedbacktoshop where product_id = '".$_POST["tid"]."' ORDER BY feedback_id  DESC
	";

	$result = $con->query($query);

	while($row = $result->fetch_assoc())
	{
		$review_content[] = array(
			'user_id'		=>	$row["user_id"],
			'user_review'	=>	$row["feedback_review"],
			'rating'		=>	$row["feedback_count"],
			'datetime'		=>	$row["feedback_date"]
		);

		if($row["feedback_count"] == '5')
		{
			$five_star_review++;
		}

		if($row["feedback_count"] == '4')
		{
			$four_star_review++;
		}

		if($row["feedback_count"] == '3')
		{
			$three_star_review++;
		}

		if($row["feedback_count"] == '2')
		{
			$two_star_review++;
		}

		if($row["feedback_count"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["feedback_count"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>