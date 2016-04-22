<?php
App::uses('AppModel', 'Model');

class Description extends AppModel {

//	public $displayField = 'name';
public $actsAs = array('Containable');
public $belongsTo = array('Product'=>array(
//'foreignKey'=>'SessionTypeID'
));

}
