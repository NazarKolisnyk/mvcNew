<?php

declare(strict_types=1);

const HOST = 'http://mvc';
const BASE_URL = '/';
const DB_HOST = 'mvc';

include_once('controller/Cache/Cache.php');
include_once('core/bootstrap.php');
include_once('core/arr.php');
include_once('core/DB.php');
include_once('core/system.php');
include_once('model/Statistics.php');
include_once('model/DbRole.php');
include_once('controller/Authorize/Restrict.php');
include_once('model/Messages.php');
include_once('model/Authorize.php');
include_once('model/DbPage.php');

