<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'mysql2318ae62752e.rds.ibytepluses.com';
$CFG->dbname    = 'moodle';
$CFG->dbuser    = 'moodle';
$CFG->dbpass    = 'Moodle123#';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_unicode_ci',
);

// Redis cache configuration.
$CFG->session_handler_class = '\core\session\redis';
$CFG->session_redis_host = 'redis-mlynpi92buk1s5cya.redis.ibytepluses.com';          // Hostname service Redis (sesuai docker-stack.yml).
$CFG->session_redis_port = 6379;             // Port default Redis.
$CFG->session_redis_database = 0;            // Database index (0–15).
$CFG->session_redis_auth = 'Moodle123';               // Jika Redis pakai password, isi di sini.
$CFG->session_redis_prefix = 'moodle_sess_'; // Prefix key untuk sesi.
$CFG->session_redis_acquire_lock_timeout = 120;
$CFG->session_redis_lock_expire = 7200;
$CFG->session_redis_lock_retry = 100;

$CFG->wwwroot   = 'http://moodle45.simplepro.id';
$CFG->dataroot  = '/var/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
