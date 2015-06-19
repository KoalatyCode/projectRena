[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/EVE-KILL/projectRena/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/EVE-KILL/projectRena/)
[![Scrutinizer Coverage](https://scrutinizer-ci.com/g/EVE-KILL/projectRena/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/EVE-KILL/projectRena/)
[![Scrutinizer Build](https://scrutinizer-ci.com/g/EVE-KILL/projectRena/badges/build.png?b=master)](https://scrutinizer-ci.com/g/EVE-KILL/projectRena/)

# Project Rena
ProjectRena is a complete from the ground up rewrite of the backend for EVSCO/EVE-KILL

# WARNING
Project Rena is in development and shouldn't be used by anyone!
If you do use it, then good luck to you! ;)

# Contact
`#esc` on `irc.coldfront.net`
_http://chat.mibbit.com/?channel=%23esc&server=irc.coldfront.net_

# LICENSE
MIT, check LICENSE for more information

# Requirements
- PHP 5.6 / HHVM 3.*
- NGINX
- Linux
- MariaDB 10+
- Composer
- cURL and PHP5-cURL
- Redis and PHP5-Redis

# Installation
1. Clone to a directory of your choise
2. Setup your httpd to point at the public/ dir
3. Install vendor files with composer
4. Copy config_new.php to config.php under config/
5. Edit config.php with database information and so forth
6. Run update with: php Rena update
7. Setup migrations: php Rena init
8. Edit phinx.yml with database information
9. Run database migration: php Rena migrate
10. Enjoy