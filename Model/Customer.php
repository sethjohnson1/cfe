<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 * @property Order $Order
 */
class Customer extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Order' => array(
			'className' => 'Order',
			'joinTable' => 'customers_orders',
			'foreignKey' => 'customer_id',
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
