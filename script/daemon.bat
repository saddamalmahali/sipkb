
echo off
REM This adds the folder containing php.exe to the path
PATH=%PATH%;C:\xampp\php

REM Change Directory to the folder containing your script
CD C:\xampp\htdocs\sipkb\script 

REM Execute
php auto.php 