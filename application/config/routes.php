<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['story/read/(:any)'] = 'story/stories/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
