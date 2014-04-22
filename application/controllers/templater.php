<?php

class Templater extends CI_Controller {

	var $posts_per_page,
	$title_sep = ' | ',
	$default_taxonomy = 'category',
	$is_install;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('query');
		$this->load->library('template');
		$this->load->helper(array('template', 'query', 'url'));

		$this->is_install = $this->config->get('is_install');

		if( ! $this->is_install && uri_string() != "admin/install")
			redirect_admin('install');

		$this->posts_per_page = $this->config->get('posts_per_page');
		$this->posts_per_page_category = 6;
		$this->posts_per_page_author = 6;
	}

	public function index($page = NULL)
	{
		if($page === NULL) 
			$page = 1;

		$posts_per_page = $this->posts_per_page;
		$offset = ($page - 1) * $posts_per_page;
		$posts_count = $this->query->get_posts_number(array('post_status' => 'publish'));

		$data['title'] = $this->config->get('sitename');

		$data['posts'] = $this->query->get_posts(
			array(
		        'order' => 'DESC',
		        'orderby' => 'post_date',
				'offset' => $offset
			)
		);
		$data['page'] = $page;
		$data['pagi'] = $this->_pagination(array('total_rows' => $posts_count));

		if($this->template->get('home', $data) === FALSE)
			show_404_page(); //$this->template->get('index', $data);
	}

	public function post($id = NULL)
	{
		$post = $this->query->get_post($id);

		if($id === NULL || ! $post)
		{
			show_404_page();
		}
		else
		{
			$data['title'] = $post->post_title . $this->title_sep . $this->config->get('sitename');
			$data['post'] = $post;

			if($this->template->get('post', $data) === FALSE)
				show_404_page(); //$this->template->get('index', $data);
		}
	}

	public function category($term_id = NULL, $page = NULL)
	{
		$this->load->model('query_tax');

		$taxonomy = $this->default_taxonomy;
		$term = $this->query_tax->term_exists($term_id, $taxonomy, 'term_id');

		if($term_id === NULL || ! $term) 
		{
			show_404_page();
		}
		else
		{
			if($page === NULL) 
				$page = 1;

			$posts_per_page = $this->posts_per_page_category;
			$offset = ($page - 1) * $posts_per_page;
			$term_ids = array($term_id);
			$posts_count = $this->query->get_posts_number(array('category' => $term_ids));
			$data['posts'] = $this->query->get_posts(
				array(
					'numberposts' => $posts_per_page,
					'category' => $term_ids,
			        'order' => 'DESC',
			        'orderby' => 'post_date',
					'offset' => $offset
				)
			);
			$data['term'] = $term;
			$data['title'] = $term->name . $this->title_sep . $this->config->get('sitename');
			$data['page'] = $page;
			$data['pagi'] = $this->_pagination(array(
				'total_rows' => $posts_count,
				'uri_segment' => 3,
				'per_page' => $posts_per_page,
				'base_url' => site_url('category/' . $term_id)
				)
			);

			if($this->template->get('category', $data) === FALSE)
				$this->template->get('index', $data);
		}
	}

	public function author($user_id = NULL, $page = NULL)
	{
		if($user_id === NULL) 
			$user_id = 1;
		if($page === NULL) 
			$page = 1;

		$user = get_user($user_id);
		$posts_per_page = $this->posts_per_page_author;
		$offset = ($page - 1) * $posts_per_page;
		$posts_count = $this->query->get_user_posts_number($user_id);
		$data['posts'] = $this->query->get_posts(
			array(
				'numberposts' => $posts_per_page,
				'post_author' => $user_id,
		        'order' => 'DESC',
		        'orderby' => 'post_date',
				'offset' => $offset
			)
		);
		$data['user'] = $user;
		$data['title'] = 'Архив автора ' . $user->user_login . $this->title_sep . $this->config->get('sitename');
		$data['page'] = $page;
		$data['pagi'] = $this->_pagination(array(
			'total_rows' => $posts_count,
			'uri_segment' => 3,
			'per_page' => $posts_per_page,
			'base_url' => site_url('author/' . $user_id)
			)
		);

		if($this->template->get('author', $data) === FALSE)
			$this->template->get('index', $data);
	}

	private function _pagination($pagi_config = array())
	{
		$this->load->library('pagination');
		
		$defaults = array(
	        'uri_segment' => 1,
			'base_url' => site_url(),
			'per_page' => $this->posts_per_page,
			'use_page_numbers' => TRUE
	    );
	    $r = pars_args($pagi_config, $defaults);

		$this->pagination->initialize($r);

		return $this->pagination->create_links();
	}
}