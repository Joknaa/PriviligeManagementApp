<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pinegrow Web Editor - Professional Services Bootstrap v5 Template">
    <meta name="author" content="">
    <title>Blank Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap_theme/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="blocks.css">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
</head>
<body>
<header style="background-color: rgba(255, 255, 255, 0.6);" class="fixed-top">
    <nav class="border-bottom border-primary navbar navbar-expand-lg navbar-light pb-lg-0 pt-lg-0">
        <div class="container">
            <a class="fw-bold navbar-brand text-uppercase" href="#" target><img src="../pic/logo.png.crdownload"
                                                                                style="width: 70px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown-21" aria-controls="navbarNavDropdown-21" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavDropdown-21">
                <ul class="ms-auto navbar-nav">
                    <li class="nav-item">
                        <a class="active nav-link px-lg-3 py-lg-4 text-muted text-uppercase" aria-current="page"
                           href="#">Acceuil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link px-lg-3 py-lg-4 text-uppercase" href="#"
                           id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">ENSAT??</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Pr??sentation</a>
                            <a class="dropdown-item" href="#">Mot du directeur</a>
                            <a class="dropdown-item" href="#">Membres du consei d&apos;??tablissement</a>
                            <a class="dropdown-item" href="#">ENSAT??&nbsp;</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link px-lg-3 py-lg-4 text-uppercase" href="#"
                           id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">Formations</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Formation initiale</a>
                            <a class="dropdown-item" href="#">Formation continue</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link px-lg-3 py-lg-4 text-uppercase" href="#"
                           id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">departements</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Humanit??s</a>
                            <a class="dropdown-item" href="#">G??nie Informatique</a>
                            <a class="dropdown-item" href="#">Sciences Math??matiques et Aide ?? la D??cision (SMAD)</a>
                            <a class="dropdown-item" href="#">Sciences et Technologies Industrielles et Civiles
                                (STIC)</a>
                            <a class="dropdown-item" href="#">TELECOM</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link px-lg-3 py-lg-4 text-uppercase" href="#"
                           id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">RECH.Scientifique</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Projet de recherche</a>
                            <a class="dropdown-item" href="#">Conventions et partenariats</a>
                            <a class="dropdown-item" href="#">Laboratoires</a>
                            <a class="dropdown-item" href="#">Equipes</a>
                            <a class="dropdown-item" href="#">Activit??s Scientifiques</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-lg-4 text-uppercase" href="#">Moodle EnsaT??</a>
                    </li>
                </ul>
                <button class="border-0 btn btn-outline-light order-lg-1 py-2 text-primary" type="button"
                        aria-label="Search Button">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                        <path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</header>
<section class="pb-5 pt-5 text-secondary">
    <div class="container pb-5 pt-5">

        <?php
        if (count($_POST) == 2) {

            // LDAP AUTHENTIFICATION

            $userEmail = $_POST["mail"];
            $userPassword = $_POST["password"];

            require("LDAP_Authentication.php");
            $ldap_Connection = ConnectToLDAP($userEmail, $userPassword);
            if ($ldap_Connection == false) die("Coudnt connect to LDAP, User or password are incorrect");


            require("ldap.php");
            $ldap = new ldap();

            //echo $_POST['mail'];
            $_SESSION['id'] = $ldap->user($_POST['mail']);
            //echo $_SESSION['id'];

            $rslt = $ldap->roles($_SESSION['id']);

            echo "<div class=\"row\">";
            while ($parc = $rslt->fetch()) {
                switch ($parc['service']) {
                    case 1:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Demande de documents scolaires</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 2:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Cours</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 3:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Affichage de notes</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 4:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Calendrier des exams</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 5:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Gestion des examens</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 6:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Gestion des notes des ??tudiants</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 7:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Calendrier des r??unions</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 8:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">D??pot de cours </h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 9:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Gestion des r??unions</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 10:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Gestion de budgets</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 11:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Gestion des ??tudiants</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 12:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Gestion des professeurs</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 13:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Gestion des salles</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 14:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Gestion des d??partements</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 15:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Gestion de la recherche scientifique</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"#\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;
                    case 16:
                        echo "
                                    <div class=\"col-sm-6 col-xl-3 pb-3 pt-3\"> 
                                        <div style=\"margin-top:48px\" class=\"bg-light d-block pb-5 ps-4 pe-4 pt-5 shadow\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" width=\"2.5em\" height=\"2.5em\" class=\"mb-3 text-primary\">
                                                <g>
                                                    <path fill=\"none\" d=\"M0 0h24v24H0z\"/>
                                                    <path d=\"M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z\"/>
                                                </g>
                                            </svg>                             
                                            <h4 class=\"fw-bold h5 text-dark\">Gestion des privil??ges</h4> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                                            <a href=\"privilege.php\" class=\"text-decoration-none\">Learn More</a> 
                                        </div>
                                    </div>";
                        break;

                }

            }
            echo "</div>";


        }
        ?>
    </div>
