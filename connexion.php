<?php
    require '/includes-front/entete.php';
?>

<form class="container mt-5" method="post" action="./include/controle-connexion.php">
    <div class="form-group col-md-10">
        <label for="staticPseudo" class="col-sm-2 col-form-label">Pseudo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="staticPseudo" placeholder="myusername" name="user_username" required>
        </div>
    </div>
    <div class="form-group col-md-10">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="user_password" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary col-md-10">Sign in</button>
</form>