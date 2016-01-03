<?php
App::uses('AppModel', 'Model');

class Firearm extends AppModel {
/*
	public $actsAs = array('Search.Searchable');
	
	public $filterArgs = array(
		'searchdata'=>array('type' => 'like','field'=>array('Firearm.name'))
	);
*/
	public $hasAndBelongsToMany = array(

	);

}
