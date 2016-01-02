<?php
App::uses('AppModel', 'Model');
/**
 * Package Model
 *
 * @property Firearm $Firearm
 * @property Order $Order
 */
class Package extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Firearm' => array(
			'className' => 'Firearm',
			'joinTable' => 'firearms_packages',
			'foreignKey' => 'package_id',
			'associationForeignKey' => 'firearm_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Order' => array(
			'className' => 'Order',
			'joinTable' => 'orders_packages',
			'foreignKey' => 'package_id',
			'associationForeignKey' => 'order_id',
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
