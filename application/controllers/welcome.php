<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($sprite_info = null)
	{
		$this->load->helper('directory');
		
		$data = $this->config->item('system');
		
		if ($sprite_info != null && is_array($sprite_info)) {
			$data['sprite_info'] = $sprite_info;
		}
		
		$data['portfolio'] = array(
			'dstilesconstructioninc' => array(
				'href' => '#dstilesconstructioninc',
				'img' => '/portfolio/D Stiles Construction Inc/D Stiles Construction Inc.png',
				'title' => 'D. Stiles Construction, Inc.',
				'desc' => 'Single page design using HTML5, CSS, JavaScript and the jQuery BX-Slider Plug-in.',
				'tags' => 'design development',
				'link' => 'http://www.stilesconstructioninc.com',
				'img_dir' => '/portfolio/D Stiles Construction Inc',
				'imgs' => directory_map(FCPATH . '/portfolio/D Stiles Construction Inc')
			),
			'iridescentmoments' => array(
				'href' => '#iridescentmoments',
				'img' => '/portfolio/Iridescent Moments/Iridescent Moments - Home.png',
				'title' => 'Iridescent Moments Photography',
				'desc' => 'Minimalist design using CodeIgniter, PHP, HTML5, CSS, and JavaScript.',
				'tags' => 'design development',
				'link' => 'http://www.iridescentmoments.com',
				'img_dir' => '/portfolio/Iridescent Moments',
				'imgs' => directory_map(FCPATH . '/portfolio/Iridescent Moments')
			),
			'bestbuy-scheduling' => array(
				'href' => '#bestbuy-scheduling',
				'img' => '/portfolio/Best Buy/Scheduling/Best Buy - Scheduling.png',
				'title' => 'Best Buy: Scheduling',
				'desc' => 'Responsive design using CodeIgniter, PHP, HTML, CSS, and JavaScript.',
				'tags' => 'development management',
				'link' => 'https://scheduling.bestbuymobile.com',
				'img_dir' => '/portfolio/Best Buy/Scheduling',
				'imgs' => directory_map(FCPATH . '/portfolio/Best Buy/Scheduling')
			),
			'bestbuy-techsupport' => array(
				'href' => '#bestbuy-techsupport',
				'img' => '/portfolio/Best Buy/Tech Support/Tech Support Digital Sales.png',
				'title' => 'Best Buy: Tech Support',
				'desc' => 'Complete configurable solution developed with Java, Spring, & Websphere.',
				'tags' => 'development management',
				'link' => 'https://services.geeksquad.com/wps/portal/gsembeddedcontract?flow=gs&CID=SSGS',
				'img_dir' => '/portfolio/Best Buy/Tech Support',
				'imgs' => directory_map(FCPATH . '/portfolio/Best Buy/Tech Support')
			),
			'potestivo-palms' => array(
				'href' => '#potestivo-palms',
				'img' => '/portfolio/Potestivo/Home.png',
				'title' => 'Potestivo & Associates: PALMS',
				'desc' => 'Custom Intranet with several tools developed in PHP, HTML, CSS and JavaScript.',
				'tags' => 'design development',
				'link' => '',
				'img_dir' => '/portfolio/Potestivo',
				'imgs' => directory_map(FCPATH . '/portfolio/Potestivo')
			),
			'potestivo-website' => array(
				'href' => '#potestivo-website',
				'img' => '/portfolio/Potestivo/Potestivolaw.com/Potestivolaw.gif',
				'title' => 'Potestivo & Associates: Website',
				'desc' => 'Custom CMS (powered by PALMS) and developed in PHP, HTML, CSS and JavaScript.',
				'tags' => 'design development',
				'link' => '',
				'img_dir' => '/portfolio/Potestivo/Potestivolaw.com',
				'imgs' => directory_map(FCPATH . '/portfolio/Potestivo/Potestivolaw.com')
			)
		);
		
		$this->load->view('master', $data);
	}
	
	public function generate() {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'zip';
		$config['max_size']	= '2048';
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		
		$this->load->library('upload', $config);
		$this->load->helper('directory');
		$this->load->model('SpriteGenerator', 'SpriteGenerator');
		$post = $this->input->post();
		
		$result = $this->upload->do_upload('zipFile');
		
		if ($result) {
			$result = $this->upload->data();
			$full_path = $result['full_path'];
			$file_name = $result['file_name'];
			
			$zip = new ZipArchive();
			$result = $zip->open($full_path);
			$ts = strtotime('now');
			$output_path = "./temp/$ts/".$post['prefix']."sprite";
			$basename = substr($file_name, 0, strrpos($file_name, "."));
			mkdir("./temp/$ts", 0777);
			
			if ($result) {
				$zip->extractTO("./temp/$ts/$basename/");
				$zip->close();
				
				unlink("./uploads/$file_name");
				
				$map = directory_map("./temp/$ts/$basename/");
				
				$this->SpriteGenerator->init("./temp/$ts/$basename", $output_path, $post['format'], $post['direction'], $post['padding']);
				$images = $this->SpriteGenerator->generate();
				$this->index(array(
					'name' => $post['prefix']."sprite.".$post['format'],
					'path' => substr($output_path, 1) . "." . $post['format'],
					'size' => round(filesize($output_path.".".$post['format'])/1024),
					'images' => $images
				));
			} else {
				$this->index(array(), "./temp/$ts/".$post['prefix']."sprite.".$post['format']);
			}
		} else {
			$this->index(array());
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */