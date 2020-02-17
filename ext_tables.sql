#
# Table structure for table 'tx_projectmanager_domain_model_business'
#
CREATE TABLE tx_projectmanager_domain_model_business (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	street varchar(255) DEFAULT '' NOT NULL,
	street_number varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	country varchar(255) DEFAULT '' NOT NULL,
	county varchar(255) DEFAULT '' NOT NULL,
  business_director varchar(255) DEFAULT '' NOT NULL,
	telephone varchar(255) DEFAULT '' NOT NULL,
	handy varchar(255) DEFAULT '' NOT NULL,
	fax varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	web varchar(255) DEFAULT '' NOT NULL,
	folder int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_projectmanager_domain_model_project'
#
CREATE TABLE tx_projectmanager_domain_model_project (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	estimated_time_in_hours double(11,2) DEFAULT '0.00' NOT NULL,
	estimated_costs double(11,2) DEFAULT '0.00' NOT NULL,
	required_time_in_hours double(11,2) DEFAULT '0.00' NOT NULL,
	required_costs double(11,2) DEFAULT '0.00' NOT NULL,
	project_start_date int(11) DEFAULT '0' NOT NULL,
	project_finish_date int(11) DEFAULT '0' NOT NULL,
	estimated_project_finish_date int(11) DEFAULT '0' NOT NULL,
	status int(11) DEFAULT '0' NOT NULL,
        critical int(11) DEFAULT '0' NOT NULL,
	comment text NOT NULL,
	folder int(11) unsigned DEFAULT '0' NOT NULL,

	project_manager int(11) unsigned DEFAULT '0',

	business int(11) unsigned DEFAULT '0',
	additional_costs int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_projectmanager_domain_model_task'
#
CREATE TABLE tx_projectmanager_domain_model_task (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	project int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	estimated_time_in_hours double(11,2) DEFAULT '0.00' NOT NULL,
	estimated_costs double(11,2) DEFAULT '0.00' NOT NULL,
	required_time_in_hours double(11,2) DEFAULT '0.00' NOT NULL,
	required_costs double(11,2) DEFAULT '0.00' NOT NULL,
	approach_description text NOT NULL,
	task_start_date int(11) DEFAULT '0' NOT NULL,
	estimated_task_finish_date int(11) DEFAULT '0' NOT NULL,
	task_finish_date int(11) DEFAULT '0' NOT NULL,
	status int(11) DEFAULT '0' NOT NULL,
	comment text NOT NULL,
	folder int(11) unsigned DEFAULT '0' NOT NULL,
	task_master int(11) unsigned DEFAULT '0',

	bugs int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_projectmanager_domain_model_folder'
#
CREATE TABLE tx_projectmanager_domain_model_folder (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	project int(11) unsigned DEFAULT '0' NOT NULL,
	task int(11) unsigned DEFAULT '0' NOT NULL,
        business int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	parent int(11) unsigned DEFAULT '0' NOT NULL,
        files int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_projectmanager_domain_model_files'
#
CREATE TABLE tx_projectmanager_domain_model_files (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	folder int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	file int(11) unsigned NOT NULL default '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_projectmanager_domain_model_times'
#
CREATE TABLE tx_projectmanager_domain_model_times (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	task int(11) unsigned DEFAULT '0' NOT NULL,

	start int(11) DEFAULT '0' NOT NULL,
        time_needed int(11) DEFAULT '0' NOT NULL,
	comment text NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (

	hourly_rate varchar(255) DEFAULT '' NOT NULL,
	business int(11) unsigned DEFAULT '0',

	tx_extbase_type varchar(255) DEFAULT '' NOT NULL,

);

#
# Table structure for table 'fe_groups'
#
CREATE TABLE fe_groups (

        business_read int(11) DEFAULT '0' NOT NULL,
        business_edit int(11) DEFAULT '0' NOT NULL,
        business_delete int(11) DEFAULT '0' NOT NULL,
        business_new int(11) DEFAULT '0' NOT NULL, 
        business_files int(11) DEFAULT '0' NOT NULL,
        business_files_upload int(11) DEFAULT '0' NOT NULL,
        business_files_delete int(11) DEFAULT '0' NOT NULL,
        business_files_folder_new int(11) DEFAULT '0' NOT NULL,
        business_files_folder_delete int(11) DEFAULT '0' NOT NULL,
        business_users int(11) DEFAULT '0' NOT NULL,
        business_projects int(11) DEFAULT '0' NOT NULL,

        user_read int(11) DEFAULT '0' NOT NULL,
        user_edit int(11) DEFAULT '0' NOT NULL,
        user_delete int(11) DEFAULT '0' NOT NULL,
        user_new int(11) DEFAULT '0' NOT NULL, 
        user_tasks int(11) DEFAULT '0' NOT NULL,
        user_projects int(11) DEFAULT '0' NOT NULL,

        project_read int(11) DEFAULT '0' NOT NULL,
        project_edit int(11) DEFAULT '0' NOT NULL,
        project_delete int(11) DEFAULT '0' NOT NULL,
        project_new int(11) DEFAULT '0' NOT NULL, 
        project_files int(11) DEFAULT '0' NOT NULL,
        project_files_upload int(11) DEFAULT '0' NOT NULL,
        project_files_delete int(11) DEFAULT '0' NOT NULL,
        project_files_folder_new int(11) DEFAULT '0' NOT NULL,
        project_files_folder_delete int(11) DEFAULT '0' NOT NULL,
        project_tasks int(11) DEFAULT '0' NOT NULL,

        task_read int(11) DEFAULT '0' NOT NULL,
        task_edit int(11) DEFAULT '0' NOT NULL,
        task_delete int(11) DEFAULT '0' NOT NULL,
        task_new int(11) DEFAULT '0' NOT NULL, 
        task_files int(11) DEFAULT '0' NOT NULL,
        task_files_upload int(11) DEFAULT '0' NOT NULL,
        task_files_delete int(11) DEFAULT '0' NOT NULL,
        task_files_folder_new int(11) DEFAULT '0' NOT NULL,
        task_files_folder_delete int(11) DEFAULT '0' NOT NULL,
        task_times int(11) DEFAULT '0' NOT NULL,
        task_times_new int(11) DEFAULT '0' NOT NULL,

        time_read int(11) DEFAULT '0' NOT NULL,
        time_edit int(11) DEFAULT '0' NOT NULL,
        time_delete int(11) DEFAULT '0' NOT NULL,
        time_new int(11) DEFAULT '0' NOT NULL, 
);

#
# Table structure for table 'tx_projectmanager_domain_model_bug'
#
CREATE TABLE tx_projectmanager_domain_model_bug (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	task int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	comment text NOT NULL,
	status int(11) DEFAULT '0' NOT NULL,
	image int(11) unsigned DEFAULT '0' NOT NULL,
	dedected_by_user int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_projectmanager_domain_model_additionalcosts'
#
CREATE TABLE tx_projectmanager_domain_model_additionalcosts (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	project int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	costs double(11,2) DEFAULT '0.00' NOT NULL,
	comment text NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_projectmanager_domain_model_business'
#
CREATE TABLE tx_projectmanager_domain_model_business (
	categories int(11) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_projectmanager_domain_model_files'
#
CREATE TABLE tx_projectmanager_domain_model_files (

	project  int(11) unsigned DEFAULT '0' NOT NULL,

);


#
# Table structure for table 'tx_projectmanager_domain_model_task'
#
CREATE TABLE tx_projectmanager_domain_model_task (

	project  int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_projectmanager_domain_model_additionalcosts'
#
CREATE TABLE tx_projectmanager_domain_model_additionalcosts (

	project  int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_projectmanager_domain_model_project'
#
CREATE TABLE tx_projectmanager_domain_model_project (
	categories int(11) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_projectmanager_domain_model_files'
#
CREATE TABLE tx_projectmanager_domain_model_files (

	task  int(11) unsigned DEFAULT '0' NOT NULL,

);


#
# Table structure for table 'tx_projectmanager_domain_model_times'
#
CREATE TABLE tx_projectmanager_domain_model_times (

	task  int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_projectmanager_domain_model_bug'
#
CREATE TABLE tx_projectmanager_domain_model_bug (

	task  int(11) unsigned DEFAULT '0' NOT NULL,

);


