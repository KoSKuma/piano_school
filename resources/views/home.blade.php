<!-- View stored in resources/views/user/home.blade.php -->

<html>
    <body>
        <h1>Hello, <?php echo $user->name; ?></h1>
        <div><?php echo $user->role; ?></div>
        <br /><a href="{{url("/auth/logout")}}">Logout</a>
    </body>
</html>