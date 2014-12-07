<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Transcript_model extends CI_Model
{
	//transcript
	public function createtranscript($name,$text,$url,$image,$json,$category)
	{
		$data  = array(
			'name' => $name,
			'text' => $text,
			'url' => $url,
			'json' => $json,
			'image' => $image
		);
//        print_r($category);
		$query=$this->db->insert( 'transcript', $data );
		$transcriptid=$this->db->insert_id();
        foreach($category AS $key=>$value)
        {
            $this->transcript_model->createtranscriptcategory($value,$transcriptid);
//            $transcriptcategoryquery=$this->db->query("INSERT INTO `transcriptcategory`(`transcriptid`, `categoryid`) VALUES ('$transcriptid',$value)");
        }
		return  1;
	}
     public function getcategorybytranscript($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`transcriptid`,`categoryid` FROM `transcriptcategory`  WHERE `transcriptid`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->categoryid;
            }
        }
         return $return;
         
		
	}
    public function createtranscriptcategory($value,$transcriptid)
	{
		$data  = array(
			'categoryid' => $value,
			'transcriptid' => $transcriptid
		);
		$query=$this->db->insert( 'transcriptcategory', $data );
		return  1;
	}
    function viewtranscript($startfrom,$totallength)
	{
		$query=$this->db->query("SELECT `transcript`.`id`,`transcript`.`name` FROM `transcript` 
		ORDER BY `transcript`.`id` ASC LIMIT $startfrom,$totallength")->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount`  FROM `transcript`  ")->row();
        $return->totalcount=$return->totalcount->totalcount;
		return $return;
	}
    
	public function gettranscriptimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `transcript` WHERE `id`='$id'")->row();
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
	public function beforeedittranscript( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'transcript' )->row();
		return $query;
	}
	
	public function edittranscript($id,$name,$text,$url,$image,$json,$category)
	{
		$data = array(
			'name' => $name,
			'text' => $text,
			'url' => $url,
			'json' => $json,
			'image' => $image
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'transcript', $data );
        $querydelete=$this->db->query("DELETE FROM `transcriptcategory` WHERE `transcriptid`='$id'");
        foreach($category AS $key=>$value)
        {
            $this->transcript_model->createtranscriptcategory($value,$id);
//            $transcriptcategoryquery=$this->db->query("INSERT INTO `transcriptcategory`(`transcriptid`, `categoryid`) VALUES ('$transcriptid',$value)");
        }
		
		return 1;
	}
	function deletetranscript($id)
	{
		$query=$this->db->query("DELETE FROM `transcript` WHERE `id`='$id'");
		
	}
	
	public function gettranscriptdropdown()
	{
		$query=$this->db->query("SELECT * FROM `transcript`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	
    //rest api functions
    
	public function addtranscript($name,$text,$json,$url,$image)
    {
        $data  = array(
			'name' => $name,
			'text' => $text,
			'url' => $url,
			'json' => $json,
			'image' => $image
		);
		$query=$this->db->insert( 'transcript', $data );
        if(!$query)
			return  0;
		else
			return  1;
    }
    
}
?>