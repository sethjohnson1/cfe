<?php
App::uses('AppModel', 'Model');
/**
 * FirearmsOrder Model
 *
 * @property Firearm $Firearm
 * @property Order $Order
 */
class FirearmsOrder extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Firearm' => array(
			'className' => 'Firearm',
			'foreignKey' => 'firearm_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
