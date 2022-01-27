<?php

//$ldap_dn = "cn=read-only-admin,dc=example,dc=com";
//$ldap_password = "password";
$ldap_dn = "cn=admin,dc=ENSAte,dc=uae,dc=ac,dc=ma";
$ldap_password = "oknaa";


//$ldap_URI = "ldap.forumsys.com";
//$ldap_URI = "ldap://ldap.ensate.uae.ac.ma";
//$ldap_URI = "https://d283-105-71-144-160.ngrok.io";
$ldap_URI = "ldap://localhost:389";
$ldap_conn = ldap_connect($ldap_URI) or die("Could not connect to LDAP server.");
//ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);


if (ldap_bind($ldap_conn, $ldap_dn, $ldap_password)){
    echo "Bind successful";
} else {
    echo "Invalid user/password";
}

