<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vhmake extends CI_Controller { 
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Doctor_model');
		
		if(($this->session->userdata('loginUser')!=''))
		{
			
			//redirect('/');
		}
		else
		{
			redirect('login');
		}
	}
	
	public function index()
	{
		$data['breadcomeName']='DashBoard';
		$this->load->view('includes/header',$data);
		$this->load->view('includes/leftmenu');		
		$this->load->view('vhmake',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM vehicle_make_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Vhmake');
	}
	public function save()
	{
		try 
		{
		$insertData  = array(	 				 
                     'vehicle_make' => $_POST['vehicle_make'],
					 'status' => 1
					);
					
		$insert = $this->db->insert('vehicle_make_masters',$insertData);
		
		if (!$insert) {
			$error = $this->db->error();
			if($error['code'] == 1062)
			{
   $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record already exists!</b></h4></div>');
			}
} else {
   //other logics here
   $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been updated Sucessfully !</b></h4></div>');
}


		
		redirect('Vhmake');
		}
		catch(Exception $e)
		{
		}
	}
	
	
		  public function allPosts()
    {
        
       $request = $this->input->post();
	   
	   //if(isset($request['columns']['1']))
	   //{
	   //print("<pre>");
	   //print_r($request['columns']['1']['search']['value']);
	   //die;
	  // }
       
       //print_r($request['search']['value']);//die;
        $columns = array( 
                            0 =>'vehicle_make', 
                            1 =>'status',
                          
                        );
                        
            
        $sql = "select count(*) as  cnt  from vehicle_make_masters where 1 ";
        $rcont = $this->db->query($sql)->row_array();
        $totalData = $rcont["cnt"];// 14;//Visitors::count();
            
        $totalFiltered = $totalData; 

        $limit = $request["length"];//$request->input('length');
        $start = $request["start"];//$request->input('start');
        $order = $columns[$request["order.0.column"]];;//$columns[$request->input('order.0.column')];
        $dir = $request["order.0.dir"];//$request->input('order.0.dir');
        if($request['order.0.column'] ==0 )
        {
            $order = 'id';
            $dir = 'DESC';
        }
        //if(empty($request['search']['value']))
		if(empty($request['columns']['1']['search']['value']))	
        {            
            /*$posts = Visitors::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();*/
                         
                         
        $sql = "select * from vehicle_make_masters where 1 order by id desc  limit $start , $limit ";
	    $posts = $this->db->query($sql)->result_array();
        }
        else {
		$search = $request['columns']['1']['search']['value'];//$request['search']['value'];//$request->input('search.value'); 

            /*$posts =  Visitors::where('ip','LIKE',"%{$search}%")
                            ->orWhere('city', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
                            
            

            $totalFiltered = Visitors::where('ip','LIKE',"%{$search}%")
                             ->orWhere('city', 'LIKE',"%{$search}%")
                             ->count();
                             */
                             
             $sql = "select * from vehicle_make_masters where   vehicle_make like '%".$search."%' order by id desc  limit $start , $limit ";
	        $posts = $this->db->query($sql)->result_array();
	        
	        
	         $sql = "select count(*) as  cnt  from vehicle_make_masters where  vehicle_make like '%".$search."%' ";
            $rcont = $this->db->query($sql)->row_array();
            $totalFiltered = $rcont["cnt"];// 14;//Visitors::count();
        
        
        
        }

        $data = array();
       
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $show = "";// route('posts.show',$post->id);
                $edit =  "";//route('posts.edit',$post->id);

                $nestedData['id'] = $post["id"];
                $nestedData['status'] = $post["status"]==1?'Active':'Inactive';
                $nestedData['vehicle_make'] = $post["vehicle_make"];
                //$nestedData['icpp'] = $post["icpp"];
                //$nestedData['searchvalue'] = $search;
               
              /*$edit = '';//$this->config->config['base_url']."Clientpatients/edit/".$post["id"];
              
              $delete = $this->config->config['base_url']."Clientpatients/status/".$post["id"];
                $nestedData['options'] = "<a href='".$edit."' title='EDIT' ><span class='glyphicon glyphicon-pencil'></span></a>&nbsp;&nbsp;&nbsp;
                                          <a href='".$delete."' onclick='return confirm(\"Are you sure want to Delete?\")' title='DELETE' style='color:red' ><span class='glyphicon glyphicon-trash'></span></a>";
										  */
				 $delete = $this->config->config['base_url']."Vhmake/delete/".$post["id"];
				 
				 
				 $nestedData['options'] = "<a href='".$delete."' onclick='return confirm(\"Are you sure want to Delete?\")' title='DELETE' style='color:red' ><span class='glyphicon glyphicon-trash'></span></a>";					  
										  
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($request['draw']),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
        
    }
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */