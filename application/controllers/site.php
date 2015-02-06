<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
            $this->session->sess_destroy();
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
        {
            $this->session->sess_destroy();
			redirect( base_url() . 'index.php/login/?alerterror=You do not have access to this page. ', 'refresh' );
        }
	}
	public function index()
	{
		$access = array("1");
		$data["page"]="chatpage";
        $data["title"]="Chat Page";
		$this->load->view("template",$data);
	}
	public function blank()
	{
		$data[ 'title' ] = 'Error';
		$this->load->view( 'template', $data );	
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );	
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
//        print_r($_POST);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
//		$this->form_validation->set_rules('username','UserName','trim|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
            $data['category']=$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );	
		}
		else
		{
            $name=$this->input->post('name');
//            $username=$this->input->post('username');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
            $category=$this->input->post('category');
            
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
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
			if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$category)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			$data['redirect']="site/viewusers";
			$this->load->view("redirect",$data);
		}
	}
//	function viewusers()
//	{
//		$access = array("1");
//		$this->checkaccess($access);
//        $pagestart = $this->uri->segment(3, 0);        
//        if($pagestart=="")
//        {
//            $pagestart=0;
//        }
//        $modelquery=$this->user_model->viewusers($pagestart,$this->config->item("per_page"));
//        
//        $config['base_url'] = site_url().'/site/viewusers/';
//        $config['total_rows'] = $modelquery->totalcount;
//        
//        $this->pagination->initialize($config); 
//		$data['table']=$modelquery->query;
//        
//        
//        
////		$data['table']=$this->user_model->viewusers();
//		$data['page']='viewusers';
//		$data['title']='View Users';
//		$this->load->view('template',$data);
//	}
     
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");
        
		$data['title']='View Users';
		$this->load->view('template',$data);
	} 
    function viewusersjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
