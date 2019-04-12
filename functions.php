<?php
// maak input en toon eventuele errors
function createForm($formInputs) { 
    foreach($formInputs as $inputField) {
        // label
        if ($inputField['error'] !== "") {
            echo "<label for='{$inputField['id']}'>{$inputField['label']}</label>";
        }

        // show error message if set
        if ($inputField['error'] !== "") {
            echo "<span class='error'>{$inputField['error']}</span>";
        }

        // input
        if ($inputField['type'] != "textarea" && $inputField['type'] != "hidden") {
            echo "<input type='{$inputField['type']}' name='{$inputField['name']}' id='{$inputField['id']}' placeholder='{$inputField['placeholder']}'{$inputField['attributes']} value='{$inputField['value']}'>";
        } else if ($inputField['type'] == "textarea") {
            echo "<textarea name='{$inputField['name']}' form='{$inputField['form']}' id='{$inputField['id']}' placeholder='{$inputField['placeholder']}' {$inputField['attributes']}></textarea>";
        } else if ($inputField['type'] == "hidden") {
            echo "<input type='{$inputField['type']}' name='{$inputField['name']}' id='{$inputField['id']}' value='{$inputField['value']}'>";
        }
    }
}

// prepare zoek queries
function zoeken($tables) {
    $sql ="";
    switch ($tables) {
        case 'Gebruiker':
            $sql = "SELECT gebruikersnaam FROM Gebruiker WHERE gebruikersnaam LIKE ? OR naam LIKE ?";
            break;
        case 'Post':
            $sql = "SELECT * FROM Post WHERE author LIKE ? OR beschrijving LIKE ?";
            break;
        case 'Rubriek':
            $sql = "SELECT * FROM Rubriek WHERE naam LIKE ? OR parent_rubriek LIKE ?";
            break;
        case 'Topic':
            $sql = "SELECT * FROM Topic WHERE title LIKE ? OR beschrijving LIKE ?";
            break;

        default:
            $sql = "";
            break;
    }

    return $sql;
}

// splits zoekresultaat op in tabellen
function toonZoekresultaat($categorie, $postcontent) {
    $result = "";
    switch ($categorie) {
        case 'Gebruiker':
            $result = "<a href='bezoeker.php?gebruikersnaam=".$postcontent['gebruikersnaam']."'>".$postcontent['gebruikersnaam']."</a>";
            break;
        case 'Post':
            $result = "<a href='topic.php?id=". "{$postcontent['topic']}" . "'>".$postcontent['topic']."</a>";
            $result .= "<p>".$postcontent['beschrijving']."</p>";
            break;
        case 'Rubriek':
            $result = "<a href='rubriek.php?rubriek_naam=" . "{$postcontent['naam']}" . "&rubriek=". "{$postcontent['id']}" . "'>".$postcontent['naam']."</a>";
            break;    
        case 'Topic':
            $result = "<a href='topic.php?id=" .$postcontent['id'] . "'>" . $postcontent['title'] . "</a>";
            break;

        default:
            $result = "";
            break;
    }
    
    return $result;
}

// recente posts homepage
function toonRecentePosts($dbh, $aantal, $user="") {
    $user = "%$user%";
    if ($aantal < 0 || $aantal == "") {
        $aantal = 100;
    }

    $sql = "SELECT * FROM Post WHERE author LIKE :author ORDER BY publication_date DESC";
    $query = $dbh->prepare($sql);
    $query->execute(array(':author' => $user));
    $reacties = $query->fetchAll(PDO::FETCH_ASSOC);
    $i = 0;

    foreach ($reacties as $reactie) {
        if ($i < $aantal) { ?>
            <div class="item">
                <small><a href="bezoeker.php?gebruikersnaam=<?php echo $reactie['author'];?>"><?php echo $reactie['author'];?></a> - <?php echo $reactie['publication_date']?></small>
                <p>
                    <?php echo substr($reactie['beschrijving'], 0, 250); ?>
                </p>
                <a href="topic.php?id=<?php echo $reactie['topic']?>">
                        lees verder..
                </a>
            </div>
    <?php
        $i++;
        } else {
            break;
        }
    }
}

//
function toonVideos($zoekterm, $rubriek, $volgorde, $dbh, $aantal){
    $sql = "";
    $zoekterm = "%$zoekterm%";
    $rubriek = "%$rubriek%";

    if ($aantal == "") {
        $aantal = 100;
    }

    if ( $volgorde == "desc" ) {
        $sql = "SELECT * FROM Video WHERE titel LIKE :term AND rubriek LIKE :rubriek ORDER BY publication_date DESC";
    } else {
        $sql = "SELECT * FROM Video WHERE titel LIKE :term AND rubriek LIKE :rubriek ORDER BY publication_date ASC";
    }

    $query = $dbh->prepare($sql);
    $query->execute(array(':term' => $zoekterm, ':rubriek' => $rubriek));
    $videos = $query->fetchAll(PDO::FETCH_ASSOC);
    $i = 0;

    if (!$videos) {
        echo "geen video's gevonden.";
        exit;
    }

    foreach ($videos as $video) {
        if ($i < $aantal) { ?>
            <div class="item">
                <h3><?php echo $video['titel']; ?></h3>
                <small><?php echo $video['publication_date']?></small>
                <p><?php echo $video['samenvatting']; ?></p>
                <div class="video">
                    <iframe src="https://www.youtube.com/embed/<?php echo $video['link'];?>?modestbranding=1" allowfullscreen></iframe>
                </div>
            </div>
    <?php
        $i++;
        } else {
            break;
        }
    }
}

function maakRubriekSelect($dbh) {
    $sql = "SELECT naam, id FROM Rubriek WHERE parent_rubriek IS NOT NULL ORDER BY naam ASC";
    $query = $dbh->prepare($sql);
    $query->execute();
    $rubriek = $query->fetchAll(PDO::FETCH_ASSOC);
?>
    <select name="rubriek" id="rubriek">
        <option value="">Alle categorien</option>
    <?php foreach($rubriek as $optie): ?>
        <option value="<?php echo $optie['id']?>">
            <?php echo $optie['naam']?>
        </option>
    <?php endforeach;?>
    </select>
<?php }?>