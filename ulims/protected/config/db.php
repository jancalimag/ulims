<?php

return array(
	'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=ulimsportal',
			'emulatePrepare' => true,
			'username' => 'adm-0808',
			'password' => 'DostRegion9',
			'charset' => 'utf8',
			//'tablePrefix' => '',
		),

		'ulimsDb'=>array(
			'connectionString'=>'mysql:host=localhost;dbname=ulimslab',
			'username' => 'adm-0808',
			'password' => 'DostRegion9',
			'class'=>'CDbConnection',
			'charset' => 'utf8',
		),

		'referralDb'=>array(
			'connectionString'=>'mysql:host=localhost;dbname=onelabdb',
			'username' => 'adm-0808',
			'password' => 'DostRegion9',
			'class'=>'CDbConnection',
			'charset' => 'utf8',
		),

		'cashierDb'=>array(
			'connectionString'=>'mysql:host=localhost;dbname=ulimscashiering',
			'username' => 'adm-0808',
			'password' => 'DostRegion9',
			'class'=>'CDbConnection',
			'charset' => 'utf8',
		),

		'accountingDb'=>array(
			'connectionString'=>'mysql:host=localhost;dbname=ulimsaccounting',
			'username' => 'adm-0808',
			'password' => 'DostRegion9',
			'class'=>'CDbConnection',
			'charset' => 'utf8',
		),

		'phAddressDb'=>array(
			'connectionString'=>'mysql:host=localhost;dbname=phaddress',
			'username' => 'adm-0808',
			'password' => 'DostRegion9',
			'class'=>'CDbConnection',
			'charset' => 'utf8'
		),

		'information_schema'=>array(
			'connectionString'=>'mysql:host=localhost;dbname=information_schema',
			'username' => 'adm-0808',
			'password' => 'DostRegion9',
			'class'=>'CDbConnection',
			'charset' => 'utf8'
		),
);
