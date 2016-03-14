<?php
App::uses('AppModel', 'Model');

class Description extends AppModel {

//	public $displayField = 'name';

public $belongsTo = array('Product');

}