</section>
<section>
    <div class="container">
    </div>
</section>
<section class="pb-5 pt-5 text-center">
    <div class="container pb-4 pt-4">
        <div class="row">
            <div class="col-lg-8 ms-auto me-auto">
                <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <svg viewBox="0 0 24 24" fill="currentColor" height="80" width="80"
                                 class="mb-3 text-primary">
                                <path d="M23 1V5.06504C21.9136 5.67931 21.0807 6.43812 20.5012 7.34146C19.958 8.24481 19.5416 9.20235 19.2519 10.2141C18.9621 11.2258 18.8173 12.346 18.8173 13.5745H23V22.4634H14.0914V16.935C14.0914 13.6107 14.3992 11.0813 15.0148 9.34688C15.6667 7.61246 16.6444 6.02258 17.9481 4.57723C19.2519 3.09575 20.9358 1.90334 23 1ZM9.90864 1V5.06504C8.82222 5.67931 7.9893 6.43812 7.40988 7.34146C6.83045 8.24481 6.39588 9.20235 6.10617 10.2141C5.81646 11.2258 5.67161 12.346 5.67161 13.5745H9.90864V22.4634H1V16.935C1 13.6107 1.30782 11.0813 1.92346 9.34688C2.57531 7.61246 3.55309 6.02258 4.85679 4.57723C6.16049 3.09575 7.84444 1.90334 9.90864 1Z"/>
                            </svg>
                            <h2 class="mb-3">Nous avons tendance ?? mesurer la r??ussite ?? l&rsquo;importance de notre
                                salaire ou ?? la grosseur de nos voitures plut??t qu&rsquo;aux liens que nous cultivons
                                avec les autres.</h2>
                            <div class="">
                                <span class="text-primary">Martin Luther King</span>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <svg viewBox="0 0 24 24" fill="currentColor" height="80" width="80"
                                 class="mb-3 text-primary">
                                <path d="M23 1V5.06504C21.9136 5.67931 21.0807 6.43812 20.5012 7.34146C19.958 8.24481 19.5416 9.20235 19.2519 10.2141C18.9621 11.2258 18.8173 12.346 18.8173 13.5745H23V22.4634H14.0914V16.935C14.0914 13.6107 14.3992 11.0813 15.0148 9.34688C15.6667 7.61246 16.6444 6.02258 17.9481 4.57723C19.2519 3.09575 20.9358 1.90334 23 1ZM9.90864 1V5.06504C8.82222 5.67931 7.9893 6.43812 7.40988 7.34146C6.83045 8.24481 6.39588 9.20235 6.10617 10.2141C5.81646 11.2258 5.67161 12.346 5.67161 13.5745H9.90864V22.4634H1V16.935C1 13.6107 1.30782 11.0813 1.92346 9.34688C2.57531 7.61246 3.55309 6.02258 4.85679 4.57723C6.16049 3.09575 7.84444 1.90334 9.90864 1Z"/>
                            </svg>
                            <h2 class="mb-3">Le succ??s c&apos;est d&apos;aller d&apos;??chec en ??chec sans perdre d&apos;enthousiasme.</h2>
                            <div class="">
                                <span class="text-primary">ACME Gizmo LLC</span>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <svg viewBox="0 0 24 24" fill="currentColor" height="80" width="80"
                                 class="mb-3 text-primary">
                                <path d="M23 1V5.06504C21.9136 5.67931 21.0807 6.43812 20.5012 7.34146C19.958 8.24481 19.5416 9.20235 19.2519 10.2141C18.9621 11.2258 18.8173 12.346 18.8173 13.5745H23V22.4634H14.0914V16.935C14.0914 13.6107 14.3992 11.0813 15.0148 9.34688C15.6667 7.61246 16.6444 6.02258 17.9481 4.57723C19.2519 3.09575 20.9358 1.90334 23 1ZM9.90864 1V5.06504C8.82222 5.67931 7.9893 6.43812 7.40988 7.34146C6.83045 8.24481 6.39588 9.20235 6.10617 10.2141C5.81646 11.2258 5.67161 12.346 5.67161 13.5745H9.90864V22.4634H1V16.935C1 13.6107 1.30782 11.0813 1.92346 9.34688C2.57531 7.61246 3.55309 6.02258 4.85679 4.57723C6.16049 3.09575 7.84444 1.90334 9.90864 1Z"/>
                            </svg>
                            <h2 class="mb-3">La difficult?? ou l&rsquo;obscurit?? d&rsquo;un sujet n&rsquo;est pas une
                                raison suffisante pour le n??gliger.</h2>
                            <div class="">
                                <span class="text-primary">Alexis Carrel</span>
                            </div>
                        </div>
                    </div>
                    <ol class="carousel-indicators mt-4 position-relative">
                        <li data-bs-target="#carousel2" data-bs-slide-to="0" class="active bg-primary"></li>
                        <li data-bs-target="#carousel2" data-bs-slide-to="1" class="bg-primary"></li>
                        <li data-bs-target="#carousel2" data-bs-slide-to="2" class="bg-primary"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<div>
    <svg viewBox="0 0 100 100" preserveAspectRatio="none" fill="currentColor" version="1.1"
         xmlns="http://www.w3.org/2000/svg" height="160" width="100%" class="bg-white d-block text-primary">
        <path d="M 100 100 V 0 L 0 100"/>
    </svg>
