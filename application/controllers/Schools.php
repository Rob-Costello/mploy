<?php


class Schools extends CI_Controller
{

	public function __construct(){

		parent::__construct();
		$this->load->model('login');
		//$this->load->model('messages');
		$this->load->library('ion_auth');
		$this->load->model('Schools_model');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
        $this->perPage =1;
        $this->offset =0;
        $this->page=0;
	}


	function index($id=0)
	{

		$page = $id;
		$data['headings'] = ['Name','Address','Town','County','Postcode','phone_number','Type of Institution','Funding Model'];
		$this->load->library('pagination');
		$schools = new schools_model();

        $offset=$this->offset;
		if($page > 0){
			$offset = $this->page * $this->perPage;
		}

		$data['schools'] = $schools->get_schools(null, null, $this->perPage, $offset);

		$page = $this->page($data['schools'],'/schools',$this->perPage);
        $this->pagination->initialize($page);
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;
        if($data['pagination_end'] > $data['schools']['count']) {
            $data['pagination_end'] = $data['schools']['count'];
        }
        $data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Schools';
		$data['nav'] = 'schools';
		$this->load->view('pages/schools', $data);
	}





	function page($model,$baseurl,$perPage=1){

		$pagConfig['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$pagConfig['full_tag_close'] = '</ul>';
		$pagConfig['base_url'] = $baseurl;
		$pagConfig['total_rows'] = $model['count'];
		$pagConfig['per_page'] = $perPage;
		$pagConfig['num_tag_open'] = '<li class="paginate_button">';
		$pagConfig['num_tag_close'] = '</li>';
		$pagConfig['cur_tag_open'] = '<li class="paginate_button activePage">';
		$pagConfig['cur_tag_close'] = '</li>';
		$pagConfig['prev_link'] = 'Previous';
		$pagConfig['prev_tag_open'] = '<li class="paginate_button previous">';
		$pagConfig['prev_tag_close'] = '</li>';
		$pagConfig['next_link'] = 'Next';
		$pagConfig['next_tag_open'] = '<li class="paginate_button next">';
		$pagConfig['next_tag_close'] = '</li>';

	return $pagConfig;


	}

    function contacts(){

        $school= new schools_model();
        $header = ['name','position','phone','email'];
        $pretty=[];
        array_walk($header,function($item,$key) use(&$pretty){
            $pretty[] = ucwords(str_replace('_',' ',$item));
        });
        $data['fields']=$header;
        $data['table_header']=$pretty;
        $data['contacts'] = $school->get_contacts(null, null, $this->perPage, $this->offset);
        return $data;
    }

	function view($id){
        $data['contacts'] = $this->contacts();
	    $school= new schools_model();
        if(!empty($_POST)){
            $success = $school->update_school($id,$this->input->post());
            $data['message'] = "Information updated";
        }
		$data['table']= $school->get_school($id);
		$this->load->view('pages/schools_view',$data);

	}






}


