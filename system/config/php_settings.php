<?php

date_default_timezone_set('Europe/Madrid');

ini_set('display_errors', 'On');
ini_set("log_errors", 1);
ini_set('session.gc-maxlifetime', Config::get("session_frontend_time")); //4h

/*
magic_quotes_gpc = Off
register_globals = Off
default_charset = UTF-8
memory_limit = 64M
max_execution_time = 36000
upload_max_filesize = 999M
safe_mode = Off
mysql.connect_timeout = 20
session.auto_start = Off
session.use_only_cookies = On
session.use_cookies = On
session.use_trans_sid = Off
session.cookie_httponly = On
session.cookie_lifetime = 3600
session.gc_maxlifetime = 3600
allow_url_fopen = On
;display_errors = 1
;error_reporting = E_ALL
*/

/*
# 1. If your cart only allows you to add one item at a time, it is possible register_globals is on. This may work to disable it:
# php_flag register_globals off

# 2. If your cart has magic quotes enabled, This may work to disable it:
# php_flag magic_quotes_gpc Off

# 3. Set max upload file size. Most hosts will limit this and not allow it to be overridden but you can try
# php_value upload_max_filesize 999M

# 4. set max post size. uncomment this line if you have a lot of product options or are getting errors where forms are not saving all fields
# php_value post_max_size 999M

# 5. set max time script can take. uncomment this line if you have a lot of product options or are getting errors where forms are not saving all fields
# php_value max_execution_time 200

# 6. set max time for input to be recieved. Uncomment this line if you have a lot of product options or are getting errors where forms are not saving all fields
# php_value max_input_time 200

# 7. disable open_basedir limitations
# php_admin_value open_basedir none
*/