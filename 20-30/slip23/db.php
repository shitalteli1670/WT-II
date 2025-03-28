$db['default'] = array(
    'dsn'	=> '',
    'hostname' => 'localhost',
    'username' => 'your_username',  // Replace with your PostgreSQL username
    'password' => '',  // Replace with your PostgreSQL password
    'database' => '',  // Replace with your PostgreSQL database name
    'dbdriver' => 'mysqli',  // Set to PostgreSQL
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
);
