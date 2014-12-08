<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Chat_model extends CI_Model
{
	//chat
	public function createchat($user)
	{
		$data  = array(
			'user' => $user
		);
		$query=$this->db->insert( 'chat', $data );
		
		return  1;
	}
	public function createchatmessage($user,$chat,$url,$imageurl,$status,$type,$json)
	{
		$data  = array(
			'user' => $user,
			'chat' => $chat,
			'url' => $url,
			'imageurl' => $imageurl,
			'status' => $status,
			'json' => $json,
			'type' => $type
		);
		$query=$this->db->insert( 'chatmessages', $data );
		
		return  1;
	}
    function viewchat($startfrom,$totallength)
	{
		$query=$this->db->query("SELECT `chat`.`id`,`chat`.`name` FROM `chat` 
		ORDER BY `chat`.`id` ASC LIMIT $startfrom,$totallength")->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount`  FROM `chat`  ")->row();
        $return->totalcount=$return->totalcount->totalcount;
		return $return;
	}
    function viewchatmessage($id)
	{
        $query=$this->db->query("SELECT `chatmessages`.`id`, `chatmessages`.`chat`, `chatmessages`.`user`, `chatmessages`.`timestamp`, `chatmessages`.`type`, `chatmessages`.`url`, `chatmessages`.`imageurl`, `chatmessages`.`status`, `chatmessages`.`json` ,`user`.`name` AS `username`
        FROM `chatmessages`
        LEFT OUTER JOIN `user` ON `chatmessages`.`user`=`user`.`id`
        WHERE `chatmessages`.`chat`='$id'")->result();
        
		return $query;
	}
    
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Has Types",
			 "0" => "No Types",
			);
		return $status;
	}
	public function beforeeditchat( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'chat' )->row();
		return $query;
	}
	public function beforeeditchatmessage( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'chatmessages' )->row();
		return $query;
	}
	
	public function editchat( $id,$name)
	{
		$data = array(
			'user' => $user
		
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'chat', $data );
		
		return 1;
	}
	public function editchatmessage($id,$user,$chat,$url,$imageurl,$status,$type,$json)
	{
		$data = array(
			'user' => $user,
			'chat' => $chat,
			'url' => $url,
			'imageurl' => $imageurl,
			'status' => $status,
			'json' => $json,
			'type' => $type
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'chatmessages', $data );
		
		return 1;
	}
	function deletechat($id)
	{
		$query=$this->db->query("DELETE FROM `chat` WHERE `id`='$id'");
		
	}
	function deletechatmessage($id)
	{
		$query=$this->db->query("DELETE FROM `chatmessages` WHERE `id`='$id'");
		
	}
	
    
    //rest api functions
    
	public function getchatdropdown()
	{
		$query=$this->db->query("SELECT * FROM `chat`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	public function addchat($json,$user,$type,$url,$imageurl,$status)
    {
        
        $data  = array(
			'user' => $this->session->userdata('id'),
			'chat' => $json,
			'url' => $url,
			'imageurl' => $imageurl,
			'status' => $status,
			'json' => $json,
			'type' => $type
		);
		$query=$this->db->insert( 'chatmessages', $data );
		$updatequery=$this->db->query("UPDATE `user` SET `status`=3 WHERE `id`='$user'");
    return 1;
    }
    
}
?>