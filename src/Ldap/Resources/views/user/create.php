<h2>New user</h2>
<?php  
    $action=$_SERVER['REQUEST_URI']; //'/ldap/user/create'; 
    $_ctrl_action = 'create'; 
    include __DIR__.'/_form.php';
?>
<a href="/ldap/user/list">Back to list</a>