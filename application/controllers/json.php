<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Json extends CI_Controller 
{
	
    
    //rest api for sergy
    
	public function login() 
	{
        $data = json_decode(file_get_contents('php://input'), true);
		$email=$data['email'];
		$password=$data['password'];
		$data['message']=$this->user_model->login($email,$password);
		$this->load->view('json',$data);
	}
    
//	public function authenticate() 
//	{
//		$email=$this->input->get_post("email");
//		$password=$this->input->get_post("password");
//		$password=md5($password);
//		$data['message']=$this->user_model->frontendauthenticate($email,$password);
//		$this->load->view('json',$data);
//	}
    
    public function authenticate() 
	{
		$data['message']=$this->user_model->authenticate();
		$this->load->view('json',$data);
	}
    
	public function register() 
	{
        
        $data = json_decode(file_get_contents('php://input'), true);
        $name=$data['name'];
		$email=$data['email'];
		$password=$data['password'];
		$socialid=$data['socialid'];
		$logintype=$data['logintype'];
		$json=$data['json'];
		$password=md5($password);
		$data['message']=$this->user_model->frontendregister($name,$email,$password,$socialid,$logintype,$json);
		$this->load->view('json',$data);
	}
    
	public function userfromemail() 
	{
//        $data = json_decode(file_get_contents('php://input'), true);
//        $email=$data['email'];
        $email=$this->input->get_post("email");
		$data['message']=$this->chat_model->userfromemail($email);
		$this->load->view('json',$data);
	}
    
    function getallcategories()
	{
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`category`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`category`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `category`");
        
		$this->load->view("json",$data);
	} 
    
     function getallwaitingusers()
	{
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`accesslevel`";
        $elements[3]->sort="1";
        $elements[3]->header="Accesslevel";
        $elements[3]->alias="accesslevel";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`accesslevel`.`name`";
        $elements[4]->sort="1";
        $elements[4]->header="Accesslevel";
        $elements[4]->alias="accesslevelname";
       
        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`timestamp`";
        $elements[5]->sort="1";
        $elements[5]->header="Timestamp";
        $elements[5]->alias="timestamp";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`user`.`status`";
        $elements[6]->sort="1";
        $elements[6]->header="status";
        $elements[6]->alias="status";
       
        $elements[7]=new stdClass();
        $elements[7]->field="`user`.`image`";
        $elements[7]->sort="1";
        $elements[7]->header="image";
        $elements[7]->alias="image";
       
        $elements[8]=new stdClass();
        $elements[8]->field="`user`.`socialid`";
        $elements[8]->sort="1";
        $elements[8]->header="socialid";
        $elements[8]->alias="socialid";
       
        $elements[9]=new stdClass();
        $elements[9]->field="`user`.`logintype`";
        $elements[9]->sort="1";
        $elements[9]->header="logintype";
        $elements[9]->alias="logintype";
       
        $elements[10]=new stdClass();
        $elements[10]->field="`logintype`.`name`";
        $elements[10]->sort="1";
        $elements[10]->header="logintypeName";
        $elements[10]->alias="logintypename";
       
        $elements[11]=new stdClass();
        $elements[11]->field="`statuses`.`name`";
        $elements[11]->sort="1";
        $elements[11]->header="statusName";
        $elements[11]->alias="statusname";
       
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`","WHERE `user`.`status`=3");
        
		$this->load->view("json",$data);
	} 
    
    
	public function addchat() 
	{
//        $data = json_decode(file_get_contents('php://input'), true);
//        $json=$data['json'];
//		$user=$data['user'];
//		$type=$data['type'];
//		$url=$data['url'];
//		$imageurl=$data['imageurl'];
//		$status=$data['status'];
        
        $json=$this->input->get_post('json');
		$user=$this->input->get_post('user');
		$type=$this->input->get_post('type');
		$url=$this->input->get_post('url');
		$imageurl=$this->input->get_post('imageurl');
		$status=$this->input->get_post('status');
		$data['message']=$this->chat_model->addchat($json,$user,$type,$url,$imageurl,$status);
		$this->load->view('json',$data);
	}
    
     function getallchats()
	{
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`chatmessages`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`chatmessages`.`chat`";
        $elements[1]->sort="1";
        $elements[1]->header="Chat";
        $elements[1]->alias="chat";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`chatmessages`.`user`";
        $elements[2]->sort="1";
        $elements[2]->header="User";
        $elements[2]->alias="user";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`chatmessages`.`timestamp`";
        $elements[3]->sort="1";
        $elements[3]->header="Timestamp";
        $elements[3]->alias="timestamp";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`chatmessages`.`url`";
        $elements[4]->sort="1";
        $elements[4]->header="Url";
        $elements[4]->alias="urlname";
       
        $elements[5]=new stdClass();
        $elements[5]->field="`chatmessages`.`type`";
        $elements[5]->sort="1";
        $elements[5]->header="type";
        $elements[5]->alias="type";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`chatmessages`.`status`";
        $elements[6]->sort="1";
        $elements[6]->header="status";
        $elements[6]->alias="status";
       
        $elements[7]=new stdClass();
        $elements[7]->field="`chatmessages`.`imageurl`";
        $elements[7]->sort="1";
        $elements[7]->header="imageurl";
        $elements[7]->alias="imageurl";
       
        $elements[8]=new stdClass();
        $elements[8]->field="`chatmessagetypes`.`name`";
        $elements[8]->sort="1";
        $elements[8]->header="typename";
        $elements[8]->alias="typename";
       
        $elements[9]=new stdClass();
        $elements[9]->field="`user`.`name`";
        $elements[9]->sort="1";
        $elements[9]->header="Username";
        $elements[9]->alias="username";
       
        $elements[10]=new stdClass();
        $elements[10]->field="`chatmessages`.`json`";
        $elements[10]->sort="1";
        $elements[10]->header="json";
        $elements[10]->alias="json";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `chatmessages` LEFT OUTER JOIN `chatmessagetypes` ON `chatmessagetypes`.`id`=`chatmessages`.`type` LEFT OUTER JOIN `user` ON `user`.`id`=`chatmessages`.`user`");
        
		$this->load->view("json",$data);
	} 
    
    
     function getchatbyuser()
	{
        $data = json_decode(file_get_contents('php://input'), true);
        $useremailid=$data['email'];
         
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`chatmessages`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`chatmessages`.`chat`";
        $elements[1]->sort="1";
        $elements[1]->header="Chat";
        $elements[1]->alias="chat";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`chatmessages`.`user`";
        $elements[2]->sort="1";
        $elements[2]->header="User";
        $elements[2]->alias="user";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`chatmessages`.`timestamp`";
        $elements[3]->sort="1";
        $elements[3]->header="Timestamp";
        $elements[3]->alias="timestamp";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`chatmessages`.`url`";
        $elements[4]->sort="1";
        $elements[4]->header="Url";
        $elements[4]->alias="urlname";
       
        $elements[5]=new stdClass();
        $elements[5]->field="`chatmessages`.`type`";
        $elements[5]->sort="1";
        $elements[5]->header="type";
        $elements[5]->alias="type";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`chatmessages`.`status`";
        $elements[6]->sort="1";
        $elements[6]->header="status";
        $elements[6]->alias="status";
       
        $elements[7]=new stdClass();
        $elements[7]->field="`chatmessages`.`imageurl`";
        $elements[7]->sort="1";
        $elements[7]->header="imageurl";
        $elements[7]->alias="imageurl";
       
        $elements[8]=new stdClass();
        $elements[8]->field="`chatmessagetypes`.`name`";
        $elements[8]->sort="1";
        $elements[8]->header="typename";
        $elements[8]->alias="typename";
       
        $elements[9]=new stdClass();
        $elements[9]->field="`user`.`name`";
        $elements[9]->sort="1";
        $elements[9]->header="Username";
        $elements[9]->alias="username";
       
        $elements[10]=new stdClass();
        $elements[10]->field="`chatmessages`.`json`";
        $elements[10]->sort="1";
        $elements[10]->header="json";
        $elements[10]->alias="json";
        
        $elements[11]=new stdClass();
        $elements[11]->field="`chatmessages`.`user`";
        $elements[11]->sort="1";
        $elements[11]->header="userid";
        $elements[11]->alias="userid";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `chatmessages` LEFT OUTER JOIN `chatmessagetypes` ON `chatmessagetypes`.`id`=`chatmessages`.`type` LEFT OUTER JOIN `user` ON `user`.`id`=`chatmessages`.`user`","WHERE `user`.`email`='$useremailid'");
        
		$this->load->view("json",$data);
	} 
    
    public function adduserform()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $formid=$data['formid'];
        $user=$data['user'];
        $json=$data['json'];
        $chatjson=$data['chatjson'];
        $id=$data['id'];
        $data['message']=$this->form_model->adduserform($formid,$user,$json,$chatjson,$id);
		$this->load->view('json',$data);
    }
    
    public function adduserproduct()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $productid=$data['productid'];
        $user=$data['user'];
        $json=$data['json'];
        $data['message']=$this->product_model->adduserproduct($productid,$user,$json);
		$this->load->view('json',$data);
    }
    
	public function addtranscript() 
	{
        $name=$this->input->get_post('name');
        $text=$this->input->get_post('text');
        $json=$this->input->get_post('json');
		$url=$this->input->get_post("url");
        
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		$filename="image";
		$image="";
		if (  $this->upload->do_upload($filename))
		{
            $uploaddata = $this->upload->data();
            $image=$uploaddata['file_name'];

            $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
            $config_r['maintain_ratio'] = TRUE;
            $config_t['create_thumb'] = FALSE;///add this
            $config_r['width']   = 800;
            $config_r['height'] = 800;
            $config_r['quality']    = 100;
            //end of configs
            $this->load->library('image_lib', $config_r); 
            $this->image_lib->initialize($config_r);
            if(!$this->image_lib->resize())
            {
                echo "Failed." . $this->image_lib->display_errors();
                //return false;
            }  
            else
            {
                $image=$this->image_lib->dest_image;
                //return false;
            }
                
		}
            
        
		$data['message']=$this->transcript_model->addtranscript($name,$text,$json,$url,$image);
		$this->load->view('json',$data);
	}
    
    function getalltranscript()
	{
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`transcript`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`transcript`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`transcript`.`text`";
        $elements[2]->sort="1";
        $elements[2]->header="Text";
        $elements[2]->alias="text";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`transcript`.`json`";
        $elements[3]->sort="1";
        $elements[3]->header="json";
        $elements[3]->alias="json";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`transcript`.`url`";
        $elements[4]->sort="1";
        $elements[4]->header="url";
        $elements[4]->alias="url";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`transcript`.`image`";
        $elements[4]->sort="1";
        $elements[4]->header="image";
        $elements[4]->alias="image";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `transcript`");
        
		$this->load->view("json",$data);
	} 
    
    
    function gettranscriptbyid()
	{
        $id=$this->input->get_post('id');
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`transcript`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`transcript`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`transcript`.`text`";
        $elements[2]->sort="1";
        $elements[2]->header="Text";
        $elements[2]->alias="text";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`transcript`.`json`";
        $elements[3]->sort="1";
        $elements[3]->header="json";
        $elements[3]->alias="json";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`transcript`.`url`";
        $elements[4]->sort="1";
        $elements[4]->header="url";
        $elements[4]->alias="url";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`transcript`.`image`";
        $elements[4]->sort="1";
        $elements[4]->header="image";
        $elements[4]->alias="image";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `transcript`","WHERE `transcript`.`id`='$id'");
        
		$this->load->view("json",$data);
	} 
    
    
    function getalltranscriptbycategory()
	{
//        SELECT `transcript`.`id`, `transcript`.`name` AS `transcriptname`, `transcript`.`text`, `transcript`.`image`, `transcript`.`json`, `transcript`.`url`,`category`.`name` AS `categoryname` 
//FROM `transcript` 
//LEFT OUTER JOIN `transcriptcategory` ON `transcriptcategory`.`transcriptid`=`transcript`.`id`
//LEFT OUTER JOIN `category` ON `transcriptcategory`.`categoryid`=`category`.`id`
//WHERE `transcriptcategory`.`categoryid`=5
        
        
        $categoryid=$this->input->get_post('categoryid');
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`transcript`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`transcript`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`transcript`.`text`";
        $elements[2]->sort="1";
        $elements[2]->header="Text";
        $elements[2]->alias="text";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`transcript`.`json`";
        $elements[3]->sort="1";
        $elements[3]->header="json";
        $elements[3]->alias="json";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`transcript`.`url`";
        $elements[4]->sort="1";
        $elements[4]->header="url";
        $elements[4]->alias="url";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`transcript`.`image`";
        $elements[5]->sort="1";
        $elements[5]->header="image";
        $elements[5]->alias="image";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`category`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="categoryname";
        $elements[6]->alias="categoryname";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `transcript` LEFT OUTER JOIN `transcriptcategory` ON `transcriptcategory`.`transcriptid`=`transcript`.`id` LEFT OUTER JOIN `category` ON `transcriptcategory`.`categoryid`=`category`.`id`","WHERE `transcriptcategory`.`categoryid`='$categoryid'");
        
		$this->load->view("json",$data);
	} 
    
    
	public function addform() 
	{
        $name=$this->input->get_post('name');
        $json=$this->input->get_post('json');
		$data['message']=$this->form_model->addform($name,$json);
		$this->load->view('json',$data);
	}
    
    function getallforms()
	{
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`form`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`form`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`form`.`json`";
        $elements[2]->sort="1";
        $elements[2]->header="Json";
        $elements[2]->alias="json";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `form`");
        
		$this->load->view("json",$data);
	} 
    
    function getformbyid()
	{
        $id=$this->input->get_post('id');
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`form`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`form`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `form`","WHERE `form`.`id`='$id'");
        
		$this->load->view("json",$data);
	} 
    
    function getformsbycategory()
	{
        
        $categoryid=$this->input->get_post('categoryid');
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`form`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`form`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`form`.`json`";
        $elements[2]->sort="1";
        $elements[2]->header="Json";
        $elements[2]->alias="json";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`category`.`name`";
        $elements[3]->sort="1";
        $elements[3]->header="categoryname";
        $elements[3]->alias="categoryname";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `form` LEFT OUTER JOIN `formcategory` ON `formcategory`.`formid`=`form`.`id` LEFT OUTER JOIN `category` ON `formcategory`.`categoryid`=`category`.`id`","WHERE `formcategory`.`categoryid`='$categoryid'");
        
		$this->load->view("json",$data);
	} 
    
     
	public function addorder() 
	{
        $name=$this->input->get_post('name');
		$user=$this->input->get_post("user");
		$address1=$this->input->get_post("address1");
		$address2=$this->input->get_post("address2");
		$city=$this->input->get_post("city");
		$state=$this->input->get_post("state");
		$pincode=$this->input->get_post("pincode");
		$email=$this->input->get_post("email");
		$contactno=$this->input->get_post("contactno");
		$country=$this->input->get_post("country");
        $shippingaddress1=$this->input->get_post('shippingaddress1');
        $shippingaddress2=$this->input->get_post('shippingaddress2');
		$shipcity=$this->input->get_post('shipcity');
		$shipstate=$this->input->get_post('shipstate');
		$shippingcode=$this->input->get_post('shippingcode');
		$shipcountry=$this->input->get_post('shipcountry');
		$trackingcode=$this->input->get_post('trackingcode');
		$shippingcharge=$this->input->get_post('shippingcharge');
		$shippingmethod=$this->input->get_post('shippingmethod');
		
		$data['message']=$this->order_model->addorder($name,$user,$address1,$address2,$city,$state,$pincode,$email,$contactno,$country,$shippingaddress1,$shippingaddress2,$shipcity,$shipstate,$shippingcode,$shipcountry,$trackingcode,$shippingcharge,$shippingmethod);
		$this->load->view('json',$data);
	}
    
    function getordersbyuser()
	{
//        $data = json_decode(file_get_contents('php://input'), true);
//        $email=$data['email'];
        $email=$this->input->get_post('email');
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`order`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`order`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`name`";
        $elements[2]->sort="1";
        $elements[2]->header="User";
        $elements[2]->alias="username";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`order`.`user`";
        $elements[3]->sort="1";
        $elements[3]->header="user";
        $elements[3]->alias="user";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`order`.`address1`";
        $elements[4]->sort="1";
        $elements[4]->header="address1";
        $elements[4]->alias="address1";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`order`.`address2`";
        $elements[5]->sort="1";
        $elements[5]->header="address2";
        $elements[5]->alias="address2";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`order`.`city`";
        $elements[6]->sort="1";
        $elements[6]->header="city";
        $elements[6]->alias="city";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`order`.`state`";
        $elements[7]->sort="1";
        $elements[7]->header="state";
        $elements[7]->alias="state";
        
        $elements[8]=new stdClass();
        $elements[8]->field="`order`.`pincode`";
        $elements[8]->sort="1";
        $elements[8]->header="pincode";
        $elements[8]->alias="pincode";
        
        $elements[9]=new stdClass();
        $elements[9]->field="`order`.`email`";
        $elements[9]->sort="1";
        $elements[9]->header="email";
        $elements[9]->alias="email";
        
        $elements[10]=new stdClass();
        $elements[10]->field="`order`.`contactno`";
        $elements[10]->sort="1";
        $elements[10]->header="contactno";
        $elements[10]->alias="contactno";
        
        $elements[11]=new stdClass();
        $elements[11]->field="`order`.`country`";
        $elements[11]->sort="1";
        $elements[11]->header="country";
        $elements[11]->alias="country";
        
        $elements[12]=new stdClass();
        $elements[12]->field="`order`.`shipaddress1`";
        $elements[12]->sort="1";
        $elements[12]->header="shipaddress1";
        $elements[12]->alias="shipaddress1";
        
        $elements[13]=new stdClass();
        $elements[13]->field="`order`.`shipaddress2`";
        $elements[13]->sort="1";
        $elements[13]->header="shipaddress2";
        $elements[13]->alias="shipaddress2";
        
        $elements[14]=new stdClass();
        $elements[14]->field="`order`.`shipcity`";
        $elements[14]->sort="1";
        $elements[14]->header="shipcity";
        $elements[14]->alias="shipcity";
        
        $elements[15]=new stdClass();
        $elements[15]->field="`order`.`shipstate`";
        $elements[15]->sort="1";
        $elements[15]->header="shipstate";
        $elements[15]->alias="shipstate";
        
        $elements[16]=new stdClass();
        $elements[16]->field="`order`.`shippingcode`";
        $elements[16]->sort="1";
        $elements[16]->header="shippingcode";
        $elements[16]->alias="shippingcode";
        
        $elements[17]=new stdClass();
        $elements[17]->field="`order`.`shipcountry`";
        $elements[17]->sort="1";
        $elements[17]->header="shipcountry";
        $elements[17]->alias="shipcountry";
        
        $elements[18]=new stdClass();
        $elements[18]->field="`order`.`trackingcode`";
        $elements[18]->sort="1";
        $elements[18]->header="trackingcode";
        $elements[18]->alias="trackingcode";
        
        $elements[19]=new stdClass();
        $elements[19]->field="`order`.`shippingcharge`";
        $elements[19]->sort="1";
        $elements[19]->header="shippingcharge";
        $elements[19]->alias="shippingcharge";
        
        $elements[20]=new stdClass();
        $elements[20]->field="`order`.`shippingmethod`";
        $elements[20]->sort="1";
        $elements[20]->header="shippingmethod";
        $elements[20]->alias="shippingmethod";
        
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `order`
        LEFT OUTER JOIN `user` ON `order`.`user`=`user`.`id`","WHERE `user`.`email`='$email'");
        
		$this->load->view("json",$data);
	} 
    
    
    
	public function addproduct() 
	{
        $name=$this->input->get_post('name');
		$type=$this->input->get_post('type');
		$url=$this->input->get_post('url');
		$price=$this->input->get_post('price');
		$json=$this->input->get_post('json');
		$usergenerated=$this->input->get_post('usergenerated');
		$productattributejson=$this->input->get_post('productattributejson');
		$details=$this->input->get_post('details');
		
        
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		$filename="image";
		$image="";
		if (  $this->upload->do_upload($filename))
		{
            $uploaddata = $this->upload->data();
            $image=$uploaddata['file_name'];

            $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
            $config_r['maintain_ratio'] = TRUE;
            $config_t['create_thumb'] = FALSE;///add this
            $config_r['width']   = 800;
            $config_r['height'] = 800;
            $config_r['quality']    = 100;
            //end of configs
            $this->load->library('image_lib', $config_r); 
            $this->image_lib->initialize($config_r);
            if(!$this->image_lib->resize())
            {
                echo "Failed." . $this->image_lib->display_errors();
                //return false;
            }  
            else
            {
                $image=$this->image_lib->dest_image;
                //return false;
            }
                
		}
            
        
		$data['message']=$this->product_model->addproduct($name,$type,$url,$price,$json,$usergenerated,$productattributejson,$details,$image);
		$this->load->view('json',$data);
	}
    
    public function getorderbyid()
    {
        $id=$this->input->get_post('id');
        $data['message']=$this->order_model->getorderbyid($id);
		$this->load->view('json',$data);
    }
    function getproductbycategoryid()
	{
        $categoryid=$this->input->get_post('categoryid');
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`product`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`product`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`product`.`type`";
        $elements[2]->sort="1";
        $elements[2]->header="Type";
        $elements[2]->alias="type";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`product`.`details`";
        $elements[3]->sort="1";
        $elements[3]->header="Details";
        $elements[3]->alias="details";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`product`.`url`";
        $elements[4]->sort="1";
        $elements[4]->header="url";
        $elements[4]->alias="url";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`product`.`price`";
        $elements[5]->sort="1";
        $elements[5]->header="price";
        $elements[5]->alias="price";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`product`.`json`";
        $elements[6]->sort="1";
        $elements[6]->header="json";
        $elements[6]->alias="json";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`product`.`image`";
        $elements[7]->sort="1";
        $elements[7]->header="image";
        $elements[7]->alias="image";
        
        $elements[8]=new stdClass();
        $elements[8]->field="`product`.`usergenerated`";
        $elements[8]->sort="1";
        $elements[8]->header="usergenerated";
        $elements[8]->alias="usergenerated";
        
        $elements[9]=new stdClass();
        $elements[9]->field="`product`.`productattributejson`";
        $elements[9]->sort="1";
        $elements[9]->header="productattributejson";
        $elements[9]->alias="productattributejson";
        
        $elements[10]=new stdClass();
        $elements[10]->field="`category`.`name`";
        $elements[10]->sort="1";
        $elements[10]->header="categoryname";
        $elements[10]->alias="categoryname";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `product` LEFT OUTER JOIN `productcategory` ON `productcategory`.`productid`=`product`.`id` LEFT OUTER JOIN `category` ON `productcategory`.`categoryid`=`category`.`id`","WHERE `productcategory`.`categoryid`='$categoryid'");
        
		$this->load->view("json",$data);
	} 
    
    function getallproduct()
	{
//        $categoryid=$this->input->get_post('categoryid');
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`product`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`product`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`product`.`type`";
        $elements[2]->sort="1";
        $elements[2]->header="Type";
        $elements[2]->alias="type";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`product`.`details`";
        $elements[3]->sort="1";
        $elements[3]->header="Details";
        $elements[3]->alias="details";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`product`.`url`";
        $elements[4]->sort="1";
        $elements[4]->header="url";
        $elements[4]->alias="url";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`product`.`price`";
        $elements[5]->sort="1";
        $elements[5]->header="price";
        $elements[5]->alias="price";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`product`.`json`";
        $elements[6]->sort="1";
        $elements[6]->header="json";
        $elements[6]->alias="json";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`product`.`image`";
        $elements[7]->sort="1";
        $elements[7]->header="image";
        $elements[7]->alias="image";
        
        $elements[8]=new stdClass();
        $elements[8]->field="`product`.`usergenerated`";
        $elements[8]->sort="1";
        $elements[8]->header="usergenerated";
        $elements[8]->alias="usergenerated";
        
        $elements[9]=new stdClass();
        $elements[9]->field="`product`.`productattributejson`";
        $elements[9]->sort="1";
        $elements[9]->header="productattributejson";
        $elements[9]->alias="productattributejson";
        
//        $elements[10]=new stdClass();
//        $elements[10]->field="`category`.`name`";
//        $elements[10]->sort="1";
//        $elements[10]->header="categoryname";
//        $elements[10]->alias="categoryname";
//        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `product`");
        
		$this->load->view("json",$data);
	} 
    
    public function getproductbyid()
    {
        $id=$this->input->get_post('id');
        $data['message']=$this->product_model->getproductbyid($id);
		$this->load->view('json',$data);
    }
    
    public function logout()
    {
        $userid=$this->input->get_post('id');
        $data['message']=$this->user_model->frontendlogout($userid);
		$this->load->view('json',$data);
    }
    
    public function addorder() 
	{
        
        $data = json_decode(file_get_contents('php://input'), true);
        $name=$data['name'];
        $user=$data['user'];
        $address1=$data['address1'];
        $address2=$data['address2'];
        $city=$data['city'];
        $state=$data['state'];
        $pincode=$data['pincode'];
        $email=$data['email'];
        $contactno=$data['contactno'];
        $country=$data['country'];
        $shippingaddress1=$data['shippingaddress1'];
        $shippingaddress2=$data['shippingaddress2'];
        $shipcity=$data['shipcity'];
        $shipstate=$data['shipstate'];
        $shippingcode=$data['shippingcode'];
        $shipcountry=$data['shipcountry'];
        $trackingcode=$data['trackingcode'];
        $shippingcharge=$data['shippingcharge'];
        $shippingmethod=$data['shippingmethod'];
        $productid=$data['productid'];
		
		$password=md5($password);
		$data['message']=$this->order_model->createfrontendorder($name,$user,$address1,$address2,$city,$state,$pincode,$email,$contactno,$country,$shippingaddress1,$shippingaddress2,$shipcity,$shipstate,$shippingcode,$shipcountry,$trackingcode,$shippingcharge,$shippingmethod,$productid);
		$this->load->view('json',$data);
	}
}
?>