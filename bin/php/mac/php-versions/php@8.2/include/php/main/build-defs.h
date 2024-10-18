/*
   +----------------------------------------------------------------------+
   | Copyright (c) The PHP Group                                          |
   +----------------------------------------------------------------------+
   | This source file is subject to version 3.01 of the PHP license,      |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | https://www.php.net/license/3_01.txt                                 |
   | If you did not receive a copy of the PHP license and are unable to   |
   | obtain it through the world-wide-web, please send a note to          |
   | license@php.net so we can mail you a copy immediately.               |
   +----------------------------------------------------------------------+
   | Author: Stig Sæther Bakken <ssb@php.net>                             |
   +----------------------------------------------------------------------+
*/

#define CONFIGURE_COMMAND " './configure'  '--prefix=/opt/homebrew/Cellar/php@8.2/8.2.24_1' '--localstatedir=/opt/homebrew/var' '--sysconfdir=/opt/homebrew/etc/php/8.2' '--with-config-file-path=/opt/homebrew/etc/php/8.2' '--with-config-file-scan-dir=/opt/homebrew/etc/php/8.2/conf.d' '--with-pear=/opt/homebrew/Cellar/php@8.2/8.2.24_1/share/php@8.2/pear' '--enable-bcmath' '--enable-calendar' '--enable-dba' '--enable-exif' '--enable-ftp' '--enable-fpm' '--enable-gd' '--enable-intl' '--enable-mbregex' '--enable-mbstring' '--enable-mysqlnd' '--enable-pcntl' '--enable-phpdbg' '--enable-phpdbg-readline' '--enable-shmop' '--enable-soap' '--enable-sockets' '--enable-sysvmsg' '--enable-sysvsem' '--enable-sysvshm' '--with-apxs2=/opt/homebrew/opt/httpd/bin/apxs' '--with-bz2=/Library/Developer/CommandLineTools/SDKs/MacOSX14.sdk/usr' '--with-curl' '--with-external-gd' '--with-external-pcre' '--with-ffi' '--with-fpm-user=_www' '--with-fpm-group=_www' '--with-gettext=/opt/homebrew/opt/gettext' '--with-gmp=/opt/homebrew/opt/gmp' '--with-iconv=/Library/Developer/CommandLineTools/SDKs/MacOSX14.sdk/usr' '--with-kerberos' '--with-layout=GNU' '--with-ldap=/opt/homebrew/opt/openldap' '--with-libxml' '--with-libedit' '--with-mhash=/Library/Developer/CommandLineTools/SDKs/MacOSX14.sdk/usr' '--with-mysql-sock=/tmp/mysql.sock' '--with-mysqli=mysqlnd' '--with-ndbm=/Library/Developer/CommandLineTools/SDKs/MacOSX14.sdk/usr' '--with-openssl' '--with-password-argon2=/opt/homebrew/opt/argon2' '--with-pdo-dblib=/opt/homebrew/opt/freetds' '--with-pdo-mysql=mysqlnd' '--with-pdo-odbc=unixODBC,/opt/homebrew/opt/unixodbc' '--with-pdo-pgsql=/opt/homebrew/opt/libpq' '--with-pdo-sqlite' '--with-pgsql=/opt/homebrew/opt/libpq' '--with-pic' '--with-pspell=/opt/homebrew/opt/aspell' '--with-sodium' '--with-sqlite3' '--with-tidy=/opt/homebrew/opt/tidy-html5' '--with-unixODBC' '--with-xsl' '--with-zip' '--with-zlib' '--enable-dtrace' '--with-ldap-sasl' '--with-os-sdkpath=/Library/Developer/CommandLineTools/SDKs/MacOSX14.sdk' 'PKG_CONFIG_PATH=/opt/homebrew/opt/apr/lib/pkgconfig:/opt/homebrew/opt/openssl@3/lib/pkgconfig:/opt/homebrew/opt/apr-util/lib/pkgconfig:/opt/homebrew/opt/argon2/lib/pkgconfig:/opt/homebrew/opt/brotli/lib/pkgconfig:/opt/homebrew/opt/libnghttp2/lib/pkgconfig:/opt/homebrew/opt/libssh2/lib/pkgconfig:/opt/homebrew/opt/rtmpdump/lib/pkgconfig:/opt/homebrew/opt/lz4/lib/pkgconfig:/opt/homebrew/opt/xz/lib/pkgconfig:/opt/homebrew/opt/zstd/lib/pkgconfig:/opt/homebrew/opt/curl/lib/pkgconfig:/opt/homebrew/opt/unixodbc/lib/pkgconfig:/opt/homebrew/opt/libpng/lib/pkgconfig:/opt/homebrew/opt/freetype/lib/pkgconfig:/opt/homebrew/opt/fontconfig/lib/pkgconfig:/opt/homebrew/opt/jpeg-turbo/lib/pkgconfig:/opt/homebrew/opt/highway/lib/pkgconfig:/opt/homebrew/opt/imath/lib/pkgconfig:/opt/homebrew/opt/libtiff/lib/pkgconfig:/opt/homebrew/opt/little-cms2/lib/pkgconfig:/opt/homebrew/opt/openexr/lib/pkgconfig:/opt/homebrew/opt/webp/lib/pkgconfig:/opt/homebrew/opt/jpeg-xl/lib/pkgconfig:/opt/homebrew/opt/libvmaf/lib/pkgconfig:/opt/homebrew/opt/aom/lib/pkgconfig:/opt/homebrew/opt/libavif/lib/pkgconfig:/opt/homebrew/opt/gd/lib/pkgconfig:/opt/homebrew/opt/gmp/lib/pkgconfig:/opt/homebrew/opt/icu4c@75/lib/pkgconfig:/opt/homebrew/opt/krb5/lib/pkgconfig:/opt/homebrew/opt/libpq/lib/pkgconfig:/opt/homebrew/opt/libsodium/lib/pkgconfig:/opt/homebrew/opt/libzip/lib/pkgconfig:/opt/homebrew/opt/oniguruma/lib/pkgconfig:/opt/homebrew/opt/openldap/lib/pkgconfig:/opt/homebrew/opt/pcre2/lib/pkgconfig:/opt/homebrew/opt/readline/lib/pkgconfig:/opt/homebrew/opt/sqlite/lib/pkgconfig:/opt/homebrew/opt/tidy-html5/lib/pkgconfig' 'PKG_CONFIG_LIBDIR=/usr/lib/pkgconfig:/opt/homebrew/Library/Homebrew/os/mac/pkgconfig/14' 'KERBEROS_CFLAGS= ' 'SASL_CFLAGS=-I/Library/Developer/CommandLineTools/SDKs/MacOSX14.sdk/usr/include/sasl' 'SASL_LIBS=-lsasl2'"
#define PHP_ODBC_CFLAGS	"-I/opt/homebrew/Cellar/unixodbc/2.3.12/include"
#define PHP_ODBC_LFLAGS		""
#define PHP_ODBC_LIBS		"-L/opt/homebrew/Cellar/unixodbc/2.3.12/lib -lodbc"
#define PHP_ODBC_TYPE		"unixODBC"
#define PHP_OCI8_DIR			""
#define PHP_OCI8_ORACLE_VERSION		""
#define PHP_PROG_SENDMAIL	"/usr/sbin/sendmail"
#define PEAR_INSTALLDIR         "/opt/homebrew/Cellar/php@8.2/8.2.24_1/share/php@8.2/pear"
#define PHP_INCLUDE_PATH	".:/opt/homebrew/Cellar/php@8.2/8.2.24_1/share/php@8.2/pear"
#define PHP_EXTENSION_DIR       "/opt/homebrew/Cellar/php@8.2/8.2.24_1/lib/php/20220829"
#define PHP_PREFIX              "/opt/homebrew/Cellar/php@8.2/8.2.24_1"
#define PHP_BINDIR              "/opt/homebrew/Cellar/php@8.2/8.2.24_1/bin"
#define PHP_SBINDIR             "/opt/homebrew/Cellar/php@8.2/8.2.24_1/sbin"
#define PHP_MANDIR              "/opt/homebrew/Cellar/php@8.2/8.2.24_1/share/man"
#define PHP_LIBDIR              "/opt/homebrew/Cellar/php@8.2/8.2.24_1/lib/php"
#define PHP_DATADIR             "/opt/homebrew/Cellar/php@8.2/8.2.24_1/share/php"
#define PHP_SYSCONFDIR          "/opt/homebrew/etc/php/8.2"
#define PHP_LOCALSTATEDIR       "/opt/homebrew/var"
#define PHP_CONFIG_FILE_PATH    "/opt/homebrew/etc/php/8.2"
#define PHP_CONFIG_FILE_SCAN_DIR    "/opt/homebrew/etc/php/8.2/conf.d"
#define PHP_SHLIB_SUFFIX        "so"
#define PHP_SHLIB_EXT_PREFIX    ""
