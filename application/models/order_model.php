<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class order_model extends CI_Model
{
	//order
	public function createorder($name,$user,$address1,$address2,$city,$state,$pincode,$email,$contactno,$country,$shippingaddress1,$shippingaddress2,$shipcity,$shipstate,$shippingcode,$shipcountry,$trackingcode,$shippingcharge,$shippingmethod,$status)
	{
		$data  = array(
			'name' => $name,
			'user' => $user,
			'address1' => $address1,
			'address2' => $address2,
			'city' => $city,
			'state' => $state,
			'pincode' => $pincode,
			'email' => $email,
			'contactno' => $contactno,
			'country' => $country,
			'shipaddress1' => $shippingaddress1,
			'shipaddress2' => $shippingaddress2,
			'shipcity' => $shipcity,
			'shipstate' => $shipstate,
			'shippingcode' => $shippingcode,
			'shipcountry' => $shipcountry,
			'trackingcode' => $trackingcode,
			'shippingcharge' => $shippingcharge,
			'shippingmethod' => $shippingmethod,
			'status' => $status
		);
		$query=$this->db->insert( 'order', $data );
		$orderid=$this->db->insert_id();
        
		return  1;
	}
	
	public function createorderitem($product,$orderid)
	{
//        echo $orderid;
//        echo $product;
        $productdetails=$this->db->query("SELECT * FROM `product` WHERE `id`='$product'")->row();
//        print_r($productdetails);
        $name=$productdetails->name;
        $type=$productdetails->type;
        $url=$productdetails->url;
        $price=$productdetails->price;
        $json=$productdetails->json;
        $image=$productdetails->image;
        $usergenerated=$productdetails->usergenerated;
        $productattributejson=$productdetails->productattributejson;
        $details=$productdetails->details;
		$data  = array(
			'product' => $product,
			'name' => $name,
			'type' => $type,
			'url' => $url,
			'price' => $price,
			'json' => $json,
			'image' => $image,
			'usergenerated' => $usergenerated,
			'productattributejson' => $productattributejson,
			'details' => $details,
			'orderid' => $orderid
		);
		$query=$this->db->insert( 'orderitem', $data );
		$orderid=$this->db->insert_id();
		return  1;
	}
    
    public function createordercategory($value,$orderid)
	{
		$data  = array(
			'categoryid' => $value,
			'orderid' => $orderid
		);
		$query=$this->db->insert( 'ordercategory', $data );
		return  1;
	}
    
     public function getcategorybyorder($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`orderid`,`categoryid` FROM `ordercategory`  WHERE `orderid`='$id'");
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
    function vieworder($startfrom,$totallength)
	{
		$query=$this->db->query("SELECT `order`.`id`,`order`.`name` FROM `order` 
		ORDER BY `order`.`id` ASC LIMIT $startfrom,$totallength")->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount`  FROM `order`  ")->row();
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
	public function beforeeditorder( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'order' )->row();
		return $query;
	}
	public function beforeeditorderitem( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'orderitem' )->row();
		return $query;
	}
	
	public function editorder($id,$name,$user,$address1,$address2,$city,$state,$pincode,$email,$contactno,$country,$shippingaddress1,$shippingaddress2,$shipcity,$shipstate,$shippingcode,$shipcountry,$trackingcode,$shippingcharge,$shippingmethod,$status)
	{
		$data = array(
			'name' => $name,
			'user' => $user,
			'address1' => $address1,
			'address2' => $address2,
			'city' => $city,
			'state' => $state,
			'pincode' => $pincode,
			'email' => $email,
			'contactno' => $contactno,
			'country' => $country,
			'shipaddress1' => $shippingaddress1,
			'shipaddress2' => $shippingaddress2,
			'shipcity' => $shipcity,
			'shipstate' => $shipstate,
			'shippingcode' => $shippingcode,
			'shipcountry' => $shipcountry,
			'trackingcode' => $trackingcode,
			'shippingcharge' => $shippingcharge,
			'shippingmethod' => $shippingmethod,
			'status' => $status
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'order', $data );
		
		return 1;
	}
	public function editorderitem($orderitemid,$orderid,$product)
	{
        $productdetails=$this->db->query("SELECT * FROM `product` WHERE `id`='$product'")->row();
//        print_r($productdetails);
        $name=$productdetails->name;
        $type=$productdetails->type;
        $url=$productdetails->url;
        $price=$productdetails->price;
        $json=$productdetails->json;
        $image=$productdetails->image;
        $usergenerated=$productdetails->usergenerated;
        $productattributejson=$productdetails->productattributejson;
        $details=$productdetails->details;
        
		$data  = array(
			'product' => $product,
			'name' => $name,
			'type' => $type,
			'url' => $url,
			'price' => $price,
			'json' => $json,
			'image' => $image,
			'usergenerated' => $usergenerated,
			'productattributejson' => $productattributejson,
			'details' => $details,
			'orderid' => $orderid
		);
		$this->db->where( 'id', $orderitemid );
		$query=$this->db->update( 'orderitem', $data );
		
		return 1;
	}
	function deleteorder($id)
	{
		$query=$this->db->query("DELETE FROM `order` WHERE `id`='$id'");
		
	}
	function deleteorderitem($id)
	{
		$query=$this->db->query("DELETE FROM `orderitem` WHERE `id`='$id'");
		
	}
	
    function vieworderitem($id)
	{
        $query=$this->db->query("SELECT `orderitem`.`id`, `orderitem`.`product`, `orderitem`.`name`, `orderitem`.`type`, `orderitem`.`url`, `orderitem`.`price`, `orderitem`.`json`, `orderitem`.`image`, `orderitem`.`usergenerated`, `orderitem`.`productattributejson`, `orderitem`.`details`, `orderitem`.`timestamp`, `orderitem`.`orderid` FROM `orderitem`
        LEFT OUTER JOIN `order` ON `orderitem`.`orderid`=`order`.`id`
        WHERE `orderitem`.`orderid`='$id'")->result();
        
		return $query;
	}
    
	public function getorderdropdown()
	{
		$query=$this->db->query("SELECT * FROM `order`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	
    public function addorder($name,$user,$address1,$address2,$city,$state,$pincode,$email,$contactno,$country,$shippingaddress1,$shippingaddress2,$shipcity,$shipstate,$shippingcode,$shipcountry,$trackingcode,$shippingcharge,$shippingmethod)
    {
        $data  = array(
			'name' => $name,
			'user' => $user,
			'address1' => $address1,
			'address2' => $address2,
			'city' => $city,
			'state' => $state,
			'pincode' => $pincode,
			'email' => $email,
			'contactno' => $contactno,
			'country' => $country,
			'shipaddress1' => $shippingaddress1,
			'shipaddress2' => $shippingaddress2,
			'shipcity' => $shipcity,
			'shipstate' => $shipstate,
			'shippingcode' => $shippingcode,
			'shipcountry' => $shipcountry,
			'trackingcode' => $trackingcode,
			'shippingcharge' => $shippingcharge,
			'shippingmethod' => $shippingmethod
		);
//        print_r($data);
		$query=$this->db->insert( 'order', $data );
        
        if(!$query)
			return  0;
		else
			return  1;
    }
    
    public function getorderbyid($id)
    {
        $data['order']=$this->db->query("SELECT `order`.`id`, `order`.`name`, `order`.`user`, `address1`, `order`.`address2`, `order`.`city`,`order`. `state`,`order`. `pincode`,`order`. `email`,`order`. `contactno`, `order`.`country`, `order`.`shipaddress1`,`order`. `shipaddress2`,`order`. `shipcity`, `order`.`shipstate`, `order`.`shippingcode`, `order`.`shipcountry`, `order`.`orderid`, `order`.`trackingcode`,`order`. `shippingcharge`, `order`.`shippingmethod`, `order`.`timestamp`,`user`.`name` AS `username` 
        FROM `order`
        LEFT OUTER JOIN `user` ON `order`.`user`=`user`.`id`
        WHERE `order`.`id`='$id'")->row();
        
        $data['orderitems']=$this->db->query("SELECT `id`, `product`, `name`, `type`, `url`, `price`, `json`, `image`, `usergenerated`, `productattributejson`, `details`, `timestamp`, `orderid` 
        FROM `orderitem`
        WHERE `orderid`='$id'")->result();
    
        return $data;
    }
    public function createfrontendorder($user,$address1,$address2,$city,$state,$pincode,$email,$contactno,$country,$shippingaddress1,$shippingaddress2,$shipcity,$shipstate,$shippingcode,$shipcountry,$trackingcode,$shippingcharge,$shippingmethod,$productid)
	{
        
        $productdetails=$this->db->query("SELECT * FROM `product` WHERE `id`='$productid'")->row();
//        print_r($productdetails);
        $name=$productdetails->name;
		$data  = array(
			'name' => $name,
			'user' => $user,
			'address1' => $address1,
			'address2' => $address2,
			'city' => $city,
			'state' => $state,
			'pincode' => $pincode,
			'email' => $email,
			'contactno' => $contactno,
			'country' => $country,
			'shipaddress1' => $shippingaddress1,
			'shipaddress2' => $shippingaddress2,
			'shipcity' => $shipcity,
			'shipstate' => $shipstate,
			'shippingcode' => $shippingcode,
			'shipcountry' => $shipcountry,
			'trackingcode' => $trackingcode,
			'shippingcharge' => $shippingcharge,
			'shippingmethod' => $shippingmethod,
            'status' => 2
		);
		$query=$this->db->insert( 'order', $data );
		$orderid=$this->db->insert_id();
        
        $this->db->query("UPDATE `user` SET `billingemail`='$email',`city`='$city',`state`='$state',`pincode`='$pincode',`contactno`='$contactno',`country`='$country',`address1`='$address1',`address2`='$address2',`shipaddress1`='$shippingaddress1',`shipaddress2`='$shippingaddress2',`shipcity`='$shipcity',`shipstate`='$shipstate',`shippingcode`='$shippingcode',`shipcountry`='$shipcountry',`trackingcode`='$trackingcode',`shippingcharge`='$shippingcharge',`shippingmethod`='$shippingmethod' WHERE `id`='$user'");
        
//        $productdetails=$this->db->query("SELECT * FROM `product` WHERE `id`='$productid'")->row();
////        print_r($productdetails);
//        $name=$productdetails->name;
        $type=$productdetails->type;
        $url=$productdetails->url;
        $price=$productdetails->price;
        $json=$productdetails->json;
        $image=$productdetails->image;
        $usergenerated=$productdetails->usergenerated;
        $productattributejson=$productdetails->productattributejson;
        $details=$productdetails->details;
		$dataorderitem  = array(
			'product' => $productid,
			'name' => $name,
			'type' => $type,
			'url' => $url,
			'price' => $price,
			'json' => $json,
			'image' => $image,
			'usergenerated' => $usergenerated,
			'productattributejson' => $productattributejson,
			'details' => $details,
			'orderid' => $orderid
		);
		$queryorderitem=$this->db->insert( 'orderitem', $dataorderitem );
        
        
		return  $orderid;
	}
    
    public function getorderstatusdropdown()
	{
		$query=$this->db->query("SELECT * FROM `orderstatus`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
    
     function getorderbyorderid($id)
	{
        $query=$this->db->query("SELECT  `order`.`id`  AS `id` ,  `order`.`name`  AS `name` ,  `user`.`name`  AS `username` ,  `order`.`user`  AS `user` ,  `order`.`address1`  AS `address1` ,  `order`.`address2`  AS `address2` ,  `order`.`city`  AS `city` ,  `order`.`state`  AS `state` ,  `order`.`pincode`  AS `pincode` ,  `order`.`email`  AS `email` ,  `order`.`contactno`  AS `contactno` ,  `order`.`country`  AS `country` ,  `order`.`shipaddress1`  AS `shipaddress1` ,  `order`.`shipaddress2`  AS `shipaddress2` ,  `order`.`shipcity`  AS `shipcity` ,  `order`.`shipstate`  AS `shipstate` ,  `order`.`shippingcode`  AS `shippingcode` ,  `order`.`shipcountry`  AS `shipcountry` ,  `order`.`trackingcode`  AS `trackingcode` ,  `order`.`shippingcharge`  AS `shippingcharge` ,  `order`.`shippingmethod`  AS `shippingmethod` ,`orderitem`.`product` as  `productid`,`orderitem`.`name` AS `productname`,`order`.`status` as `orderstatusid`,`orderstatus`.`name` AS `orderstatusname` ,`orderitem`.`url`,`orderitem`.`image`,`orderitem`.`price`,`orderitem`.`details`
FROM `order`    
LEFT OUTER JOIN `user` ON `order`.`user`=`user`.`id` 
LEFT OUTER JOIN `orderitem` ON `order`.`id`=`orderitem`.`orderid`  
LEFT OUTER JOIN `orderstatus` ON `order`.`status`=`orderstatus`.`id` 
WHERE `order`.`id`='$id'")->row();
        
		return $query;
	}
    public function placeorder($userid,$productid)
	{
        
        $productdetails=$this->db->query("SELECT * FROM `product` WHERE `id`='$productid'")->row();
//        print_r($productdetails);
        $name=$productdetails->name;
        $type=$productdetails->type;
        $url=$productdetails->url;
        $price=$productdetails->price;
        $json=$productdetails->json;
        $image=$productdetails->image;
        $usergenerated=$productdetails->usergenerated;
        $productattributejson=$productdetails->productattributejson;
        $details=$productdetails->details;
        
		$data  = array(
			'name' => $name,
			'user' => $userid,
            'status' => 1
		);
		$query=$this->db->insert( 'order', $data );
		$orderid=$this->db->insert_id();
        
		$dataorderitem  = array(
			'product' => $productid,
			'name' => $name,
			'type' => $type,
			'url' => $url,
			'price' => $price,
			'json' => $json,
			'image' => $image,
			'usergenerated' => $usergenerated,
			'productattributejson' => $productattributejson,
			'details' => $details,
			'orderid' => $orderid
		);
		$queryorderitem=$this->db->insert( 'orderitem', $dataorderitem );
        
		return  $orderid;
	}
    
    
    public function updatebillingdetails($user,$address1,$address2,$city,$state,$pincode,$email,$contactno,$country,$trackingcode)
	{
        $this->db->query("UPDATE `user` SET `billingemail`='$email',`city`='$city',`state`='$state',`pincode`='$pincode',`contactno`='$contactno',`country`='$country',`address1`='$address1',`address2`='$address2',`trackingcode`='$trackingcode' WHERE `id`='$user'");
        return  $user;
	}
    
    public function updateshippingdetails($user,$shippingaddress1,$shippingaddress2,$shipcity,$shipstate,$shippingcode,$shipcountry,$trackingcode,$shippingcharge,$shippingmethod)
	{
        $this->db->query("UPDATE `user` SET `shipaddress1`='$shippingaddress1',`shipaddress2`='$shippingaddress2',`shipcity`='$shipcity',`shipstate`='$shipstate',`shippingcode`='$shippingcode',`shipcountry`='$shipcountry',`trackingcode`='$trackingcode',`shippingcharge`='$shippingcharge',`shippingmethod`='$shippingmethod' WHERE `id`='$user'");
        return  $user;
	}
    
    public function updateorderbyorderid($order,$address1,$address2,$city,$state,$pincode,$email,$contactno,$country,$shippingaddress1,$shippingaddress2,$shipcity,$shipstate,$shippingcode,$shipcountry,$trackingcode,$shippingcharge,$shippingmethod)
	{
        
		$data  = array(
			'address1' => $address1,
			'address2' => $address2,
			'city' => $city,
			'state' => $state,
			'pincode' => $pincode,
			'email' => $email,
			'contactno' => $contactno,
			'country' => $country,
			'shipaddress1' => $shippingaddress1,
			'shipaddress2' => $shippingaddress2,
			'shipcity' => $shipcity,
			'shipstate' => $shipstate,
			'shippingcode' => $shippingcode,
			'shipcountry' => $shipcountry,
			'trackingcode' => $trackingcode,
			'shippingcharge' => $shippingcharge,
			'shippingmethod' => $shippingmethod,
            'status' => 2
		);
        
        
		$this->db->where( 'id', $order );
		$query=$this->db->update( 'order', $data );
        
		if(!$query)
			return  0;
		else
			return  1;
	}
    
}
?>