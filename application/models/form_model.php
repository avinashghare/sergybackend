<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Form_model extends CI_Model
{
	//form
	public function createform($name,$json,$category)
	{
		$data  = array(
			'name' => $name,
			'json' => $json
		);
		$query=$this->db->insert( 'form', $data );
		$formid=$this->db->insert_id();
        foreach($category AS $key=>$value)
        {
            $this->form_model->createformcategory($value,$formid);
//            $transcriptcategoryquery=$this->db->query("INSERT INTO `transcriptcategory`(`transcriptid`, `categoryid`) VALUES ('$transcriptid',$value)");
        }
		return  1;
	}
    
    public function adduserform($formid,$user,$json,$chatjson,$id)
    {
        $data  = array(
			'formid' => $formid,
			'user' => $user,
            'json' => $json
		);
        $data1  = array(
            'json' => $chatjson
		);
		$query=$this->db->insert( 'userform', $data );
        
        echo $chatjson;
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'chatmessages', $data1 );
		return  1;
    }
    
    
    public function createformcategory($value,$formid)
	{
		$data  = array(
			'categoryid' => $value,
			'formid' => $formid
		);
		$query=$this->db->insert( 'formcategory', $data );
		return  1;
	}
    
     public function getcategorybyform($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`formid`,`categoryid` FROM `formcategory`  WHERE `formid`='$id'");
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
    function viewform($startfrom,$totallength)
	{
		$query=$this->db->query("SELECT `form`.`id`,`form`.`name` FROM `form` 
		ORDER BY `form`.`id` ASC LIMIT $startfrom,$totallength")->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount`  FROM `form`  ")->row();
        $return->totalcount=$return->totalcount->totalcount;
		return $return;
	}
    
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Has Types",
			 "0" => "No Types",
			);
		return $status;
	}
	public function beforeeditform( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'form' )->row();
		return $query;
	}
	
	public function editform($id,$name,$json,$category)
	{
		$data = array(
			'name' => $name,
			'json' => $json
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'form', $data );
        $querydelete=$this->db->query("DELETE FROM `formcategory` WHERE `formid`='$id'");
        foreach($category AS $key=>$value)
        {
            $this->form_model->createformcategory($value,$id);
//            $formcategoryquery=$this->db->query("INSERT INTO `formcategory`(`formid`, `categoryid`) VALUES ('$formid',$value)");
        }
		
		
		return 1;
	}
	function deleteform($id)
	{
		$query=$this->db->query("DELETE FROM `form` WHERE `id`='$id'");
		
	}
	
	public function getformdropdown()
	{
		$query=$this->db->query("SELECT * FROM `form`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	
    //frontend api functions
    
	public function addform($name,$json,$category)
    {
        $data  = array(
			'name' => $name,
			'json' => $json
		);
		$query=$this->db->insert( 'form', $data );
        $formid=$this->db->insert_id();
        $category= explode(",", $category);
        foreach($category as $value)
        {
            $this->form_model->createformcategory($value,$formid);
        }
    
        if(!$query)
			return  0;
		else
			return  1;
    }
    
    
}
?>