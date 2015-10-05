--
--      Change instance specific config.
--
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = 'praxigento', path ='design/package/name';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '1', path ='dev/template/allow_symlink';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '1', path ='dev/log/active';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = 'app/etc/log4php.cfg.xml', path ='dev/log/prxgt_log4php_config_file';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '/', path ='web/cookie/cookie_path'; -- MOBI-31
--
--  Use Magento as authentication source on login
--
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '1', path ='prxgt_store_setup/backend/mage_is_auth_source';
--
-- Configure Referral Program
--
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '1', path ='nmmlm_core_referrals/general/enabled';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '100000001', path ='nmmlm_core_referrals/general/root_default';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '100000001', path ='nmmlm_core_referrals/general/upline_default';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '1,2,3', path ='nmmlm_core_referrals/group/applied_for';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '3', path ='nmmlm_core_referrals/group/anon_default';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '3', path ='nmmlm_core_referrals/group/anon_ref';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '1', path ='nmmlm_core_referrals/group/reg_default';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '1', path ='nmmlm_core_referrals/group/reg_ref';
--
-- Configure Bonus Calculation
--
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '100000014', path ='prxgt_bonus/general/accountant_mlmid';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '1', path ='prxgt_bonus/personal_bonus/is_enabled';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '3', path ='prxgt_bonus/personal_bonus/payout_delay';
--
-- Switch off Youama AjaxLogin (use default Magento Login form)
--
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '0', path ='youamaajaxlogin/settings/power';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '0', path ='youamaajaxlogin/settings/jquery';
REPLACE INTO ${CFG_DB_PREFIX}core_config_data SET value = '0', path ='youamaajaxlogin/settings/jqueryui';