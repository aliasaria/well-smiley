<?php


#=============================
# USE_VALIDATION
# 
# if set to true, a function is run (in validation.php)
# to ensure that that the click that came in to give feedback
# isn't from a hacked URL (otherwise people could spam the system
#=============================

define('USE_VALIDATION', true);


#=============================
# VALIDATION_SALT
# 
# a salt number used in the validation function
#=============================
define('VALIDATION_SALT', 'salt2342352');



#=============================
# CUSTOMER SERVICE NICKNAMES
# 
# use this map to convert customer service
# ids to alternate nicknames
#=============================
$nicknames['29'] = 'Katie';
$nicknames['2']  = 'Jenessa';
$nicknames['5']  = 'Ali';
$nicknames['30'] = 'Jim';





#=============================
# AUTH for report.php
# 
#=============================
define('REPORT_USER_NAME', 'admin');
define('REPORT_PASSWORD', 'password');


?>