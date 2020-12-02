<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pixabay extends CI_Controller {
	public function index()
	{
		$search_type=$this->input->get('search_type');
		$searchvalue=$this->input->get('searchvalue');

		if($search_type=='photo' ){
			if($searchvalue){
				$json = file_get_contents("https://pixabay.com/api/?key=19343160-436f9078207135509031dcad7&q=$searchvalue&image_type=photo&pretty=true");
	        $obj = json_decode($json);
	        $data['image_url']=$obj->hits;
			}
		}elseif($search_type=='video'){
			if($searchvalue){
				$json1 = file_get_contents("https://pixabay.com/api/videos/?key=19343160-436f9078207135509031dcad7&q=$searchvalue&pretty=true");
	        $obj1 = json_decode($json1);
	        $data['video_url']=$obj1->hits;
			}
		}else{
			$json = file_get_contents("https://pixabay.com/api/?key=19343160-436f9078207135509031dcad7&q=&image_type=photo&pretty=true");
	        $obj = json_decode($json);
	        $data['image_url']=$obj->hits;

	        $json1 = file_get_contents("https://pixabay.com/api/videos/?key=19343160-436f9078207135509031dcad7&q=&pretty=true");
	        $obj1 = json_decode($json1);
	        $data['video_url']=$obj1->hits;
		}
		
        
         // echo $video_url;
		 $this->load->view('pixabay',$data);
	}
	

}
