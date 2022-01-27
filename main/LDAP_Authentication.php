<?php

function ConnectToLDAP($user_email, $user_password){
    $ldap_connection = EstablishConnection();
    $userData = SearchForUser($ldap_connection, $user_email);

    if ($userData == false) {
        echo "User doesnt exist";
        return false;
    }
    /*
    print_r("<br>data[0][0] : ". $data[0][0]);
    print_r("<br>data[0][1] : ". $data[0][1]);
    print_r("<br>data[0][2] : ". $data[0][2]);
    print_r("<br>data[0][3] : ". $data[0][3]);
    print_r("<br>data[0][4] : ". $data[0][4]);
    print_r("<br>data[0][5] : ". $data[0][0]);
*/

    $fetchedPassword = ldap_get_values($ldap_connection, $userData, "userpassword")[0];

    //print_r("<br>data[0][3] : ". $fetchedPassword ."<br>");
    //if ($user_password != $userData[0][3][0]) { // $data[0][3] is for $data[0]["userpassword"]
    if ($user_password != $fetchedPassword) { // $data[0][3] is for $data[0]["userpassword"]
        echo "Incorrect user password";
        return false;
    }

    /*
    echo "\n<h3>dn: ". $data[0]["dn"]."</h3>";
    echo "\n<h3>cn: ". $data[0]["cn"]."</h3>";
    echo "\n<h3>sn: ". $data[0]["sn"]."</h3>";
    echo "\n<h3>mail: ". $data[0]["mail"]."</h3>";
    echo "\n<h3>password: ". $data[0]["userPassword"]."</h3>";

    */

    return array(ConnectAsUser($ldap_connection, ldap_get_dn($ldap_connection, $userData), $user_password), $userData);
}

function ConnectAsUser($ldap_connection, $user_DN, $user_Password){
    //$user_DN = "cn=admin,dc=ENSAte,dc=uae,dc=ac,dc=ma";
    //$user_Password = "oknaa";
    /*
    $ldap_URI = "ldap://192.168.80.128:389/";
    $ldap_conn = ldap_connect($ldap_URI) or die("Could not connect to LDAP server.");
    ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
    */

    if (ldap_bind($ldap_connection, $user_DN, $user_Password)) {
        return $ldap_connection;
    } else {
        echo "Invalid user/password";
        return false;
    }
}

function EstablishConnection(){
    $admin_DN = "cn=admin,dc=ENSAte,dc=uae,dc=ac,dc=ma";
    $admin_Password = "oknaa";

    $ldap_URI = "ldap://192.168.80.128:389/";
    $ldap_conn = ldap_connect($ldap_URI) or die(" Could not connect to LDAP server as Admin. ");
    ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);

    if (ldap_bind($ldap_conn, $admin_DN, $admin_Password)) {
        //echo "Bind successful";
        return $ldap_conn;
    } else {
        //echo "Invalid user/password";
        return false;
    }
}
function SearchForUser($ldapConnection, $userEmail){
    //$ldap_filter = "(mail=hseghiouer@uae.ac.ma)";
    $ldap_filter = "(mail=". $userEmail .")";
    $result = ldap_search($ldapConnection, "dc=ENSAte,dc=uae,dc=ac,dc=ma", $ldap_filter) or die("Error in search query: " . ldap_error($ldapConnection));
    //return ldap_get_entries($ldapConnection, $result);
    return ldap_first_entry($ldapConnection, $result);
}



function Testing(){

    $ldap_dn = "cn=admin,dc=ENSAte,dc=uae,dc=ac,dc=ma";
    $ldap_password = "oknaa";

    $ldap_URI = "ldap://192.168.80.128:389/";
    $ldap_conn = ldap_connect($ldap_URI) or die("Could not connect to LDAP server.");

    ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);

    if (ldap_bind($ldap_conn, $ldap_dn, $ldap_password)) {
        echo "Bind successful";


        $ldaptree = "dc=ENSAte,dc=uae,dc=ac,dc=ma";
        $ldap_filter = "(mail=hseghiouer@uae.ac.ma)";
        $result = ldap_search($ldap_conn, $ldaptree, $ldap_filter) or die("Error in search query: " . ldap_error($ldap_conn));
        $data = ldap_get_entries($ldap_conn, $result);

        // SHOW ALL DATA
        echo '<h1>Dump all data</h1><pre>';
        //print_r($data);
        echo '</pre>';


        // iterate over array and print data for each entry
        echo "\n<h1>Show me the users</h1>";
        for ($i = 0; $i < $data["count"]; $i++) {
            echo "\ndn is: ". $data[$i]["dn"];
            echo "\nUser: " . $data[$i]["cn"][0];
            if (isset($data[$i]["mail"][0])) {
                echo "\nEmail: " . $data[$i]["mail"][0];
            } else {
                echo "\nEmail: None";
            }
        }
    } else {
        echo "Invalid user/password";
    }


// ldapsearch -x -b "dc=ensate,dc=uae,dc=ac,dc=ma" -H ldap://localhost -D "cn=admin, dc=ensate,dc=uae,dc=ac,dc=ma" -W "cn=ABDELHAMID BENKADDOUR" cn uid homeDirectory
}