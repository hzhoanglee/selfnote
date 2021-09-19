<?php
$dbhost = "localhost"; //hostname
$dbuser = "selfnotes";  //mysql acc/ username
$dbpass = "selfnotes";  //mysql scc/ password
$dbname = "selfnotes"; //mysql database name
$db=new mysqli("$dbhost","$dbuser","$dbpass");
$db->select_db("$dbname");