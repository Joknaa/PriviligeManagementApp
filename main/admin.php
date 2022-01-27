<?php
    session_start();
    if(isset($_SESSION['idU']) && isset($_POST['idservice']) ){

        require_once("ldap.php");
        $ldap=new ldap();
        $ldap->AddRole($_SESSION['idU'],$_POST['idservice']);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Pinegrow Web Editor - Directory Bootstrap v5 Template">
        <meta name="author" content="">
        <title>Pinegrow | Bootstrap Blocks Template</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap_theme/bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="blocks.css">
        <!-- Custom styles for this template -->
        <link href="style.css" rel="stylesheet">
    </head>
    <body class="text-black-50">
        <header style="background-color: rgba(255, 255, 255, 0.6);" class="fixed-top">
            <nav class="border-bottom border-primary navbar navbar-expand-lg navbar-light pb-lg-0 pt-lg-0">
                <div class="container"> 
                    <a class="fw-bold navbar-brand text-uppercase" href="#" target><img src="/app/pic/logo.png.crdownload" style="width: 70px;"></a> 
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown-21" aria-controls="navbarNavDropdown-21" aria-expanded="false" aria-label="Toggle navigation"> 
                        <span class="navbar-toggler-icon"></span> 
                    </button>                     
                    <div class="collapse navbar-collapse " id="navbarNavDropdown-21"> 
                        <ul class="ms-auto navbar-nav"> 
                            <li class="nav-item"> 
                                <a class="active nav-link px-lg-3 py-lg-4 text-muted text-uppercase" aria-current="page" href="#">Acceuil</a> 
                            </li>
                            <li class="nav-item dropdown"> 
                                <a class="dropdown-toggle nav-link px-lg-3 py-lg-4 text-uppercase" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ENSATé</a> 
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                                    <a class="dropdown-item" href="#">Présentation</a> 
                                    <a class="dropdown-item" href="#">Mot du directeur</a> 
                                    <a class="dropdown-item" href="#">Membres du consei d&apos;établissement</a>
                                    <a class="dropdown-item" href="#">ENSATé&nbsp;</a> 
                                </div>                                 
                            </li>
                            <li class="nav-item dropdown"> 
                                <a class="dropdown-toggle nav-link px-lg-3 py-lg-4 text-uppercase" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formations</a> 
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                                    <a class="dropdown-item" href="#">Formation initiale</a> 
                                    <a class="dropdown-item" href="#">Formation continue</a> 
                                </div>                                 
                            </li>
                            <li class="nav-item dropdown"> 
                                <a class="dropdown-toggle nav-link px-lg-3 py-lg-4 text-uppercase" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">departements</a> 
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                                    <a class="dropdown-item" href="#">Humanités</a> 
                                    <a class="dropdown-item" href="#">Génie Informatique</a>
                                    <a class="dropdown-item" href="#">Sciences Mathématiques et Aide à la Décision (SMAD)</a>
                                    <a class="dropdown-item" href="#">Sciences et Technologies Industrielles et Civiles (STIC)</a>
                                    <a class="dropdown-item" href="#">TELECOM</a> 
                                </div>                                 
                            </li>
                            <li class="nav-item dropdown"> 
                                <a class="dropdown-toggle nav-link px-lg-3 py-lg-4 text-uppercase" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">RECH.Scientifique</a> 
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                                    <a class="dropdown-item" href="#">Projet de recherche</a> 
                                    <a class="dropdown-item" href="#">Conventions et partenariats</a>
                                    <a class="dropdown-item" href="#">Laboratoires</a>
                                    <a class="dropdown-item" href="#">Equipes</a>
                                    <a class="dropdown-item" href="#">Activités Scientifiques</a> 
                                </div>                                 
                            </li>                             
                            <li class="nav-item"> 
                                <a class="nav-link px-lg-3 py-lg-4 text-uppercase" href="#">Moodle EnsaTé</a> 
                            </li>                             
                        </ul>                         
                        <button class="border-0 btn btn-outline-light order-lg-1 py-2" type="button" aria-label="Search Button"> 
                            <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24" class="text-primary"> 
                                <path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"/> 
                            </svg>                             
                        </button>                         
                    </div>                     
                </div>                 
            </nav>
        </header>
        <main>
            <section class="background-cover bg-dark opacity-75 pb-4 position-relative pt-5 text-center text-dark" style="background-image:url('/app/pic/1519796420418.jpeg');">
                <div class="container mt-5 pb-5 position-relative pt-5">
                    <div class="pb-5 pt-5">
                        <h1 class="fw-bold" style="letter-spacing: 8px; margin-bottom: 92px;">ESPACE D&apos;Administrateur</h1>
                    </div>
                </div>
            </section>
            <section class="pb-5 pt-5">
                <div class="container pb-2 pt-2">
                    <div class="row">
                        <div class="col-xl-9 me-auto ms-auto">
                            <?php                                

                                if(isset($_POST['id'])||(isset($_SESSION['idU']))){

                                    if(isset($_POST['id'])){$_SESSION['idU']=$_POST['id'];}
                                    

                                    require_once("ldap.php");
                                    $ldap=new ldap();
                                       
                                    $rslt= $ldap->roles($_SESSION['idU']);

                                    echo "
                                    <table class=\"table\"> 
                                        <thead> 
                                            <tr>                                          
                                                <th scope=\"col\" style=\"text-align: center; letter-spacing: 6px;\">les roles de l'utilisateur</th> 
                                                <th> </th>
                                            </tr>   
                                                         
                                        </thead>                                 
                                        <tbody> 
                                    ";
                                    while ($parc=$rslt->fetch()) {

                                        echo "
                                        <tr>                                          
                                            <td class=\"text-center\"> ".$ldap->roleById($parc['service'])['service']." </td> 
                                            <td > 
                                                <form name=\"form\" action=\"admin.php\" method=\"post\" enctype=\"multipart/form-data\">
                                                    <input type=\"hidden\" name=\"service\" value=\" ".$parc['service']." \">
                                                    <input class=\"border-primary btn btn-primary text-white\" type=\"submit\" name=\"submitt\" class=\"clbt\" value=\"Supprimer\" />
                                                </form> </td></tr>
                                            </td>
                                        </tr>   ";
                                        
                                    }
                                    echo "
                                    </tbody>                                 
                                    </table>
                                    ";
                                    
                                }
                            ?> 
                                                              

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-9 me-auto ms-auto"> 
                            <form method="post" action="admin.php" style="margin-top: 29px;"> 
                                <div class="mb-3">
                                    <select name="idservice" id="exampleFormControlSelect1" class="form-select" aria-label="Default select example">
                                        <?php
                                            
                                            require_once("ldap.php");
                                            $ldap=new ldap();

                                            $rslt= $ldap->rolesAll();
                                            
                                            while ($parc=$rslt->fetch()) {
                                                
                                                echo "
                                                <option value=".$parc['id'].">".$parc['service']."</option>
                                                ";
                                            }

                                        ?>
                                    </select>                                     
                                </div>                                 
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary pe-4 ps-4 rounded-pill">
                                        <span style="color: #ffffff;">Add Role</span>
                                    </button>
                                </div>                                 
                            </form>  
                                                     
                        </div>
                    </div>                     
                </div>                 
            </section>
        </main>
        <div>
            <svg viewBox="0 0 100 100" preserveAspectRatio="none" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" height="160" width="100%" class="bg-white d-block text-primary">
                <path d="M 100 100 V 0 L 0 100"/>
            </svg>
        </div>
        <footer class="bg-primary pt-5 text-white"> 
            <div class="container"> 
                <div class="row"> 
                    <div class="col-xl-12 me-auto py-3"> 
                        <a href="#" class="d-inline-block fw-bold h2 link-light mb-4 text-decoration-none text-uppercase" target>Ensa tétouan</a> 
                        <p class="mb-3">Créée en septembre 2008, l&rsquo;Ecole Nationale des Sciences Appliquées de Tétouan est un établissement public à caractère scientifique, culturel et professionnel, instaurée pour être une école d&rsquo;ingénieurs de haut niveau.</p> 
                        <div class="mb-4"> 
                            <a href="#" class="link-light text-decoration-none">BP: 2222 M&apos;hannech</a> 
                            <br> 
                            <a href="#" class="link-light text-decoration-none">ensatetouan@uae.ac.ma&nbsp;<i></i></a> 
                        </div>                         
                        <div class="d-inline-flex flex-wrap"> 
                            <a href="#" class="link-light p-1" aria-label="facebook-link"> <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20"> 
                                    <path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/> 
                                </svg> </a> 
                            <a href="#" class="link-light p-1" aria-label="instagram-link"> <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20"> 
                                    <path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6.5-.25a1.25 1.25 0 0 0-2.5 0 1.25 1.25 0 0 0 2.5 0zM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/> 
                                </svg> </a> 
                            <a href="#" class="link-light p-1" aria-label="linkedin-link"> <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20"> 
                                    <path d="M6.94 5a2 2 0 1 1-4-.002 2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z"/> 
                                </svg> </a> 
                            <a href="#" class="link-light p-1" aria-label="youtube-link"> </a> 
                        </div>                         
                    </div>                     
                </div>                 
                <div class="pb-3 pt-3 text-center"> 
                    <hr class="border-light mt-0"> 
                    <p class="mb-0">Copyright &copy; 2022 Ensa Tétouan</p> 
                </div>                 
            </div>             
        </footer>
        <script src="assets/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>

<?php

    if(isset($_SESSION['idU']) && isset($_POST['idservice']) ){
        
        require_once("ldap.php");
        $ldap=new ldap();
        $ldap->AddRole($_SESSION['idU'],$_POST['idservice']);
    }
    if(isset($_SESSION['idU']) && isset($_POST['service']) ){
        
        require_once("ldap.php");
        $ldap=new ldap();
        $ldap->RemoveRole($_SESSION['idU'],$_POST['service']);
    }
    
?>

