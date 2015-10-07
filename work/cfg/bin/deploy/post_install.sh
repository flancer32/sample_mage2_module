#!/bin/sh
##
#   Setup Magento instance after update with Composer.
##

# local specific environment
LOCAL_ROOT=${LOCAL_ROOT}

# restore write access for owner on repeated launches.
if [ -d "$LOCAL_ROOT/work/htdocs/app/etc" ]
then
    chmod -R u+w $LOCAL_ROOT/work/htdocs/app/etc
fi

##
#   Re-install database.
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
#   Setup filesystem permissions
##
chmod -R a-w $LOCAL_ROOT/work/htdocs/app/etc

##
echo "Post installation setup is done."
##