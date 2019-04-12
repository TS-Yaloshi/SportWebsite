<?php 
    include("header.php"); 
    require("functions.php");
    require("assets/data/login-form.php");
?>
<main>
    <form action="login-verify.php" id="login-form" method="post" class="vertical-form">
        <h1>Aanmelden</h1>
        <?php createForm($loginForm);?>

        <div class="form-row">
            <span>
                Nog geen account?
                <a href="registreren.php">Registreer hier</a>
            </span>
            <input type="submit" class="action" value="Aanmelden">
        </div>
    </form>
</main>
<?php include("footer.php"); ?>