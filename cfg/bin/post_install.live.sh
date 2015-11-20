#!/bin/sh
##
#   Setup Magento instance after install with Composer.
#   (all placeholders ${...} should be replaced by real values from ./live/template.json file)
##

# local specific environment
LOCAL_ROOT=${LOCAL_ROOT}
MAGE_ROOT=$LOCAL_ROOT/htdocs
MAGE_ROOT=$LOCAL_ROOT
# The owner of the Magento file system:
#   * Must have full control (read/write/execute) of all files and directories.
#   * Must not be the web server user; it should be a different user.
# Web server:
#   * must be a member of the '${LOCAL_GROUP}' group.
LOCAL_OWNER=${LOCAL_OWNER}
LOCAL_GROUP=${LOCAL_GROUP}
# DB connection params
# DB connection params
DB_HOST=${CFG_DB_HOST}
DB_NAME=${CFG_DB_NAME}
DB_USER=${CFG_DB_USER}
DB_PASS=${CFG_DB_PASSWORD}


# Check 'env.php' to prevent repeated installation
FILE_ENV=$MAGE_ROOT/app/etc/env.php
if [ -f "$FILE_ENV" ]
then
        echo "There is '$FILE_ENV' file. Do nothing."
else
    echo "There is no '$FILE_ENV' file."

    echo "launch Magento installation using database '$DB_NAME'."
    # Full list of the available options:
    # http://devdocs.magento.com/guides/v2.0/install-gde/install/cli/install-cli-install.html#instgde-install-cli-magento
    php $MAGE_ROOT/bin/magento setup:install  \
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
    echo "Setup additional filesystem permissions."
    ##
    chown -R $LOCAL_OWNER:$LOCAL_GROUP $MAGE_ROOT
    find $MAGE_ROOT -type d -exec chmod 770 {} \;
    find $MAGE_ROOT -type f -exec chmod 660 {} \;
    chmod -R g+w $MAGE_ROOT/var
    chmod -R g+w $MAGE_ROOT/pub
    chmod u+x $MAGE_ROOT/bin/magento
    chmod -R go-w $MAGE_ROOT/app/etc

fi

##
echo "Post installation setup is done."
##