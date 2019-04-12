<?php 
    include("header.php");
    require("db.php");
    include("functions.php");
?>

<main>
    <h1>Over ons</h1>
    <div class="persons">
        <div class="person card">
            <div class="person__pf-pic">
                <img src="assets/img/pf-stijn-1.jpg" alt="profielfoto van Stijn">
            </div>
            <blockquote class="quote">
                “Do what you can, with what you have, where you are.” <span class="quote-author">―
                    Theodore
                    Roosevelt</span>
            </blockquote>

            <p>
                Ik ben Stijn van Ewijk, 24 jaar oud. Wonende in Tiel, VWO-diploma behaald.
            </p>

            <span class="thicc">Hobbies</span>
            <ul class="hobbies">
                <li>Lezen</li>
                <li>Gamen</li>
                <li>Fitness</li>
                <li>Chillen</li>
            </ul>

            <div class="contact-me">
                <a href="mailto:TS.vanEwijk@student.han.nl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"
                            class="contact-me__icon" />
                        <path d="M0 0h24v24H0z" fill="none" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="person card">
            <div class="person__pf-pic">
                <img src="assets/img/pf-bj.jpg" alt="profielfoto van BJ">
            </div>
            <blockquote class="quote">
                Why so serious? <span class="quote-author">― The Joker</span>
            </blockquote>

            <p>
                Ik ben Bert-Jan Zwanepol, 24 jaar jong.
            </p>
            <span class="thicc">Hobbies</span>
            <ul class="hobbies">
                <li>Lezen</li>
                <li>Dingen, zoals dit awesome forum, ontwerpen</li>
                <li>Gezellig wat drinken met vrienden en burgers eten</li>
                <li>Hardlopen</li>
            </ul>
            <div class="contact-me">
                <a href="mailto:B.Zwanepol@student.han.nl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"
                            class="contact-me__icon" />
                        <path d="M0 0h24v24H0z" fill="none" />
                    </svg>
                </a>
            </div>
        </div>

</main>
<?php require("footer.php"); ?>