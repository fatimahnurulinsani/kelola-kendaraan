<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

	/*
	Oleh Arie Haryana
	file : web.php untuk aplikasi marion sam
	*/

	function index($offset = 0){
		$this->countervisitor();
		$data_setting = $this->blog_model->GetSetting()->result_array();
		$total_data = $this->blog_model->GetContentPublished()->result_array();
		$page_config = array(
			'per_page' => 2,
			'total_rows' => $total_data[0]['total'],
			'base_url' => base_url().'index.php/web/index/',
			'full_tag_open' => '<div class="pager clr">',
			'full_tag_close' => '</div>'
		);
		
		$this->pagination->initialize($page_config);
		
		$data = array(
			'links' => $this->pagination->create_links(),
			'recent_post' => $this->blog_model->GetProduct("order by rand() limit 5")->result_array(),
			'product' => $this->blog_model->GetProduct("group by id_product order by id_product desc limit 0,5")->result_array(),
			'slider' => $this->blog_model->GetSlider("group by id order by id asc limit 0,4")->result_array(),
			'leftnews' => $this->blog_model->GetContentBlog("group by kode_content order by kode_content desc limit 0,6")->result_array(),
			'deskripsi' => $data_setting[0]['deskripsi_blog'],
			'author' => 'Admin',
			'title' => $data_setting[0]['judul_blog'],
			//'facebook' => $data_setting[0]['facebook'],
			'fb_fans_page' => $data_setting[0]['facebook_fans_page'],	
			'twitter' => $data_setting[0]['twitter'],		
			'phone' => $data_setting[0]['phone'],
			'email' => $data_setting[0]['email'],
			'alamat' => $data_setting[0]['alamat']

		);

		$this->load->view('web/index',$data);
	}
	
	function send_mail()
	{
		//deklarasi isi form
		$emailPenerima = $this->input->post('email');
		$subjekEmail = $this->input->post('subject');
		$isiEmail = $this->input->post('message');
		$namaPengirim = $this->input->post('name');
		
		$this->load->library('email');	   
	    	$this->email->from('mhafizarifin@gmail.com', $namaPengirim);
		$this->email->to($emailPenerima);
		$this->email->subject($subjekEmail);
		$this->email->message($isiEmail);

	    if($this->email->send())
	    {
	      echo '<script type="text/javascript">
	      		alert("Email Sent.");
	      		window.location.href = document.referrer;
	      	    </script>
	      	    ';
	    }
	     else
	    {
	      echo '<script type="text/javascript">
	      		alert("Email Not Sent.");
	      		history.go(-1);
	      	    </script>';
	    }

	}
	
	function kategori($kode = -1,$offset = 0){
		$this->countervisitor();
		$data_setting = $this->blog_model->GetSetting()->result_array();
		$data_label = $this->blog_model->GetLabel("where kode_label = '$kode'")->result_array();
		
		$total_data = $this->blog_model->GetContentPublished("where content.status = 'publish' and content_label.kode_label = '$kode'")->result_array();
		$page_config = array(
			'per_page' => $data_setting[0]['limit_content'],
			'total_rows' => $total_data[0]['total'],
			'base_url' => base_url().'index.php/web/kategori/'.$kode,
			'full_tag_open' => '<div class="pager clr">',
			'full_tag_close' => '</div>'
		);
		
		$this->pagination->initialize($page_config);
		$data = array(
			'links' => $this->pagination->create_links(),
			'recent_post' => $this->blog_model->GetContent("where status = 'publish' order by rand() limit 5")->result_array(),
			'label' => $this->blog_model->GetLabel()->result_array(),
			'content' => $this->blog_model->GetContentBlog("where content.status = 'publish' and content_label.kode_label = '$kode' group by content.kode_content order by kode_content desc limit $offset,".$data_setting[0]['limit_content'])->result_array(),
			'deskripsi' => $data_setting[0]['deskripsi_blog'],
			'author' => 'Arie Haryana',
			'title' => $data_setting[0]['judul_blog'].' - kategori '.$data_label[0]['judul_label'],
			'facebook' => $data_setting[0]['facebook'],
			'fb_fans_page' => $data_setting[0]['facebook_fans_page'],	
			'twitter' => $data_setting[0]['twitter'],		
			'g_plus' => $data_setting[0]['g_plus'],
			'email' => $data_setting[0]['email']
		);

		$this->load->view('web/index',$data);
	}
	
	function detail($judul = '',$kode = 0){
		$this->countervisitor();
		$data_setting = $this->blog_model->GetSetting()->result_array();
		//$data_content =  $this->blog_model->GetContentDetail("where content.kode_content = '$kode'")->result_array();		
		$data_content =  $this->blog_model->GetContentBlog("where content.kode_content = '$kode'")->result_array();	

		$data = array(
			'recent_post' => $this->blog_model->GetContent("where status = 'publish' order by rand() limit 5")->result_array(),
			'content' => $data_content,
			'penulis' => $this->blog_model->GetUser("where nama_lengkap = '".$data_content[0]['penulis']."' limit 1")->result_array(),
			'deskripsi' => $data_setting[0]['deskripsi_blog'],
			'author' => 'Arie Haryana',
			'title' => $data_setting[0]['judul_blog'].'-'.$data_content[0]['judul_content'],
			'komentar' => $this->blog_model->GetComment("where komentar.kode_content = '$kode' and komentar.status = 'publish'")->result_array(),
			//'facebook' => $data_setting[0]['facebook'],
			'fb_fans_page' => $data_setting[0]['facebook_fans_page'],	
			'twitter' => $data_setting[0]['twitter'],		
			'phone' => $data_setting[0]['phone'],
			'email' => $data_setting[0]['email'],
			'alamat' => $data_setting[0]['alamat']
		);
		$this->cookiesetter($kode);
		$this->load->view('web/detail',$data);
	}

	function pages($pages = NULL){
		$offset = 0;
		$this->countervisitor();

		$data_setting = $this->blog_model->GetSetting()->result_array();
		//$data_content =  $this->blog_model->GetContentDetail("where content.kode_content = '$kode'")->result_array();	
		$data_pages =  $this->blog_model->GetPages("where pages = '$pages'")->result_array();	

		$data = array(
			'recent_post' => $this->blog_model->GetContent("where status = 'publish' order by rand() limit 5")->result_array(),
			'content' => $data_pages,
			//'penulis' => $this->blog_model->GetUser("where nama_lengkap = '".$data_content[0]['penulis']."' limit 1")->result_array(),
			'deskripsi' => $data_setting[0]['deskripsi_blog'],
			'author' => 'Arie Haryana',
			'title' => $data_pages[0]['pages'].' - '.$data_setting[0]['judul_blog'],
			//'komentar' => $this->blog_model->GetComment("where komentar.kode_content = '$kode' and komentar.status = 'publish'")->result_array(),
			//'facebook' => $data_setting[0]['facebook'],
			'fb_fans_page' => $data_setting[0]['facebook_fans_page'],	
			'twitter' => $data_setting[0]['twitter'],		
			'phone' => $data_setting[0]['phone'],
			'email' => $data_setting[0]['email'],
			'alamat' => $data_setting[0]['alamat']
		);

		//$this->cookiesetter($pages);

		$this->load->view('web/pages',$data);
	}


	function news($offset = 0){
		$this->countervisitor();
		$data_setting = $this->blog_model->GetSetting()->result_array();

		$total_data = $this->blog_model->GetContentPublished()->result_array();

		$page_config = array(
			'per_page' => $data_setting[0]['limit_content'],
			'total_rows' => $total_data[0]['total'],
			'base_url' => base_url().'index.php/web/news/',
			'full_tag_open' => '<div class="pager">',
			'full_tag_close' => '</div>'
		);
		
		$this->pagination->initialize($page_config);
		
		$data = array(
			'links' => $this->pagination->create_links(),
			'recent_post' => $this->blog_model->GetProduct("order by rand() limit 5")->result_array(),
			//'product' => $this->blog_model->GetProduct("group by id_product order by id_product desc limit 2")->result_array(),
			'news' => $this->blog_model->GetContentBlog("group by kode_content order by kode_content desc limit $offset,".$data_setting[0]['limit_content'])->result_array(),
			'deskripsi' => $data_setting[0]['deskripsi_blog'],
			'author' => 'Arie Haryana',
			'title' => $data_setting[0]['judul_blog'],
			//'facebook' => $data_setting[0]['facebook'],
			'fb_fans_page' => $data_setting[0]['facebook_fans_page'],	
			'twitter' => $data_setting[0]['twitter'],		
			'phone' => $data_setting[0]['phone'],
			'email' => $data_setting[0]['email'],
			'alamat' => $data_setting[0]['alamat']
		);

		$this->load->view('web/news',$data);
	}

	function product($offset = 0){
		$this->countervisitor();
		$data_setting = $this->blog_model->GetSetting()->result_array();

		$total_data = $this->blog_model->GetProductPublished()->result_array();

		$page_config = array(
			'per_page' => $data_setting[0]['limit_content'],
			'total_rows' => $total_data[0]['total'],
			'base_url' => base_url().'index.php/web/product/',
			'full_tag_open' => '<div class="pager">',
			'full_tag_close' => '</div>'
		);
		
		$this->pagination->initialize($page_config);
		
		$data = array(
			'links' => $this->pagination->create_links(),
			'recent_post' => $this->blog_model->GetProduct("order by rand() limit 5")->result_array(),
			'product' => $this->blog_model->GetProduct("group by id_product order by id_product desc limit $offset,".$data_setting[0]['limit_content'])->result_array(),
			//'news' => $this->blog_model->GetContentBlog("group by kode_content order by kode_content desc limit $offset,".$data_setting[0]['limit_content'])->result_array(),
			'deskripsi' => $data_setting[0]['deskripsi_blog'],
			'author' => 'Arie Haryana',
			'title' => $data_setting[0]['judul_blog'],
			//'facebook' => $data_setting[0]['facebook'],
			'fb_fans_page' => $data_setting[0]['facebook_fans_page'],	
			'twitter' => $data_setting[0]['twitter'],		
			'phone' => $data_setting[0]['phone'],
			'email' => $data_setting[0]['email'],
			'alamat' => $data_setting[0]['alamat']
		);

		$this->load->view('web/product',$data);
	}

	function detailprod($product = '', $id = 0){
		$offset = 0;
		
		$this->countervisitor();
		$data_setting = $this->blog_model->GetSetting()->result_array();
		//$data_content =  $this->blog_model->GetContentDetail("where content.kode_content = '$kode'")->result_array();		
		$data_content =  $this->blog_model->GetProduct("where id_product = '$id'")->result_array();	

		$data = array(
			'recent_post' => $this->blog_model->GetProduct("order by rand() limit 5")->result_array(),
			'content' => $data_content,
			//'penulis' => $this->blog_model->GetUser("where nama_lengkap = '".$data_content[0]['penulis']."' limit 1")->result_array(),
			'deskripsi' => $data_setting[0]['deskripsi_blog'],
			'author' => 'Arie Haryana',
			'title' => $data_content[0]['product'].' - '.$data_setting[0]['judul_blog'],
			//'komentar' => $this->blog_model->GetComment("where komentar.kode_content = '$kode' and komentar.status = 'publish'")->result_array(),
			//'facebook' => $data_setting[0]['facebook'],
			'fb_fans_page' => $data_setting[0]['facebook_fans_page'],	
			'twitter' => $data_setting[0]['twitter'],		
			'phone' => $data_setting[0]['phone'],
			'email' => $data_setting[0]['email'],
			'alamat' => $data_setting[0]['alamat']
		);
		$this->cookiesetter($id);
		$this->load->view('web/detail_product',$data);
	}
	
	function savecomment(){
		if($_POST){
			$data = array(
				'kode_content' => $_POST['kode_content'],
				'isi' => htmlentities($_POST['isi_comment']),
				'status' => 'pending',
				'pengirim' => htmlentities($_POST["name"]),
				'website' => htmlentities($_POST["website"]),
				'email' => htmlentities($_POST["email"]),
				'tanggal' => date("Y-m-d H:i:s")
			);
			$result = $this->blog_model->InsertData('komentar',$data);
			if($result == 1){
				echo "1";
			}else{
				echo "0";
			}
		}else{
			echo "<h2>Access Denied !!</h2>";
		}
	}
	
	function ajaxcaptcha($kode = 0){
		$vals = array(
			'img_path' => 'captcha/',
			'img_url' => base_url().'captcha/',
			'font_path' => 'system/font/texb.ttf',
			'img_width' => 200,
			'img_height' => 60,
			'expiration' => 90
		);
		
		$cap = create_captcha($vals);
		$data = array(
			'captcha_time' => $cap['time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
		);
		$expiration = time()-90;
		$this->db->query("delete from captcha where captcha_time < ".$expiration);
		$this->blog_model->InsertData('captcha',$data);
		$this->load->view('web/form_komentar',array('kode_content' => $kode,'image' => $cap['image']));
	}
	
	function validasicaptcha(){
		if($_POST){
			$expiration = time()-90;
			$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
			
			$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
			$binds = array($_POST['text_user'], $this->input->ip_address(), $expiration);
			$query = $this->db->query($sql, $binds);
			$row = $query->row();

			if ($row->count == 0){
				echo "0";
			}else{
				echo "1";
			}
		}else{
			echo "<H2>Access Denied !!</H2>";
		}
	}
	
	function contact(){
		$this->countervisitor();
		$data_setting = $this->blog_model->GetSetting()->result_array();
		$data = array(
			'recent_post' => $this->blog_model->GetContent("where status = 'publish' order by rand() limit 5")->result_array(),
			'deskripsi' => $data_setting[0]['deskripsi_blog'],
			'author' => 'Arie Haryana',
			'title' => $data_setting[0]['judul_blog'].' - Contact',
			//'facebook' => $data_setting[0]['facebook'],
			'fb_fans_page' => $data_setting[0]['facebook_fans_page'],	
			'twitter' => $data_setting[0]['twitter'],		
			'phone' => $data_setting[0]['phone'],
			'email' => $data_setting[0]['email'],
			'alamat' => $data_setting[0]['alamat']
		);
		$this->load->view('web/contact',$data);
	}
	
	private function cookiesetter($kode = 0){
		$offset = 0;
		if(!isset($_COOKIE[$kode])){
			$content = $this->blog_model->GetContent("where kode_content = '$kode'")->result_array();
			$result = $this->blog_model->UpdateData('content',array('counter' => ($content[0]['counter']+1)),array('kode_content'=>$kode));
			if($result == 1){
				setcookie($kode,"marionsam.com", time()+3600);
			}
		}
	}
	
	private function countervisitor(){
		if($this->agent->is_browser()){
			$agent = $this->agent->browser().' '.$this->agent->version();
		}elseif ($this->agent->is_robot()){
			$agent = $this->agent->robot();
		}elseif ($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}else{
			$agent = 'Unidentified User Agent';
		}
		
		$data_visitor = $this->blog_model->GetVisitor("where ip = '".$_SERVER['REMOTE_ADDR']."'")->result_array();
		if($data_visitor == NULL){
			$data = array(
				'ip' => $_SERVER['REMOTE_ADDR'],
				'os' => $this->agent->platform(),
				'browser' => $agent,
				'tanggal' => date("Y-m-d H:i:s")
			);
			$this->blog_model->InsertData('visitor',$data);
			$this->session->set_userdata('marion_sam_com',"Arie Haryana");
			setcookie("marion_sam_com",'Arie Haryana', time()+3600*24);
		}else{
			if(!isset($_COOKIE['marion_sam_com'])){
				$data_visitor = $this->blog_model->GetVisitor("where ip = '".$_SERVER['REMOTE_ADDR']."' and tanggal = '".date("Y-m-d H:i:s")."'");
				if($data_visitor != NULL){
					if(!$this->session->userdata('marionsam.com')){
						$data = array(
							'ip' => $_SERVER['REMOTE_ADDR'],
							'os' => $this->agent->platform(),
							'browser' => $agent,
							'tanggal' => date("Y-m-d H:i:s")
						);
						$this->blog_model->InsertData('visitor', $data);
						$this->session->set_userdata('marion_sam_com',"Arie Haryana");
						setcookie("marion_sam_com",'Arie Haryana', time()+3600*24);
					}else{
						setcookie("marion_sam_com",'Arie Haryana', time()+3600*24);
					}
				}else{
					$data = array(
							'ip' => $_SERVER['REMOTE_ADDR'],
							'os' => $this->agent->platform(),
							'browser' => $agent,
							'tanggal' => date("Y-m-d H:i:s")
					);
					$this->blog_model->InsertData('visitor', $data);
					$this->session->set_userdata('marion_sam_com',"Arie Haryana");
					setcookie("marion_sam_com",'Arie Haryana', time()+3600*24);
				}
			}
		}
	}
}
