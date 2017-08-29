<?php

define('DEFAULT_JOURNAL', 'sadh');
define('DEFAULT_VOLUME', '025');
define('DEFAULT_ISSUE', '01');
define('DEFAULT_PAGE', '0001-0010');

// db table names
define('METADATA_TABLE', 'article');
define('FORTHCOMING_TABLE', 'forthcoming');
define('FULLTEXT_TABLE', 'fulltextsearch');
define('FELLOW_TABLE', 'fellow');
define('ASSOCIATE_TABLE', 'associate');

// search settings
define('SEARCH_OPERAND', 'AND');

// user settings (login and registration)
define('SALT', 'ias');
define('REQUIRE_EMAIL_VALIDATION', True);//Set these values to True only
define('REQUIRE_RESET_PASSWORD', True);//if outbound mails can be sent from the server

// mailer settings
define('SERVICE_EMAIL', 'webadmin@ias.ac.in');
define('SERVICE_NAME', 'Indian Academy of Sciences');

?>
