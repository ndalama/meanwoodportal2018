<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

$config['base_url'] = 'http://localhost/meanwoodportal2018/tickerr/';

$config['default']['hostname'] = 'localhost';

$config['default']['username'] = 'root';

$config['default']['password'] = 'root';

$config['default']['database'] = 'tickerr';

$config['default']['dbdriver'] = 'pdo';


$config['default']['dsn'] = 'mysql:dbname='.$config['default']['database'].';host='.$config['default']['hostname'];