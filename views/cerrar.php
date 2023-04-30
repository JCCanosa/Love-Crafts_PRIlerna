<?php

//Cerramos la sesión

session_start();
session_destroy();
// echo 'Se ha cerrado la session';

header('Location: http://localhost/PRIlerna/');
