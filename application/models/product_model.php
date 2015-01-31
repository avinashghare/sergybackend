<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Product_model extends CI_Model
{
	//product
	public function createproduct($name,$type,$url,$price,$json,$usergenerated,$productattributejson,$details,$image,$category)
	{
		$data  = array(
			'name' => $name,
			'type' => $type,
			'url' => $url,
			'price' => $price,
			'json' => $json,
			'usergenerated' => $usergenerated,
			'productattributejson' => $productattributejson,
			'details' => $details,
			'image' => $image
		);
		$query=$this->db->insert( 'product', $data );
		$productid=$this->db->insert_id();
        foreach($category AS $key=>$value)
        {
            $this->product_model->createproductcategory($value,$productid);
//            $productcategoryquery=$this->db->query("INSERT INTO `productcategory`(`productid`, `categoryid`) VALUES ('$productid',$value)");
        }
		return  1;
	}
    
     public function adduserproduct($productid,$user,$json)
    {
        $data  = array(
			'productid' => $productid,
			'user' => $user,
            'json' => $json
		);
		$query=$this->db->insert( 'userproduct', $data );
        
		return  1;
    }
    
    
    public function createproductcategory($value,$productid)
	{
		$data  = array(
			'categoryid' => $value,
			'productid' => $productid
		);
		$query=$this->db->insert( 'productcategory', $data );
		return  1;
	}
    
     public function getcategorybyproduct($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`productid`,`categoryid` FROM `productcategory`  WHERE `productid`='$id'");
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
    
	public function getproductimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `product` WHERE `id`='$id'")->row();
		return $query;
	}
    
//     public function getcategorybyproduct($id)
//	{
//         $return=array();
//		$query=$this->db->query("SELECT `id`,`productid`,`categoryid` FROM `productcategory`  WHERE `productid`='$id'");
//        if($query->num_rows() > 0)
//        {
//            $query=$query->result();
//            foreach($query as $row)
//            {
//                $return[]=$row->categoryid;
//            }
//        }
//         return $return;
//         
//		
//	}
    function viewproduct($startfrom,$totallength)
	{
		$query=$this->db->query("SELECT `product`.`id`,`product`.`name` FROM `product` 
		ORDER BY `product`.`id` ASC LIMIT $startfrom,$totallength")->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount`  FROM `product`  ")->row();
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
	public function beforeeditproduct( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'product' )->row();
		return $query;
	}
	
	public function editproduct($id,$name,$type,$url,$price,$json,$usergenerated,$productattributejson,$details,$image,$category)
	{
		$data = array(
			'name' => $name,
			'type' => $type,
			'url' => $url,
			'price' => $price,
			'json' => $json,
			'usergenerated' => $usergenerated,
			'productattributejson' => $productattributejson,
			'details' => $details,
			'image' => $image
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'product', $data );
        $querydelete=$this->db->query("DELETE FROM `productcategory` WHERE `productid`='$id'");
        foreach($category AS $key=>$value)
        {
            $this->product_model->createproductcategory($value,$id);
//            $productcategoryquery=$this->db->query("INSERT INTO `productcategory`(`productid`, `categoryid`) VALUES ('$productid',$value)");
        }
		
		
		return 1;
	}
	function deleteproduct($id)
	{
		$query=$this->db->query("DELETE FROM `product` WHERE `id`='$id'");
		
	}
	
	public function getproductdropdown()
	{
		$query=$this->db->query("SELECT * FROM `product`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	
    //frontend api functions
    
    public function addproduct($name,$type,$url,$price,$json,$usergenerated,$productattributejson,$details,$image,$category)
    {
        $data  = array(
			'name' => $name,
			'type' => $type,
			'url' => $url,
			'price' => $price,
			'json' => $json,
			'usergenerated' => $usergenerated,
			'productattributejson' => $productattributejson,
			'details' => $details,
			'image' => $image
		);
		$query=$this->db->insert( 'product', $data );
        $productid=$this->db->insert_id();
        $category= explode(",", $category);
        foreach($category as $value)
        {
            $this->product_model->createproductcategory($value,$productid);
        }
        if(!$query)
            return 0;
        else
            return 1;
    }
    
    public function getproductbyid($id)
    {
        $data['product']=$this->db->query("SELECT `id`, `name`, `type`, `url`, `price`, `json`, `image`, `usergenerated`, `productattributejson`, `details`, `timestamp` 
        FROM `product`
        WHERE `id`='$id'")->row();
        
        $data['productcategory']=$this->db->query("SELECT `productcategory`.`id`, `productcategory`.`productid`, `productcategory`.`categoryid`,`category`.`name` AS `categoryname` 
        FROM `productcategory`
        LEFT OUTER JOIN `category` ON `productcategory`.`categoryid`=`category`.`id`
        WHERE `productcategory`.`productid`='$id'")->result();
    
        return $data;
    }
    
}
?>