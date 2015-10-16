#!/bin/sh
##
#   Setup Magento instance after install with Composer.
#   (all placeholders ${...} should be replaced by real values from ./work/template.json file)
##

# local specific environment
LOCAL_ROOT=${LOCAL_ROOT}
# The owner of the Magento file system:
#   * Must have full control (read/write/execute) of all files and directories.
#   * Must not be the web server user; it should be a different user.
LOCAL_OWNER=${LOCAL_OWNER}
LOCAL_GROUP=${LOCAL_GROUP}
# DB connection params
DB_HOST=${CFG_DB_HOST}
DB_NAME=${CFG_DB_NAME}
DB_USER=${CFG_DB_USER}
DB_PASS=${CFG_DB_PASSWORD}

##
echo "Restore write access on folder 'work/htdocs/app/etc' for owner when launches are repeated."
##
if [ -d "$LOCAL_ROOT/work/htdocs/app/etc" ]
then
    chmod -R go+w $LOCAL_ROOT/work/htdocs/app/etc
fi


##
echo "Drop database $DB_NAME."
##
mysqladmin -f -u"$DB_USER" -p"$DB_PASS" -h"$DB_HOST" drop "$DB_NAME"
mysqladmin -f -u"$DB_USER" -p"$DB_PASS" -h"$DB_HOST" create "$DB_NAME"


##
echo "Re-install database $DB_NAME."
##

# Full list of the available options:
# http://devdocs.magento.com/guides/v2.0/install-gde/install/cli/install-cli-install.html#instgde-install-cli-magento

php $LOCAL_ROOT/work/htdocs/bin/magento setup:install  \
--admin-firstname="${CFG_ADMIN_FIRSTNAME}" \
--admin-lastname="${CFG_ADMIN_LASTNAME}" \
--admin-email="${CFG_ADMIN_EMAIL}" \
--admin-user="${CFG_ADMIN_USER}" \
--admin-password="${CFG_ADMIN_PASSWORD}" \
--base-url="${CFG_BASE_URL}" \
--backend-frontname="${CFG_BACKEND_FRONTNAME}" \
--db-host="${CFG_DB_HOST}" \
--db-name="${CFG_DB_NAME}" \
--db-user="${CFG_DB_USER}" \
--db-password="${CFG_DB_PASSWORD}" \
--language="${CFG_LANGUAGE}" \
--currency="${CFG_CURRENCY}" \
--timezone="${CFG_TIMEZONE}" \
--use-rewrites="${CFG_USE_REWRITES}" \
--use-secure="${CFG_USE_SECURE}" \
--use-secure-admin="${CFG_USE_SECURE_ADMIN}" \
--admin-use-security-key="${CFG_ADMI_USE_SECURITY_KEY}" \
--session-save="${CFG_SESSION_SAVE}" \
--cleanup-database \

##
echo "Set file system ownership and permissions."
##
chown -R $LOCAL_OWNER:$LOCAL_GROUP $LOCAL_ROOT/work/htdocs
find $LOCAL_ROOT/work/htdocs -type d -exec chmod 770 {} \;
find $LOCAL_ROOT/work/htdocs -type f -exec chmod 660 {} \;
chmod -R g+w $LOCAL_ROOT/work/htdocs/var
chmod -R g+w $LOCAL_ROOT/work/htdocs/pub
chmod u+x $LOCAL_ROOT/work/htdocs/bin/magento
chmod -R go-w $LOCAL_ROOT/work/htdocs/app/etc

##
echo "Post installation setup is done."
##