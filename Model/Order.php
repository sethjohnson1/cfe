<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 * @property Customer $Customer
 * @property Firearm $Firearm
 * @property Package $Package
 */
class Order extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Customer' => array(
			'className' => 'Customer',
			'joinTable' => 'customers_orders',
			'foreignKey' => 'order_id',
			'associationForeignKey' => 'customer_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Firearm' => array(
			'className' => 'Firearm',
			'joinTable' => 'firearms_orders',
			'foreignKey' => 'order_id',
			'associationForeignKey' => 'firearm_id',
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
			'joinTable' => 'orders_packages',
			'foreignKey' => 'order_id',
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
