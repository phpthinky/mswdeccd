<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//modular base routing
$route['nutricare/center'] = 'centers/index';
$route['nutricare/center/add'] = 'centers/add';

$route['nutricare/workers'] = 'workers/index';
$route['nutricare/workers/profile/(:any)'] = 'workers/profile/$1';
$route['nutricare/workers/add'] = 'workers/add';


$route['nutricare/pupils'] = 'pupils/index';

$route['nutricare-pupils-profile/(:any)'] = 'pupils/profile/$1';
$route['nutricare-pupils-update/(:any)'] = 'pupils/uprofile/$1';
$route['nutricare-pupils-add'] = 'pupils/add';
$route['nutricare-pupils-save'] = 'pupils/call_submit';

$route['nutricare-weighing'] = 'weighing/index';




$route['iassess/pupils'] = 'pupils2/index';
$route['iassess/pupils/profile/(:any)'] = 'pupils2/profile/$1';
$route['iassess/workers'] = 'workers2/index';
$route['iassess/center'] = 'centers2/index';



$route['iassess/center'] = 'centers/index';
$route['iassess/center/add'] = 'centers/add';

$route['iassess/workers'] = 'workers/index';
$route['iassess/workers/profile/(:any)'] = 'workers/profile/$1';
$route['iassess/workers/add'] = 'workers/add';
$route['iassess/workers/remove'] = 'workers/removeuser';