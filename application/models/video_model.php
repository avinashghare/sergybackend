<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Video_model extends CI_Model
{
	//video
	public function createvideo($user,$title,$description,$location,$lat,$long,$rating,$videourl,$status)
	{
		$data  = array(
			'user' => $user,
			'title' => $title,
			'description' => $description,
			'location' => $location,
			'lat' => $lat,
			'long' => $long,
			'rating' => $rating,
			'videourl' => $videourl,
			'status' => $status
		);
		$query=$this->db->insert( 'video', $data );
		
		return  1;
	}
    function viewvideo($startfrom,$totallength)
	{
		$query=$this->db->query("SELECT `video`.`id`, `video`.`user`, `video`.`title`, `video`.`description`,`video`. `location`,`video`. `lat`,`video`. `long`, `video`.`timestamp`, `video`.`rating`, `video`.`videourl`, `video`.`status`,`user`.`firstname`,`user`.`lastname` 
FROM `video`
INNER JOIN `user` ON `video`.`user`=`user`.`id` 
		ORDER BY `video`.`id` ASC LIMIT $startfrom,$totallength")->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount` FROM `video`
INNER JOIN `user` ON `video`.`user`=`user`.`id` ")->row();
        $return->totalcount=$return->totalcount->totalcount;
		return $return;
//		return $query;
	}
    
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Has Types",
			 "0" => "No Types",
			);
		return $status;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'video' )->row();
		return $query;
	}
	
	public function editvideo( $id,$user,$title,$description,$location,$lat,$long,$rating,$videourl,$status)
	{
		$data = array(
			'user' => $user,
			'title' => $title,
			'description' => $description,
			'location' => $location,
			'lat' => $lat,
			'long' => $long,
			'rating' => $rating,
			'videourl' => $videourl,
			'status' => $status
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'video', $data );
		
		return 1;
	}
	function deletevideo($id)
	{
		$query=$this->db->query("DELETE FROM `video` WHERE `id`='$id'");
		
	}
	
	public function getvideodropdown()
	{
		$query=$this->db->query("SELECT * FROM `video`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->title;
		}
		
		return $return;
	}
	
    
}
?>