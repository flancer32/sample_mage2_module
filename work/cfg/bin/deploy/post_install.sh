#!/bin/sh
##
#   Setup Magento instance after update with Composer.
##

# local specific environment
LOCAL_ROOT=${LOCAL_ROOT}
# Owner must be group of web server and
# web server must be in group of owner.
LOCAL_OWNER=${LOCAL_OWNER}
LOCAL_GROUP=${LOCAL_GROUP}
# DB connection params
DB_NAME=${CFG_DB_NAME}
DB_USER=${CFG_DB_USER}
DB_PASS=${CFG_DB_PASS}

# instance independend environment
BIN_ROOT=$LOCAL_ROOT/bin/deploy

##
echo "Mount magento modules into Magento root."
##
php $LOCAL_ROOT/vendor/bin/composerCommandIntegrator.php magento-module-deploy

##
echo "Change rights to folders and files."
##
mkdir -p $LOCAL_ROOT/mage/var/log
chown $LOCAL_OWNER:$LOCAL_GROUP -R $LOCAL_ROOT/mage/

chmod g+r -R $LOCAL_ROOT/mage/
chmod g+w -R $LOCAL_ROOT/mage/media/
chmod g+w -R $LOCAL_ROOT/mage/var/

find $LOCAL_ROOT/mage/ -type d -exec chmod g+x {} \;


##
echo "Install empty Magento database '$DB_NAME'."
##
rm $LOCAL_ROOT/mage/app/etc/local.xml
php $LOCAL_ROOT/bin/deploy/install.php

##
echo "Post installation setup for database '$DB_NAME'."
##
mysql --database=$DB_NAME --user=$DB_USER --password=$DB_PASS -e "source $BIN_ROOT/post_install.sql"


##
#echo "Create sample data."
##
#php $LOCAL_ROOT/mage/shell/Praxigento/Bonus/sample_data.php --create


##
echo "Post installation setup is done."
##