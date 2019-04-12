<?php 
    include("header.php");
    require("assets/data/registratie-form.php");
    require("functions.php");
?>
<main>
    <form action="add-user.php" id="login-form" method="post" class="vertical-form">
        <h1>Registreren</h1>
        <?php createForm($registratieForm);?>

        <div class="form-row">
            <span>
                Al een account?
                <a href="login.php">Klik hier om in te loggen</a>
            </span>
            <input type="submit" class="action" value="Registreren">
        </div>
    </form>
    
</main>
<?php include("footer.php"); ?>