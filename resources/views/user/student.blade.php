<!-- View stored in resources/views/user/student.blade.php -->

<html>
    <body>
        <h1>Hello student, <?php echo $user->name; ?></h1>
        <div><?php echo $user->role; ?></div>
        <br /><a href="{{url("/auth/logout")}}">Logout</a>
    </body>
</html>