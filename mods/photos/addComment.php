<?php
/***********************************************************************/
/* ATutor															   */
/***********************************************************************/
/* Copyright (c) 2002-2009											   */
/* Adaptive Technology Resource Centre / Inclusive Design Institution  */
/* http://atutor.ca													   */
/*																	   */
/* This program is free software. You can redistribute it and/or	   */
/* modify it under the terms of the GNU General Public License		   */
/* as published by the Free Software Foundation.					   */
/***********************************************************************/
// $Id$
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
include (AT_PA_INCLUDE.'classes/PhotoAlbum.class.php');

//check what comment this is for. Album or Photo.
$pid = intval($_POST['pid']);
$aid = intval($_POST['aid']);

if (isset($_POST['pid']) && $pid>0){
	$isPhoto = true;
	$id = $pid;
} else {
	$isPhoto = false;
	$id = $aid;
}
$pa = new PhotoAlbum();
$result = $pa->addComment($id, $_POST['comment'], $_SESSION['member_id'], $isPhoto);

if ($result){
	//TODO: AJAX
} else {
	$msg->addError(); //sql
}

if ($isPhoto){
	header('Location: photo.php?pid='.$pid.SEP.'aid='.$aid);
} else {
	header('Location: albums.php?id='.$aid);
}
exit;
?>