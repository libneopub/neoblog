<?php
// Function to check wether a 
// directory contains files.

function isDirEmpty($dir)
{
  if (!is_readable($dir)) return NULL;
  return (count(scandir($dir)) == 2);
}
