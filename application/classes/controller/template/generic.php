<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Template_Generic extends Controller_Template
{

	public $template = 'template/generic';

	/**
	 * The before() method is called before your controller action.
	 * In our template controller we override this method so that we can
	 * set up default values. These variables are then available to our
	 * controllers if they need to be modified.
	 */
	public function before()
	{
		parent::before();

		if ($this->auto_render)
		{
			// keep the last url if it's not home/language
			if(Request::current()->action() != 'language') {
				Session::instance()->set('controller', Request::current()->uri());
			}
			
			if (Auth::instance()->logged_in('participant'))
			{
				$this->template->loged = TRUE;
			}
			
			// Initialize empty values
			$this->template->title   = '';
			$this->template->content = '';
			
			$this->template->styles = array();
			$this->template->scripts = array(); 
		}
	}
	 
	/**
	 * The after() method is called after your controller action.
	 * In our template controller we override this method so that we can
	 * make any last minute modifications to the template before anything
	 * is rendered.
	 */
	public function after()
	{
		if ($this->auto_render)
		{
			$styles = array(
//				'assets/css/style.css' => 'screen',
//				'assets/css/easy-responsive-tabs.css' => 'screen',
//				'assets/css/slimmenu.css' => 'screen',
//				'assets/css/contentstyle.css' => 'screen',
			);

			$scripts = array(
//				'assets/js/jquery-1.8.2.min.js',
//				'assets/js/easyResponsiveTabs.js',
//				'assets/js/jquery.easing.1.3.js',
//				'assets/js/jquery.mousewheel.js',
//				'assets/js/jquery.contentcarousel.js',
			);
	
			$this->template->styles = array_merge( $this->template->styles, $styles );
			$this->template->scripts = array_merge( $this->template->scripts, $scripts );
		}
		parent::after();
	}
}