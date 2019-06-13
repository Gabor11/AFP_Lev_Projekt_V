function IsUserLoggedIn(){
    return  array_key_exists('uid', $_SESSION) &&
            is_numeric($_SESSION['uid']);
}
