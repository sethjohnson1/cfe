<?php
App::uses('AppModel', 'Model');

class Firearm extends AppModel {

	public $actsAs = array('Search.Searchable');
	
	public $filterArgs = array(
		'searchdata'=>array('type' => 'like','field'=>array('Firearm.name'))
	);

	public $hasAndBelongsToMany = array(
		'Order' => array(
			'className' => 'Order',
			'joinTable' => 'firearms_orders',
			'foreignKey' => 'firearm_id',
			'associationForeignKey' => 'order_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Package' => array(
			'className' => 'Package',
			'joinTable' => 'firearms_packages',
			'foreignKey' => 'firearm_id',
			'associationForeignKey' => 'package_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
