#!/usr/bin/env bash
## *************************************************************************
#   Deploy Magento 2 in development mode.
## *************************************************************************

##
#   Please setup working variables:
##

##
#   Hardcoded configuration
##
CUR_DIR="$PWD"
DIR="$( cd "$( dirname "$0" )" && pwd )"
M2_ROOT=$DIR/work


##
#   Load configuration variables.
##
. $DIR/deploy_cfg.sh


##
#   Processing
##
echo "\nClean up root folder ($M2_ROOT)..."
if [ -d "$M2_ROOT" ]
then
    rm -fr $M2_ROOT
    mkdir -p $M2_ROOT
else
    mkdir -p $M2_ROOT
fi
cd $M2_ROOT

echo "\nCreate M2 CE project in '$M2_ROOT' using 'composer install'..."
composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition $M2_ROOT

echo "\nAdd initial dependencies to M2 CE project."
composer config repositories.flancer32/php_data_object vcs https://github.com/flancer32/php_data_object
composer require flancer32/php_data_object:dev-master

echo "\nPopulate original '$M2_ROOT/composer.json' with additional options from '$DIR/deploy/dvlp/composer_options.json'..."
php $DIR/deploy/bin/merge_json.php $M2_ROOT/composer.json $DIR/deploy/dvlp/composer_options.json

echo "\nUpdate M2 CE project with additional options..."
cd $M2_ROOT
composer update


if [ -z "$LOCAL_OWNER"] || [ -z "$LOCAL_GROUP" ]; then
    echo "Skip file system ownership and permissions setup."
else
    ## http://devdocs.magento.com/guides/v2.0/install-gde/prereq/integrator_install.html#instgde-prereq-compose-access
    echo "Set file system ownership ($LOCAL_OWNER:$LOCAL_GROUP) and permissions..."
    chown -R $LOCAL_OWNER:$LOCAL_GROUP $M2_ROOT
    find $M2_ROOT -type d -exec chmod 770 {} \;
    find $M2ROOT -type f -exec chmod 660 {} \;
    chmod -R g+w $M2_ROOT/var
    chmod -R g+w $M2_ROOT/pub
    chmod u+x $M2_ROOT/bin/magento
    chmod -R go-w $M2_ROOT/app/etc
fi

echo "\nDrop M2 database $DB_NAME..."
if [ -z $DB_PASS ]; then
    MYSQL_PASS=""
    MAGE_DBPASS=""
else
    MYSQL_PASS="--password=$DB_PASS"
    MAGE_DBPASS="--db-password=""$DB_PASS"""
fi
mysqladmin -f -u"$DB_USER" $MYSQL_PASS -h"$DB_HOST" drop "$DB_NAME"
mysqladmin -f -u"$DB_USER" $MYSQL_PASS -h"$DB_HOST" create "$DB_NAME"

echo "\n(Re)install Magento using database '$DB_NAME' (connecting as '$DB_USER')."
# Full list of the available options:
# http://devdocs.magento.com/guides/v2.0/install-gde/install/cli/install-cli-install.html#instgde-install-cli-magento
php $M2_ROOT/bin/magento setup:install  \
--admin-firstname="$ADMIN_FIRSTNAME" \
--admin-lastname="$ADMIN_LASTNAME" \
--admin-email="$ADMIN_EMAIL" \
--admin-user="$ADMIN_USER" \
--admin-password="$ADMIN_PASSWORD" \
--base-url="$BASE_URL" \
--backend-frontname="$BACKEND_FRONTNAME" \
--language="$LANGUAGE" \
--currency="$CURRENCY" \
--timezone="$TIMEZONE" \
--use-rewrites="$USE_REWRITES" \
--use-secure="$USE_SECURE" \
--use-secure-admin="$USE_SECURE_ADMIN" \
--admin-use-security-key="$ADMI_USE_SECURITY_KEY" \
--session-save="$SESSION_SAVE" \
--cleanup-database \
--db-host="$DB_HOST" \
--db-name="$DB_NAME" \
--db-user="$DB_USER" \
$MAGE_DBPASS \
# 'MAGE_DBPASS' should be placed on the last position to prevent failures if this var is empty.

# Return back
cd $CUR_DIR