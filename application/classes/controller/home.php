<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Template_Generic {


	public function action_index()
	{
		$this->template->title = '::BOOK &amp; CARE::';
  		$this->template->content = View::factory('home');
	}
	
	public function action_language()
	{
		// requested language
		$lang = $this->request->param('id');

		// security
		if(!isset($lang) || empty($lang)) {
			$this->request->redirect('home');
		}
		
		if(!in_array($lang, Kohana::$config->load('clinic.language'))) {
			$lang = 'en';
		}
		
		Cookie::set('lang', $lang);
		I18n::lang($lang);

		$this->request->redirect(Session::instance()->get('controller'));
	}
	
}