</div>
<footer class="bg-primary pt-5 text-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 me-auto py-3">
                <a href="#" class="d-inline-block fw-bold h2 link-light mb-4 text-decoration-none text-uppercase"
                   target>Ensa t??touan</a>
                <p class="mb-3">Cr????e en septembre 2008, l&rsquo;Ecole Nationale des Sciences Appliqu??es de T??touan est
                    un ??tablissement public ?? caract??re scientifique, culturel et professionnel, instaur??e pour ??tre une
                    ??cole d&rsquo;ing??nieurs de haut niveau.</p>
                <div class="mb-4">
                    <a href="#" class="link-light text-decoration-none">BP: 2222 M&apos;hannech</a>
                    <br>
                    <a href="#" class="link-light text-decoration-none">ensatetouan@uae.ac.ma&nbsp;<i></i></a>
                </div>
                <div class="d-inline-flex flex-wrap">
                    <a href="#" class="link-light p-1" aria-label="facebook-link">
                        <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                            <path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/>
                        </svg>
                    </a>
                    <a href="#" class="link-light p-1" aria-label="instagram-link">
                        <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                            <path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6.5-.25a1.25 1.25 0 0 0-2.5 0 1.25 1.25 0 0 0 2.5 0zM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/>
                        </svg>
                    </a>
                    <a href="#" class="link-light p-1" aria-label="linkedin-link">
                        <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                            <path d="M6.94 5a2 2 0 1 1-4-.002 2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z"/>
                        </svg>
                    </a>
                    <a href="#" class="link-light p-1" aria-label="youtube-link"> </a>
                </div>
            </div>
        </div>
        <div class="pb-3 pt-3 text-center">
            <hr class="border-light mt-0">
            <p class="mb-0">Copyright &copy; 2022 Ensa T??touan</p>
        </div>
    </div>
</footer>
<script src="assets/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
