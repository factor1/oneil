<?php
// Template Name: BigUpload
get_header();

echo file_get_contents('https://bigupload.oneilprint.com:446/scripts');
echo file_get_contents('https://bigupload.oneilprint.com:446/');

get_footer();
