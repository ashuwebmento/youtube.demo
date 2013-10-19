<?php defined('SYSPATH') or die('No direct access allowed.');

return array(
	'encrypt_key' => 'fjdsjkfdskjfurew', 
	'cookie_salt' => 'fjsdijeihrewhbfsugfuyegwufewgwb',
	'cookie_lifetime' => DATE::YEAR,
	'session_lifetime' => 0,
	'header' => array
	(
		'title' => '::BOOK &amp; CARE::',
		'keyword' => '::BOOK &amp; CARE::',
	),
	'language' => array
	(
			'en',
			'fr',
			'jp',
	),
	'account'	=> array
	(
		'create'	=> array
		(
			'username'	=> array
			(
				'min_length'	=> 2,
				'max_length'	=> 12,
				'format'		=> 'alpha_numeric', // alpha_dash, alpha
			),
			'password'	=> array
			(
				'min_length'	=> 6,
			),
			'postcode'	=> array
			(
				'min_length'	=> 6,
				'max_length'	=> 6,
				'format'		=> 'numeric', // alpha_dash, alpha
			),
		),
	),
);
