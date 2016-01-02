<?php
App::uses('AppModel', 'Model');
/**
 * FirearmsPackage Model
 *
 * @property Firearm $Firearm
 * @property Package $Package
 */
class FirearmsPackage extends AppModel {


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
		'Package' => array(
			'className' => 'Package',
			'foreignKey' => 'package_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
