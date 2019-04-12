<?php 
    include("header.php");
    require("db.php");
    include("functions.php");
?>

        <main>
            <h1>Welkom op het bergsport forum</h1>
            <p>
                Het thema van deze website is bergsport. We hebben er een mix van gemaakt van sporten op een sneeuwberg, en sporten die je ook kan beoefenen op een normale berg. De subthema's zijn skiën, snowboarden, bergwandelen en bergklimmen.
            </p>
            <section class="latest-posts">
                <h2>Laatste reacties</h2>
                <div class="row recent">
                    <?php toonRecentePosts($dbh, 3, "", "post");?>
                </div>
            </section>
            <section>
                <h2>Featured video's</h2>
                <div class="row recent">
                    <?php toonVideos("", "", "desc", $dbh, 3);?>
                </div>
            </section>
        </main>
<?php require("footer.php"); ?>