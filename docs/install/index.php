<?php
/************************************************************************/
/* ATutor																*/
/************************************************************************/
/* Copyright (c) 2002-2003 by Greg Gay, Joel Kronenberg, Heidi Hazelton	*/
/* http://atutor.ca														*/
/*																		*/
/* This program is free software. You can redistribute it and/or		*/
/* modify it under the terms of the GNU General Public License			*/
/* as published by the Free Software Foundation.						*/
/************************************************************************/
// $Id$

define('AT_INCLUDE_PATH', 'include/');
error_reporting(E_ALL ^ E_NOTICE);

require('../include/lib/constants.inc.php');

$new_version = VERSION;

header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');

require(AT_INCLUDE_PATH.'header.php');

?>
<h3>Welcome to the ATutor Installation</h3>
<p>This process will guide you through your ATutor installation or upgrade.</p>
<p>During the installation or upgrade be sure not to use your browser's <em>Refresh</em> option as it may complicate the installation process.</p>

<h4>Requirements</h4>
<p>Please review the requirements below before proceeding.</p>
<ul>
	<li>HTTP Web Server (<a href="http://apache.org">Apache</a> 1.3.x is highly recommended. We do <em>not</em> recommend Apache 2.x) <strong>Detected: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></strong></li>

	<li><a href="http://php.net">PHP</a> 4.2.0 or higher (Version 4.3.0 or higher is recommended) <strong>Detected: PHP <?php echo phpversion(); ?></strong><br />
		With the following options:
		<ul>
			<li><kbd>--with-zlib</kbd> to enable Zlib (Required) <strong>Detected: <?php if (defined('FORCE_GZIP')) {
																									echo 'Enabled'; 
																								} else {
																									echo 'Disabled';
																								} ?></strong></li>
			<li><kbd>--with-mysql</kbd> to enable MySQL support (Required) <strong>Detected: <?php if (defined('MYSQL_NUM')) {
																									echo 'Enabled'; 
																								} else {
																									echo 'Disabled';
																								} ?></strong></li>
			<li><kbd>safe_mode</kbd> must be disabled (Required) <strong>Detected: <?php if (get_cfg_var('safe_mode')) {
																									echo 'Enabled'; 
																								} else {
																									echo 'Disabled';
																								} ?></strong></li>

			<li><kbd>file_uploads</kbd> must be enabled (Required) <strong>Detected: <?php if (get_cfg_var('file_uploads')) {
																									echo 'Enabled';
																							} else {
																									echo 'Disabled';
																							} ?></strong></li>

			<li><kbd>upload_max_filesize</kbd> should be atleast 5 Megabyte to be useful <strong>Detected: <?php echo get_cfg_var('upload_max_filesize'); ?></strong></li>

			<li><kbd>post_max_size</kbd> should be set to atleast 8 Megabyte to be useful <strong>Detected: <?php echo get_cfg_var('post_max_size'); ?></strong></li>
		</ul>
	</li>

	<li><a href="http://mysql.com">MySQL</a> 3.23.x or higher (Version 4.0.16 or higher is recommended) <strong>Detected: <?php if (defined('MYSQL_NUM')) {
																									echo 'Version Unknown'; 
																								} else {
																									echo 'Disabled';
																								} ?></strong></li>
</ul>

<br />

<table cellspacing="0" class="tableborder" cellpadding="1" align="center" width="70%">
<tr>
	<td align="right" class="row1" nowrap="nowrap"><b>Install a Fresh Version �</b></td>
	<td class="row1" width="150" align="center"><form action="install.php" method="post" name="form">
	<input type="hidden" name="new_version" value="<?php echo $new_version; ?>" />
	<input type="submit" class="button" value="  Install  " name="next" />
	</form></td>
</tr>
</table>
<table cellspacing="0" cellpadding="10" align="center" width="45%">
<tr>
	<td align="center"><b>Or</b></td>
</tr>
</table>
<table cellspacing="0" class="tableborder" cellpadding="1" align="center" width="70%">
<tr>
	<td align="right" class="row1" nowrap="nowrap"><b>Upgrade an Existing Installation �</b></td>
	<td class="row1" width="150" align="center"><form action="upgrade.php" method="post" name="form">
	<input type="hidden" name="new_version" value="<?php echo $new_version; ?>" />
	<input type="submit" class="button" value="Upgrade" name="next" />
	</form></td>
</tr>
</table>

<?php
	require(AT_INCLUDE_PATH.'footer.php');
?>