//        SELECT  `retailer`.`id`, `retailer`.`area`, `retailer`.`dob`,`retailer`.`name`, `retailer`.`number`, `retailer`.`email`, `retailer`.`address`,`retailer`. `ownername`, `retailer`.`ownernumber`, `retailer`.`contactname`,`retailer`. `contactnumber`,`area`.`name` AS `areaname` FROM `retailer` LEFT OUTER JOIN `area` ON `area`.`id`=`retailer`.`area`
            
        
        
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
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`logintype`.`name`";
        $elements[4]->sort="1";
        $elements[4]->header="Logintype";
        $elements[4]->alias="logintype";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";
       
        $elements[6]=new stdClass();
        $elements[6]->field="`accesslevel`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Accesslevel";
        $elements[6]->alias="accesslevelname";
       
        
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
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel`");
        
		$this->load->view("json",$data);
	} 
    
    
	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
        $data['selectedcategory']=$this->user_model->getcategorybyuser($this->input->get('id'));
        $data['category']=$this->category_model->getcategorydropdown();
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
//		$this->form_validation->set_rules('username','UserName','trim|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
            
            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
//            $username=$this->input->get_post('username');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
            $category=$this->input->get_post('category');
            
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
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$category)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    
    
    
    /*-----------------User/Organizer Finctions added by avinash for frontend APIs---------------*/
    function update()
	{
        $id=$this->input->get('id');
        $firstname=$this->input->get('firstname');
        $lastname=$this->input->get('lastname');
        $password=$this->input->get('password');
        $password=md5($password);
        $email=$this->input->get('email');
        $website=$this->input->get('website');
        $description=$this->input->get('description');
        $eventinfo=$this->input->get('eventinfo');
        $contact=$this->input->get('contact');
        $address=$this->input->get('address');
        $city=$this->input->get('city');
        $pincode=$this->input->get('pincode');
        $dob=$this->input->get('dob');
       // $accesslevel=$this->input->get('accesslevel');
        $accesslevel=2;
        $timestamp=$this->input->get('timestamp');
        $facebookuserid=$this->input->get('facebookuserid');
        $newsletterstatus=$this->input->get('newsletterstatus');
        $status=$this->input->get('status');
        $logo=$this->input->get('logo');
        $showwebsite=$this->input->get('showwebsite');
        $eventsheld=$this->input->get('eventsheld');
        $topeventlocation=$this->input->get('topeventlocation');
        $data['json']=$this->user_model->update($id,$firstname,$lastname,$password,$email,$website,$description,$eventinfo,$contact,$address,$city,$pincode,$dob,$accesslevel,$timestamp,$facebookuserid,$newsletterstatus,$status,$logo,$showwebsite,$eventsheld,$topeventlocation);
        print_r($data);
		//$this->load->view('json',$data);
	}
	public function finduser()
	{
        $data['json']=$this->user_model->viewall();
        print_r($data);
		//$this->load->view('json',$data);
	}
    public function findoneuser()
	{
        $id=$this->input->get('id');
        $data['json']=$this->user_model->viewone($id);
        print_r($data);
		//$this->load->view('json',$data);
	}
    public function deleteoneuser()
	{
        $id=$this->input->get('id');
        $data['json']=$this->user_model->deleteone($id);
		//$this->load->view('json',$data);
	}
    public function login()
    {
        $email=$this->input->get("email");
        $password=$this->input->get("password");
        $data['json']=$this->user_model->login($email,$password);
        //$this->load->view('json',$data);
    }
    public function authenticate()
    {
        $data['json']=$this->user_model->authenticate();
        //$this->load->view('json',$data);
    }
    public function signup()
    {
        $email=$this->input->get_post("email");
        $password=$this->input->get_post("password");
        $data['json']=$this->user_model->signup($email,$password);
        //$this->load->view('json',$data);
        
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $data['json']=true;
        //$this->load->view('json',$data);
    }
    
    
    
    /*-----------------End of User functions----------------------------------*/
    
    
    
	//category
    
//	function viewcategory()
//	{
//		$access = array("1");
//		$this->checkaccess($access); 
//        $pagestart = $this->uri->segment(3, 0);        
//        if($pagestart=="")
//        {
//            $pagestart=0;
//        }
//        $modelquery=$this->category_model->viewcategory($pagestart,$this->config->item("per_page"));
//        
//        $config['base_url'] = site_url().'/site/viewcategory/';
//        $config['total_rows'] = $modelquery->totalcount;
//        
//        $this->pagination->initialize($config); 
//		$data['table']=$modelquery->query;
//        
//        
////		$data['table']=$this->category_model->viewcategory();
//		$data['page']='viewcategory';
//		$data['title']='View category';
//		$this->load->view('template',$data);
//	}
//    
    
    function viewcategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewcategory';
        $data['base_url'] = site_url("site/viewcategoryjson");
        
		$data['title']='View Category';
		$this->load->view('template',$data);
	} 
    function viewcategoryjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
//        SELECT  `retailer`.`id`, `retailer`.`area`, `retailer`.`dob`,`retailer`.`name`, `retailer`.`number`, `retailer`.`email`, `retailer`.`address`,`retailer`. `ownername`, `retailer`.`ownernumber`, `retailer`.`contactname`,`retailer`. `contactnumber`,`area`.`name` AS `areaname` FROM `retailer` LEFT OUTER JOIN `area` ON `area`.`id`=`retailer`.`area`
            
        
        
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
    
    
	public function createcategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createcategory';
		$data[ 'title' ] = 'Create category';
		$this->load->view( 'template', $data );	
	}
   
	function createcategorysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createcategory';
			$data[ 'title' ] = 'Create category';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			if($this->category_model->createcategory($name)==0)
			$data['alerterror']="New category could not be created.";
			else
			$data['alertsuccess']="category  created Successfully.";
//			$data['table']=$this->category_model->viewcategory();
			$data['redirect']="site/viewcategory";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function editcategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->category_model->beforeeditcategory($this->input->get('id'));
		$data['page']='editcategory';
		$data['title']='Edit category';
		$this->load->view('template',$data);
	}
	function editcategorysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->category_model->beforeeditcategory($this->input->post('id'));
			$data['page']='editcategory';
			$data['title']='Edit category';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			
			if($this->category_model->editcategory($id,$name)==0)
			$data['alerterror']="category Editing was unsuccesful";
			else
			$data['alertsuccess']="category edited Successfully.";
//			$data['table']=$this->category_model->viewcategory();
			$data['redirect']="site/viewcategory";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			/*$data['page']='viewusers';
			$data['title']='View Users';
			$this->load->view('template',$data);*/
		}
	}
   
	function deletecategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->category_model->deletecategory($this->input->get('id'));
		$data['redirect']="site/viewcategory";
        //$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	
	
    
     //email
    
    public function sendmail()
    {
        $email=$this->input->get('email');
        $this->load->library('email');
        //$email='patiljagruti181@gmail.com,jagruti@wohlig.com';
        $this->email->from('avinash@wohlig.com', 'For Any Information');
        $this->email->to($email);
        $this->email->subject('Email Test');
        $this->email->message('Email From For Any Information');

        $this->email->send();

        echo $this->email->print_debugger();
    }
    
    public function sendemail()
    {
        $userid=$this->input->get('userid');
        $listingid=$this->input->get('listingid');
        $user=$this->user_model->getallinfoofuser($userid);
//        print_r($user);
        $touser=$user->email;
        $listing=$this->listing_model->getallinfooflisting($listingid);
//        print_r($user);
        $tolisting= $listing->email;
        $listingname= $listing->name;
        $listingaddress= $listing->address;
        $listingstate= $listing->state;
        $listingcontactno= $listing->contactno;
        $listingemail= $listing->email;
        $listingyearofestablishment= $listing->yearofestablishment;
        $usermsg="<h3>All Details Of Listing</h3><br>Listing Name:'$listingname' <br>Listing address:'$listingaddress' <br>Listing state:'$listingstate' <br>Listing contactno:'$listingcontactno' <br>Listing email:'$listingemail' <br>Listing yearofestablishment:'$listingyearofestablishment' <br>";
//        echo $msg;
        //to user
        $this->load->library('email');
        $this->email->from('avinash@wohlig.com', 'For Any Information To User');
        $this->email->to($touser);
        $this->email->subject('Listing Details');
        $this->email->message($usermsg);

        $this->email->send();
        
        //to listing
        $firstname=$user->firstname;
        $lastname=$user->lastname;
        $email=$user->email;
        $contact=$user->contact;
        $listingmsg="<h3>All Details Of user</h3><br>user Name:'$firstname' <br>user Last Name:'$lastname' <br>user Email:'$email' <br>user contact:'$contact'";
        
        $this->load->library('email');
        $this->email->from('avinash@wohlig.com', 'For Any Information Listing');
        $this->email->to($tolisting);
        $this->email->subject('User Details');
        $this->email->message($listingmsg);

        $this->email->send();

        echo $this->email->print_debugger();
    }
    
    //video
    
	function viewvideo()
	{
		$access = array("1");
		$this->checkaccess($access);
        $pagestart = $this->uri->segment(3, 0);        
        if($pagestart=="")
        {
            $pagestart=0;
        }
//        $config['per_page'] = 20; 
        $modelquery=$this->video_model->viewvideo($pagestart,$this->config->item("per_page"));
        
        $config['base_url'] = site_url().'/site/viewvideo/';
        $config['total_rows'] = $modelquery->totalcount;
        
        $this->pagination->initialize($config); 
		$data['table']=$modelquery->query;
		$data['page']='viewvideo';
		$data['title']='View video';
		$this->load->view('template',$data);
	}
    
	public function createvideo()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'page' ] = 'createvideo';
		$data[ 'title' ] = 'Create video';
		$this->load->view( 'template', $data );	
	}
    
	function createvideosubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('user','user','trim|required');
		$this->form_validation->set_rules('title','title','trim|required');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('location','location','trim');
		$this->form_validation->set_rules('lat','lat','trim');
		$this->form_validation->set_rules('long','long','trim');
		$this->form_validation->set_rules('rating','rating','trim');
		$this->form_validation->set_rules('videourl','videourl','trim');
		$this->form_validation->set_rules('status','status','trim');
		
		if($this->form_validation->run() == FALSE)	
		{
			$access = array("1");
            $this->checkaccess($access);
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'page' ] = 'createvideo';
            $data[ 'title' ] = 'Create video';
            $this->load->view( 'template', $data );		
		}
		else
		{
            $user=$this->input->post('user');
            $title=$this->input->post('title');
            $description=$this->input->post('description');
            $location=$this->input->post('location');
            $lat=$this->input->post('lat');
            $long=$this->input->post('long');
            $rating=$this->input->post('rating');
            $videourl=$this->input->post('videourl');
            $status=$this->input->post('status');
			if($this->video_model->createvideo($user,$title,$description,$location,$lat,$long,$rating,$videourl,$status)==0)
			$data['alerterror']="New video could not be created.";
			else
			$data['alertsuccess']="video created Successfully.";
			
			$data['table']=$this->video_model->viewvideo();
			$data['redirect']="site/viewvideo";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    function editvideo()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['before']=$this->video_model->beforeedit($this->input->get('id'));
		$data['page']='editvideo';
		$data['title']='Edit video';
		$this->load->view('template',$data);
	}
	function editvideosubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('user','user','trim|required');
		$this->form_validation->set_rules('title','title','trim|required');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('location','location','trim');
		$this->form_validation->set_rules('lat','lat','trim');
		$this->form_validation->set_rules('long','long','trim');
		$this->form_validation->set_rules('rating','rating','trim');
		$this->form_validation->set_rules('videourl','videourl','trim');
		$this->form_validation->set_rules('status','status','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data['before']=$this->video_model->beforeedit($this->input->get('id'));
            $data['page']='editvideo';
            $data['title']='Edit video';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
            $user=$this->input->post('user');
            $title=$this->input->post('title');
            $description=$this->input->post('description');
            $location=$this->input->post('location');
            $lat=$this->input->post('lat');
            $long=$this->input->post('long');
            $rating=$this->input->post('rating');
            $videourl=$this->input->post('videourl');
            $status=$this->input->post('status');
            
			if($this->video_model->editvideo($id,$user,$title,$description,$location,$lat,$long,$rating,$videourl,$status)==0)
			$data['alerterror']="video Editing was unsuccesful";
			else
			$data['alertsuccess']="video edited Successfully.";
			
			$data['redirect']="site/viewvideo";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
    
	function deletevideo()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->video_model->deletevideo($this->input->get('id'));
		$data['table']=$this->video_model->viewvideo();
		$data['alertsuccess']="video Deleted Successfully";
		$data['page']='viewvideo';
		$data['title']='View video';
		$this->load->view('template',$data);
	}
    
    
    //videotag
    
	function viewvideotag()
	{
		$access = array("1");
		$this->checkaccess($access);
        $pagestart = $this->uri->segment(3, 0);        
        if($pagestart=="")
        {
            $pagestart=0;
        }
//        $config['per_page'] = 20;
		$modelquery=$this->videotag_model->viewvideotag($pagestart,$this->config->item("per_page"));
//        $modelquery=$this->video_model->viewvideo($pagestart,$config['per_page']);
        
        $config['base_url'] = site_url().'/site/viewvideotag/';
        $config['total_rows'] = $modelquery->totalcount;
        
        $this->pagination->initialize($config); 
		$data['table']=$modelquery->query;
        
        
		$data['page']='viewvideotag';
		$data['title']='View videotag';
		$this->load->view('template',$data);
	}
    
	public function createvideotag()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'video' ] =$this->video_model->getvideodropdown();
		$data[ 'page' ] = 'createvideotag';
		$data[ 'title' ] = 'Create videotag';
		$this->load->view( 'template', $data );	
	}
    
	function createvideotagsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('video','video','trim|required');
		$this->form_validation->set_rules('tag','tag','trim|required');
		
		if($this->form_validation->run() == FALSE)	
		{
			$access = array("1");
            $this->checkaccess($access);
            $data[ 'video' ] =$this->video_model->getvideodropdown();
            $data[ 'page' ] = 'createvideotag';
            $data[ 'title' ] = 'Create videotag';
            $this->load->view( 'template', $data );	
		}
		else
		{
            $video=$this->input->post('video');
            $tag=$this->input->post('tag');
			if($this->videotag_model->createvideotag($video,$tag)==0)
			$data['alerterror']="New videotag could not be created.";
			else
			$data['alertsuccess']="videotag created Successfully.";
			
			$data['table']=$this->videotag_model->viewvideotag();
			$data['redirect']="site/viewvideotag";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    function editvideotag()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'video' ] =$this->video_model->getvideodropdown();
		$data['before']=$this->videotag_model->beforeedit($this->input->get('id'));
		$data['page']='editvideotag';
		$data['title']='Edit videotag';
		$this->load->view('template',$data);
	}
	function editvideotagsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('video','video','trim|required');
		$this->form_validation->set_rules('tag','tag','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'video' ] =$this->video_model->getvideodropdown();
            $data['before']=$this->videotag_model->beforeedit($this->input->get('id'));
            $data['page']='editvideotag';
            $data['title']='Edit videotag';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
            $video=$this->input->post('video');
            $tag=$this->input->post('tag');
            
			if($this->videotag_model->editvideotag($id,$video,$tag)==0)
			$data['alerterror']="videotag Editing was unsuccesful";
			else
			$data['alertsuccess']="videotag edited Successfully.";
			
			$data['redirect']="site/viewvideotag";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
    
	function deletevideotag()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->videotag_model->deletevideotag($this->input->get('id'));
		$data['table']=$this->videotag_model->viewvideotag();
		$data['alertsuccess']="videotag Deleted Successfully";
		$data['page']='viewvideotag';
		$data['title']='View videotag';
		$this->load->view('template',$data);
	}
    
    
    
    //videopart
    
	function viewvideopart()
	{
		$access = array("1");
		$this->checkaccess($access);
        $pagestart = $this->uri->segment(3, 0);        
        if($pagestart=="")
        {
            $pagestart=0;
        }
       
        $modelquery=$this->videopart_model->viewvideopart($pagestart,$this->config->item("per_page"));
        
        $config['base_url'] = site_url().'/site/viewvideopart/';
        $config['total_rows'] = $modelquery->totalcount;
        
        $this->pagination->initialize($config); 
		$data['table']=$modelquery->query;
		$data['page']='viewvideopart';
		$data['title']='View videopart';
		
        
        $this->load->view('template',$data);
	}
    
	public function createvideopart()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'video' ] =$this->video_model->getvideodropdown();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'page' ] = 'createvideopart';
		$data[ 'title' ] = 'Create videopart';
		$this->load->view( 'template', $data );	
	}
    
	function createvideopartsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('video','video','trim|required');
		$this->form_validation->set_rules('part','part','trim');
		$this->form_validation->set_rules('question','question','trim');
		$this->form_validation->set_rules('videourl','videourl','trim');
		$this->form_validation->set_rules('status','status','trim');
		
		if($this->form_validation->run() == FALSE)	
		{
			$access = array("1");
            $this->checkaccess($access);
            $data[ 'video' ] =$this->video_model->getvideodropdown();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'page' ] = 'createvideopart';
            $data[ 'title' ] = 'Create videopart';
            $this->load->view( 'template', $data );		
		}
		else
		{
            $video=$this->input->post('video');
            $part=$this->input->post('part');
            $question=$this->input->post('question');
            $videourl=$this->input->post('videourl');
            $status=$this->input->post('status');
            echo $videourl;
			if($this->videopart_model->createvideopart($video,$part,$question,$videourl,$status)==0)
			$data['alerterror']="New videopart could not be created.";
			else
			$data['alertsuccess']="videopart created Successfully.";
			
			$data['table']=$this->videopart_model->viewvideopart();
			$data['redirect']="site/viewvideopart";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    function editvideopart()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'video' ] =$this->video_model->getvideodropdown();
        $data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['before']=$this->videopart_model->beforeedit($this->input->get('id'));
		$data['page']='editvideopart';
		$data['title']='Edit videopart';
		$this->load->view('template',$data);
	}
	function editvideopartsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('video','video','trim|required');
		$this->form_validation->set_rules('part','part','trim');
		$this->form_validation->set_rules('question','question','trim');
		$this->form_validation->set_rules('videourl','videourl','trim');
		$this->form_validation->set_rules('status','status','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'video' ] =$this->video_model->getvideodropdown();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data['before']=$this->videopart_model->beforeedit($this->input->get('id'));
            $data['page']='editvideopart';
            $data['title']='Edit videopart';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
            $video=$this->input->post('video');
            $part=$this->input->post('part');
            $question=$this->input->post('question');
            $videourl=$this->input->post('videourl');
            $status=$this->input->post('status');
            
			if($this->videopart_model->editvideopart($id,$video,$part,$question,$videourl,$status)==0)
			$data['alerterror']="videopart Editing was unsuccesful";
			else
			$data['alertsuccess']="videopart edited Successfully.";
			
			$data['redirect']="site/viewvideopart";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
    
	function deletevideopart()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->videopart_model->deletevideopart($this->input->get('id'));
		$data['table']=$this->videopart_model->viewvideopart();
		$data['alertsuccess']="videopart Deleted Successfully";
		$data['page']='viewvideopart';
		$data['title']='View videopart';
		$this->load->view('template',$data);
	}
    
    //chat
    
    function viewchat()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewchat';
        $data['base_url'] = site_url("site/viewchatjson");
        
		$data['title']='View chat';
		$this->load->view('template',$data);
	} 
    function viewchatjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
//        SELECT  `retailer`.`id`, `retailer`.`area`, `retailer`.`dob`,`retailer`.`name`, `retailer`.`number`, `retailer`.`email`, `retailer`.`address`,`retailer`. `ownername`, `retailer`.`ownernumber`, `retailer`.`contactname`,`retailer`. `contactnumber`,`area`.`name` AS `areaname` FROM `retailer` LEFT OUTER JOIN `area` ON `area`.`id`=`retailer`.`area`
            
        
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`chat`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="User";
        $elements[1]->alias="username";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`chat`.`timestamp`";
        $elements[2]->sort="1";
        $elements[2]->header="Timestamp";
        $elements[2]->alias="timestamp";
        
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
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `chat` LEFT OUTER JOIN `user` ON `chat`.`user`=`user`.`id`");
        
		$this->load->view("json",$data);
	} 
    
    
	public function createchat()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
		$data[ 'page' ] = 'createchat';
		$data[ 'title' ] = 'Create chat';
		$this->load->view( 'template', $data );	
	}
   
	function createchatsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('user','user','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
			$data[ 'page' ] = 'createchat';
			$data[ 'title' ] = 'Create chat';
			$this->load->view('template',$data);
		}
		else
		{
			$user=$this->input->post('user');
			if($this->chat_model->createchat($user)==0)
			$data['alerterror']="New chat could not be created.";
			else
			$data['alertsuccess']="chat  created Successfully.";
//			$data['table']=$this->chat_model->viewchat();
			$data['redirect']="site/viewchat";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    function editchat()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->chat_model->beforeeditchat($this->input->get('id'));
        $data[ 'user' ] =$this->user_model->getuserdropdown();
		$data['page']='editchat';
		$data['title']='Edit chat';
		$data['page2']='block/chatblock';
		$this->load->view('templatewith2',$data);
	}
	function editchatsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('user','user','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->chat_model->beforeeditchat($this->input->post('id'));
            $data[ 'user' ] =$this->user_model->getuserdropdown();
			$data['page']='editchat';
			$data['title']='Edit chat';
            $data['page2']='block/chatblock';
            $this->load->view('templatewith2',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			
			if($this->chat_model->editchat($id,$name)==0)
			$data['alerterror']="chat Editing was unsuccesful";
			else
			$data['alertsuccess']="chat edited Successfully.";
			$data['redirect']="site/viewchat";
			$this->load->view("redirect",$data);
		}
	}
   
    function viewchatmessage()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->chat_model->viewchatmessage($this->input->get('id'));
		$data['page']='viewchatmessage';
		$data['title']='View Chat Messages';
		$this->load->view('template',$data);
	}
    
	public function createchatmessage()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'page' ] = 'createchatmessage';
		$data[ 'title' ] = 'Create chat Message';
		$this->load->view( 'template', $data );	
	}
   
	function createchatmessagesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('user','user','trim|required');
		$this->form_validation->set_rules('url','url','trim');
		$this->form_validation->set_rules('imageurl','imageurl','trim');
		$this->form_validation->set_rules('status','status','trim');
		$this->form_validation->set_rules('type','type','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'page' ] = 'createchatmessage';
            $data[ 'title' ] = 'Create chat Message';
            $this->load->view( 'template', $data );	
		}
		else
		{
			$user=$this->input->post('user');
			$chat=$this->input->post('chat');
			$url=$this->input->post('url');
			$imageurl=$this->input->post('imageurl');
			$status=$this->input->post('status');
			$type=$this->input->post('type');
			$json=$this->input->post('json');
			if($this->chat_model->createchatmessage($user,$chat,$url,$imageurl,$status,$type,$json)==0)
			$data['alerterror']="New chat could not be created.";
			else
			$data['alertsuccess']="chat  created Successfully.";
//			$data['table']=$this->chat_model->viewchat();
			$data['redirect']="site/viewchatmessage?id=".$chat;
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    
	function editchatmessage()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['beforechatmessage']=$this->chat_model->beforeeditchatmessage($this->input->get('chatmessageid'));
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['page']='editchatmessage';
		$data['title']='Edit chatmessage';
		$this->load->view('template',$data);
	}
    
	function editchatmessagesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('user','user','trim|required');
		$this->form_validation->set_rules('url','url','trim');
		$this->form_validation->set_rules('imageurl','imageurl','trim');
		$this->form_validation->set_rules('status','status','trim');
		$this->form_validation->set_rules('type','type','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['beforechatmessage']=$this->chat_model->beforeeditchatmessage($this->input->get_post('chatmessageid'));
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data['page']='editchatmessage';
            $data['title']='Edit chatmessage';
            $this->load->view('template',$data);
		}
		else
		{
			$chat=$this->input->post('chat');
			$chatmessageid=$this->input->post('chatmessageid');
			$user=$this->input->post('user');
//			$chat=$this->input->post('chat');
			$url=$this->input->post('url');
			$imageurl=$this->input->post('imageurl');
			$status=$this->input->post('status');
			$type=$this->input->post('type');
			$json=$this->input->post('json');
			if($this->chat_model->editchatmessage($chatmessageid,$user,$chat,$url,$imageurl,$status,$type,$json)==0)
			$data['alerterror']="chatmessage Editing was unsuccesful";
			else
			$data['alertsuccess']="chatmessage edited Successfully.";
			$data['redirect']="site/viewchatmessage?id=".$chat;
			$this->load->view("redirect",$data);
		}
	}
        
	function deletechat()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->chat_model->deletechat($this->input->get('id'));
		$data['redirect']="site/viewchat";
        //$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}  
	function deletechatmessage()
	{
		$access = array("1");
		$this->checkaccess($access);
        $chat=$this->input->get('id');
		$this->chat_model->deletechatmessage($this->input->get('chatmessageid'));
		$data['redirect']="site/viewchatmessage?id=".$chat;
        //$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
    
    //transcript
    
    function viewtranscript()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewtranscript';
        $data['base_url'] = site_url("site/viewtranscriptjson");
        
		$data['title']='View transcript';
		$this->load->view('template',$data);
	} 
    function viewtranscriptjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
//        SELECT  `retailer`.`id`, `retailer`.`area`, `retailer`.`dob`,`retailer`.`name`, `retailer`.`number`, `retailer`.`email`, `retailer`.`address`,`retailer`. `ownername`, `retailer`.`ownernumber`, `retailer`.`contactname`,`retailer`. `contactnumber`,`area`.`name` AS `areaname` FROM `retailer` LEFT OUTER JOIN `area` ON `area`.`id`=`retailer`.`area`
            
        
        
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
    
	public function createtranscript()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createtranscript';
		$data[ 'title' ] = 'Create Transcript';
		$this->load->view( 'template', $data );	
	}
   
	function createtranscriptsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('text','text','trim');
		$this->form_validation->set_rules('json','json','trim');
		$this->form_validation->set_rules('url','url','trim');
//		$this->form_validation->set_rules('category','category','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data['category']=$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createtranscript';
            $data[ 'title' ] = 'Create Transcript';
            $this->load->view( 'template', $data );	
		}
		else
		{
			$name=$this->input->post('name');
			$text=$this->input->post('text');
			$json=$this->input->post('json');
			$url=$this->input->post('url');
			$category=$this->input->post('category');
            
            
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
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            echo $image;
            
			if($this->transcript_model->createtranscript($name,$text,$url,$image,$json,$category)==0)
			$data['alerterror']="Transcript could not be created.";
			else
			$data['alertsuccess']="Transcript  created Successfully.";
//			$data['table']=$this->chat_model->viewchat();
			$data['redirect']="site/viewtranscript";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function edittranscript()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->transcript_model->beforeedittranscript($this->input->get('id'));
        $data['category']=$this->category_model->getcategorydropdown();
        $data['selectedcategory']=$this->transcript_model->getcategorybytranscript($this->input->get('id'));
		$data['page']='edittranscript';
		$data['title']='Edit transcript';
		$this->load->view('template',$data);
	}
    
	function edittranscriptsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('text','text','trim');
		$this->form_validation->set_rules('json','json','trim');
		$this->form_validation->set_rules('url','url','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->transcript_model->beforeedittranscript($this->input->get('id'));
            $data['category']=$this->category_model->getcategorydropdown();
            $data['selectedcategory']=$this->transcript_model->getcategorybytranscript($this->input->get('id'));
            $data['page']='edittranscript';
            $data['title']='Edit transcript';
            $this->load->view('template',$data);
		}
		else
		{
            
            $id=$this->input->get_post('id');
            
			$name=$this->input->post('name');
			$text=$this->input->post('text');
			$json=$this->input->post('json');
			$url=$this->input->post('url');
			$category=$this->input->post('category');
            
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
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->transcript_model->gettranscriptimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
			if($this->transcript_model->edittranscript($id,$name,$text,$url,$image,$json,$category)==0)
			$data['alerterror']="transcript Editing was unsuccesful";
			else
			$data['alertsuccess']="transcript edited Successfully.";
			
			$data['redirect']="site/viewtranscript";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
    //form
    
    function viewform()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewform';
        $data['base_url'] = site_url("site/viewformjson");
        
		$data['title']='View form';
		$this->load->view('template',$data);
	} 
    function viewformjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
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
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `form`");
        
		$this->load->view("json",$data);
	} 
    
	public function createform()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createform';
		$data[ 'title' ] = 'Create form';
		$this->load->view( 'template', $data );	
	}
   
	function createformsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createform';
			$data[ 'title' ] = 'Create form';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$json=$this->input->post('json');
			$category=$this->input->post('category');
			if($this->form_model->createform($name,$json,$category)==0)
			$data['alerterror']="New form could not be created.";
			else
			$data['alertsuccess']="form  created Successfully.";
//			$data['table']=$this->form_model->viewform();
			$data['redirect']="site/viewform";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function editform()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->form_model->beforeeditform($this->input->get('id'));
        $data['category']=$this->category_model->getcategorydropdown();
        $data['selectedcategory']=$this->form_model->getcategorybyform($this->input->get('id'));
		$data['page']='editform';
		$data['title']='Edit form';
		$this->load->view('template',$data);
	}
    
	function editformsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data['before']=$this->form_model->beforeeditform($this->input->get('id'));
            $data['category']=$this->category_model->getcategorydropdown();
            $data['selectedcategory']=$this->form_model->getcategorybyform($this->input->get('id'));
			$data['page']='editform';
			$data['title']='Edit form';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$json=$this->input->post('json');
			$category=$this->input->post('category');
			
			if($this->form_model->editform($id,$name,$json,$category)==0)
			$data['alerterror']="form Editing was unsuccesful";
			else
			$data['alertsuccess']="form edited Successfully.";
			$data['redirect']="site/viewform";
			$this->load->view("redirect",$data);
		}
	}
   
	function deleteform()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_model->deleteform($this->input->get('id'));
		$data['redirect']="site/viewform";
        //$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
    
    
     //order
    
    function vieworder()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='vieworder';
        $data['base_url'] = site_url("site/vieworderjson");
        
		$data['title']='View order';
		$this->load->view('template',$data);
	} 
    function vieworderjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
//        SELECT  `retailer`.`id`, `retailer`.`area`, `retailer`.`dob`,`retailer`.`name`, `retailer`.`number`, `retailer`.`email`, `retailer`.`address`,`retailer`. `ownername`, `retailer`.`ownernumber`, `retailer`.`contactname`,`retailer`. `contactnumber`,`area`.`name` AS `areaname` FROM `retailer` LEFT OUTER JOIN `area` ON `area`.`id`=`retailer`.`area`
            
        
        
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
        $elements[3]->field="`order`.`email`";
        $elements[3]->sort="1";
        $elements[3]->header="Email";
        $elements[3]->alias="email";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`order`.`timestamp`";
        $elements[4]->sort="1";
        $elements[4]->header="Timestamp";
        $elements[4]->alias="timestamp";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`orderstatus`.`name`";
        $elements[5]->sort="1";
        $elements[5]->header="Status";
        $elements[5]->alias="orderstatus";
        
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
        LEFT OUTER JOIN `user` ON `order`.`user`=`user`.`id` LEFT OUTER JOIN `orderstatus` ON `order`.`status`=`orderstatus`.`id`");
        
		$this->load->view("json",$data);
	} 
    
	public function createorder()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data[ 'status' ] =$this->order_model->getorderstatusdropdown();
		$data[ 'page' ] = 'createorder';
		$data[ 'title' ] = 'Create order';
		$this->load->view( 'template', $data );	
	}
    
	function createordersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('user','user','trim|required');
		$this->form_validation->set_rules('address1','address1','trim');
		$this->form_validation->set_rules('address2','address2','trim');
		$this->form_validation->set_rules('city','city','trim');
		$this->form_validation->set_rules('state','state','trim');
		$this->form_validation->set_rules('pincode','pincode','trim');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('contactno','contactno','trim');
		$this->form_validation->set_rules('country','country','trim');
		$this->form_validation->set_rules('shippingaddress1','shippingaddress1','trim');
		$this->form_validation->set_rules('shippingaddress2','shippingaddress2','trim');
		$this->form_validation->set_rules('shipcity','shipcity','trim');
		$this->form_validation->set_rules('shipstate','shipstate','trim');
		$this->form_validation->set_rules('shippingcode','shippingcode','trim');
		$this->form_validation->set_rules('shipcountry','shipcountry','trim');
		$this->form_validation->set_rules('trackingcode','trackingcode','trim');
		$this->form_validation->set_rules('shippingcharge','shippingcharge','trim');
		$this->form_validation->set_rules('shippingmethod','shippingmethod','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'status' ] =$this->order_model->getorderstatusdropdown();
            $data[ 'page' ] = 'createorder';
            $data[ 'title' ] = 'Create order';
            $this->load->view( 'template', $data );
		}
		else
		{
			$name=$this->input->post('name');
			$user=$this->input->post('user');
			$address1=$this->input->post('address1');
			$address2=$this->input->post('address2');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$pincode=$this->input->post('pincode');
			$email=$this->input->post('email');
			$contactno=$this->input->post('contactno');
			$country=$this->input->post('country');
			$shippingaddress1=$this->input->post('shippingaddress1');
			$shippingaddress2=$this->input->post('shippingaddress2');
			$shipcity=$this->input->post('shipcity');
			$shipstate=$this->input->post('shipstate');
			$shippingcode=$this->input->post('shippingcode');
			$shipcountry=$this->input->post('shipcountry');
			$trackingcode=$this->input->post('trackingcode');
			$shippingcharge=$this->input->post('shippingcharge');
			$shippingmethod=$this->input->post('shippingmethod');
			$status=$this->input->post('status');
			if($this->order_model->createorder($name,$user,$address1,$address2,$city,$state,$pincode,$email,$contactno,$country,$shippingaddress1,$shippingaddress2,$shipcity,$shipstate,$shippingcode,$shipcountry,$trackingcode,$shippingcharge,$shippingmethod,$status)==0)
			$data['alerterror']="New order could not be created.";
			else
			$data['alertsuccess']="order  created Successfully.";
//			$data['table']=$this->order_model->vieworder();
			$data['redirect']="site/vieworder";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function editorder()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->order_model->beforeeditorder($this->input->get('id'));
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data[ 'status' ] =$this->order_model->getorderstatusdropdown();
		$data['page']='editorder';
		$data['title']='Edit order';
		$data['page2']='block/orderblock';
		$this->load->view('templatewith2',$data);
	}
    
    
	function editordersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        $this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('user','user','trim|required');
		$this->form_validation->set_rules('address1','address1','trim');
		$this->form_validation->set_rules('address2','address2','trim');
		$this->form_validation->set_rules('city','city','trim');
		$this->form_validation->set_rules('state','state','trim');
		$this->form_validation->set_rules('pincode','pincode','trim');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('contactno','contactno','trim');
		$this->form_validation->set_rules('country','country','trim');
		$this->form_validation->set_rules('shippingaddress1','shippingaddress1','trim');
		$this->form_validation->set_rules('shippingaddress2','shippingaddress2','trim');
		$this->form_validation->set_rules('shipcity','shipcity','trim');
		$this->form_validation->set_rules('shipstate','shipstate','trim');
		$this->form_validation->set_rules('shippingcode','shippingcode','trim');
		$this->form_validation->set_rules('shipcountry','shipcountry','trim');
		$this->form_validation->set_rules('trackingcode','trackingcode','trim');
		$this->form_validation->set_rules('shippingcharge','shippingcharge','trim');
		$this->form_validation->set_rules('shippingmethod','shippingmethod','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->order_model->beforeeditorder($this->input->get_post('id'));
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'status' ] =$this->order_model->getorderstatusdropdown();
            $data['page']='editorder';
            $data['title']='Edit order';
            $data['page2']='block/orderblock';
            $this->load->view('templatewith2',$data);
		}
		else
		{
			$id=$this->input->post('id');
            $name=$this->input->post('name');
			$user=$this->input->post('user');
			$address1=$this->input->post('address1');
			$address2=$this->input->post('address2');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$pincode=$this->input->post('pincode');
			$email=$this->input->post('email');
			$contactno=$this->input->post('contactno');
			$country=$this->input->post('country');
			$shippingaddress1=$this->input->post('shippingaddress1');
			$shippingaddress2=$this->input->post('shippingaddress2');
			$shipcity=$this->input->post('shipcity');
			$shipstate=$this->input->post('shipstate');
			$shippingcode=$this->input->post('shippingcode');
			$shipcountry=$this->input->post('shipcountry');
			$trackingcode=$this->input->post('trackingcode');
			$shippingcharge=$this->input->post('shippingcharge');
			$shippingmethod=$this->input->post('shippingmethod');
			$status=$this->input->post('status');
			
			if($this->order_model->editorder($id,$name,$user,$address1,$address2,$city,$state,$pincode,$email,$contactno,$country,$shippingaddress1,$shippingaddress2,$shipcity,$shipstate,$shippingcode,$shipcountry,$trackingcode,$shippingcharge,$shippingmethod,$status)==0)
			$data['alerterror']="order Editing was unsuccesful";
			else
			$data['alertsuccess']="order edited Successfully.";
			$data['redirect']="site/vieworder";
			$this->load->view("redirect",$data);
		}
	}
   
    
	function deleteorder()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->order_model->deleteorder($this->input->get('id'));
		$data['redirect']="site/vieworder";
        //$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
    
    //orderitem
    
    function vieworderitems()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->order_model->vieworderitem($this->input->get('id'));
		$data['page']='vieworderitem';
		$data['title']='View Order Item';
		$this->load->view('template',$data);
	}
    
	public function createorderitem()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'product' ] =$this->product_model->getproductdropdown();
		$data[ 'page' ] = 'createorderitem';
		$data[ 'title' ] = 'Create Order Item';
		$this->load->view( 'template', $data );	
	}
    
    
	function createorderitemsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('product','product','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data[ 'product' ] =$this->product_model->getproductdropdown();
            $data[ 'page' ] = 'createorderitem';
            $data[ 'title' ] = 'Create Order Item';
            $this->load->view( 'template', $data );	
		}
		else
		{
			$product=$this->input->post('product');
			$orderid=$this->input->post('orderid');
			
			if($this->order_model->createorderitem($product,$orderid)==0)
			$data['alerterror']="New orderitem could not be created.";
			else
			$data['alertsuccess']="orderitem  created Successfully.";
//			$data['table']=$this->orderitem_model->viewchat();
			$data['redirect']="site/vieworderitems?id=".$orderid;
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    
	function editorderitem()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['beforeorderitem']=$this->order_model->beforeeditorderitem($this->input->get('orderitemid'));
        $data[ 'product' ] =$this->product_model->getproductdropdown();
		$data['page']='editorderitem';
		$data['title']='Edit orderitem';
		$this->load->view('template',$data);
	}
    
	function editorderitemsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('product','product','trim|required');
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['beforeorderitem']=$this->order_model->beforeeditorderitem($this->input->get_post('orderitemid'));
            $data[ 'product' ] =$this->product_model->getproductdropdown();
            $data['page']='editorderitem';
            $data['title']='Edit orderitem';
            $this->load->view('template',$data);
		}
		else
		{
			$orderid=$this->input->post('orderid');
			$orderitemid=$this->input->post('orderitemid');
			$product=$this->input->post('product');
			if($this->order_model->editorderitem($orderitemid,$orderid,$product)==0)
			$data['alerterror']="orderitem Editing was unsuccesful";
			else
			$data['alertsuccess']="orderitem edited Successfully.";
			$data['redirect']="site/vieworderitems?id=".$orderid;
			$this->load->view("redirect",$data);
		}
	}
        
    
	function deleteorderitem()
	{
		$access = array("1");
		$this->checkaccess($access);
        $orderid=$this->input->get('id');
		$this->order_model->deleteorderitem($this->input->get('orderitemid'));
		$data['redirect']="site/vieworderitems?id=".$orderid;
        //$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
    //product
    
    function viewproduct()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewproduct';
        $data['base_url'] = site_url("site/viewproductjson");
        
		$data['title']='View product';
		$this->load->view('template',$data);
	} 
    function viewproductjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
//        SELECT  `retailer`.`id`, `retailer`.`area`, `retailer`.`dob`,`retailer`.`name`, `retailer`.`number`, `retailer`.`email`, `retailer`.`address`,`retailer`. `ownername`, `retailer`.`ownernumber`, `retailer`.`contactname`,`retailer`. `contactnumber`,`area`.`name` AS `areaname` FROM `retailer` LEFT OUTER JOIN `area` ON `area`.`id`=`retailer`.`area`
            
        
        
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
    
	public function createproduct()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'category' ] =$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createproduct';
		$data[ 'title' ] = 'Create product';
		$this->load->view( 'template', $data );	
	}
    
	function createproductsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('type','type','trim');
		$this->form_validation->set_rules('url','url','trim');
		$this->form_validation->set_rules('price','price','trim');
		$this->form_validation->set_rules('json','json','trim');
		$this->form_validation->set_rules('usergenerated','usergenerated','trim');
		$this->form_validation->set_rules('productattributejson','productattributejson','trim');
		$this->form_validation->set_rules('details','details','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'page' ] = 'createorder';
            $data[ 'title' ] = 'Create order';
            $this->load->view( 'template', $data );
		}
		else
		{
			$name=$this->input->post('name');
			$type=$this->input->post('type');
			$url=$this->input->post('url');
			$price=$this->input->post('price');
			$json=$this->input->post('json');
			$usergenerated=$this->input->post('usergenerated');
			$productattributejson=$this->input->post('productattributejson');
			$details=$this->input->post('details');
			$category=$this->input->post('category');
			
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
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
			if($this->product_model->createproduct($name,$type,$url,$price,$json,$usergenerated,$productattributejson,$details,$image,$category)==0)
			$data['alerterror']="New product could not be created.";
			else
			$data['alertsuccess']="product  created Successfully.";
			$data['redirect']="site/viewproduct";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function editproduct()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->product_model->beforeeditproduct($this->input->get('id'));
        $data['category']=$this->category_model->getcategorydropdown();
        $data['selectedcategory']=$this->product_model->getcategorybyproduct($this->input->get('id'));
		$data['page']='editproduct';
		$data['title']='Edit product';
		$this->load->view('template',$data);
	}
    
    
	function editproductsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('type','type','trim');
		$this->form_validation->set_rules('url','url','trim');
		$this->form_validation->set_rules('price','price','trim');
		$this->form_validation->set_rules('json','json','trim');
		$this->form_validation->set_rules('usergenerated','usergenerated','trim');
		$this->form_validation->set_rules('productattributejson','productattributejson','trim');
		$this->form_validation->set_rules('details','details','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->product_model->beforeeditproduct($this->input->get_post('id'));
            $data['category']=$this->category_model->getcategorydropdown();
            $data['selectedcategory']=$this->product_model->getcategorybyproduct($this->input->get_post('id'));
            $data['page']='editproduct';
            $data['title']='Edit product';
            $this->load->view('template',$data);
		}
		else
		{
            
            $id=$this->input->get_post('id');
			$name=$this->input->post('name');
			$type=$this->input->post('type');
			$url=$this->input->post('url');
			$price=$this->input->post('price');
			$json=$this->input->post('json');
			$usergenerated=$this->input->post('usergenerated');
			$productattributejson=$this->input->post('productattributejson');
			$details=$this->input->post('details');
			$category=$this->input->post('category');
            
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
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->product_model->getproductimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
			if($this->product_model->editproduct($id,$name,$type,$url,$price,$json,$usergenerated,$productattributejson,$details,$image,$category)==0)
			$data['alerterror']="product Editing was unsuccesful";
			else
			$data['alertsuccess']="product edited Successfully.";
			
			$data['redirect']="site/viewproduct";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteproduct()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->product_model->deleteproduct($this->input->get('id'));
		$data['redirect']="site/viewproduct";
        //$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
    function chatpage()
	{
		$access = array("1");
		$data["page"]="chatpage";
        $data["title"]="Chat Page";
		$this->load->view("template",$data);
	}
}
?>