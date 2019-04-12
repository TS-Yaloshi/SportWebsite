USE master
GO

--DROP DATABASE Bergsport

CREATE DATABASE Bergsport
GO

USE Bergsport
GO

CREATE TABLE Gebruiker
(
     gebruikersnaam     NVARCHAR(255)   PRIMARY KEY
    ,wachtwoord         NVARCHAR(100)   NOT NULL
    ,naam               NVARCHAR(100)   NOT NULL
)
GO

CREATE TABLE Rubriek
(
     id                 INT             IDENTITY(1,1) PRIMARY KEY
    ,naam               NVARCHAR(50)    NOT NULL
    ,parent_rubriek     INT             NULL 

    CONSTRAINT FK_parent_rubriek FOREIGN KEY (parent_rubriek) REFERENCES Rubriek (id)
)
GO

CREATE TABLE Topic
(
     id                 INT             PRIMARY KEY IDENTITY(1,1)
    ,title              NVARCHAR(100)   NOT NULL
    ,beschrijving       TEXT            NOT NULL
    ,author             NVARCHAR(255)   NOT NULL
    ,rubriek            INT             NOT NULL
    ,publication_date   DATETIME        NOT NULL

    CONSTRAINT FK_topic_author FOREIGN KEY (author) REFERENCES Gebruiker (gebruikersnaam),
    CONSTRAINT FK_rubriek      FOREIGN KEY (rubriek) REFERENCES Rubriek (id)
)
GO

CREATE TABLE Post
(
     id                 INT             PRIMARY KEY IDENTITY(1,1)
    ,beschrijving       NVARCHAR(MAX)   NOT NULL
    ,author             NVARCHAR(255)   NOT NULL
    ,topic              INT             NOT NULL
    ,publication_date   DATETIME        NOT NULL

    CONSTRAINT FK_post_author   FOREIGN KEY (author) REFERENCES Gebruiker (gebruikersnaam),
    CONSTRAINT FK_owner_topic   FOREIGN KEY (topic) REFERENCES Topic (id)
)
GO

CREATE TABLE Video
(
     titel              NVARCHAR(100)   NOT NULL
    ,samenvatting       NVARCHAR(255)   NULL
    ,link               NVARCHAR(255)   PRIMARY KEY
    ,rubriek            INT             NOT NULL
    ,publication_date   DATETIME        NOT NULL

    CONSTRAINT FK_video_rubriek   FOREIGN KEY (rubriek) REFERENCES Rubriek (id)
)
GO

INSERT INTO Rubriek (naam, parent_rubriek)
VALUES
        ('Skiën', NULL),
        ('Snowboarden', NULL),
        ('Bergwandelen', NULL),
        ('Bergbeklimmen', NULL),
        ('Skigebieden', 1),
        ('Weer en sneeuw',1),
        ('Materiaal',1),
        ('Freeride',2),
        ('Freestyle',2),
        ('Alpineboarden',2),
        ('Uitrusting',3),
        ('Berggebieden',3),
        ('Moeilijkheidsgraad',3),
        ('Klimdisciplines',4),
        ('Klimuitrusting',4),
        ('Klimgebieden',4)
GO

INSERT INTO Gebruiker (gebruikersnaam, wachtwoord, naam)
VALUES
        ('User-0', '$2y$10$aqi2HFDdQRASZOZPB.fR4e0Fj2l7nEEl1hDYzOexXCRoatpZZP7om', '0-User'),
        ('User-1', '$2y$10$L3fu6BKqyBFayucxITtaDuCoiarM9J9qwSmSSwt0/wctgX0coqhq2', '1-User'),
        ('User-2', '$2y$10$YPX/.XZebgI.z6FzwgwDt.Z4qv8SJadSVZMxQz7jEwwLC8SC9dCqS', '2-User'),
        ('User-3', '$2y$10$DRcCpqC9dRIhHx9T7jd0oumBQkcCTwPW0vTKqZs7ap5B2eoaOgwPm', '3-User'),
        ('User-4', '$2y$10$6R26C/dw0cV5N4mu5uCTiu0bYWw2T.gyjG.YQlcXd9C/p9ozfWN2i', '4-User'),
        ('User-5', '$2y$10$aoumnbzeiF/NyulPPKM61uZTMIWc6j4/ctnvrGlchzZJDmU0ssrI6', '5-User'),
        ('User-6', '$2y$10$usAPdcGbAN0t55.3M/6tou0NjoeuR5JCXDIycX5SSTm856brZvAqy', '6-User'),
        ('User-7', '$2y$10$0E0CPvVwQVqpJfIft9zJPuZq.1nsWMwXLE69xdiGP2wnGAOlJ3jze', '7-User'),
        ('User-8', '$2y$10$e0h98f0YaUOzw6b22W2tmu5TtQLL/0fz0Pq87TXRWOzbW8ABh/3Cy', '8-User'),
        ('User-9', '$2y$10$t1tAQoRqYIYPrB5k.RB7ROe9OnFAIOHTfZMIUh1dBDja1CznGrury', '9-User'),
        ('User-10', '$2y$10$JtqpzKjKEtpUV1GkvnhsEeoM8iRSIVADRQf8qdnLCHz63rP5mamT.', '10-User'),
        ('User-11', '$2y$10$o1rm3KWN1yqcVPm.Sstskenq3R3wUwn4dCJlnlK88ORi.QihnRm86', '11-User'),
        ('User-12', '$2y$10$jdKsph23VvevA28QQxeyruWZXW3iISbZK5UnGz66PlGiacFxRm/zC', '12-User'),
        ('User-13', '$2y$10$rWpwUFgn0hZkQHzlWzf6Pe4iifQg7Pi0EcFjWfDh8Pw7GgcEKABh.', '13-User'),
        ('User-14', '$2y$10$ZdK5OejPG8CU1feZlwAVnOSe2AExLqABJXWu9TpplVE7sedmMKUHi', '14-User'),
        ('User-15', '$2y$10$aXoqIqoquxRrboMsykRo4.PjJoaRprboDcRt1IWDmV.e3vVKJRWKm', '15-User'),
        ('User-16', '$2y$10$EddeN7R.mIf4F8ojZUhxIugl0ITyfQYgJcbCmavGmP8MTSTCzch5O', '16-User'),
        ('User-17', '$2y$10$QiZELZn2s8cAvZgw4Vw3sOF63VRT0yc38efrpt/8JmqJuaPWf3PLe', '17-User'),
        ('User-18', '$2y$10$y61ymyXG1tiKiu3s4lT8QObfFrdHhUtpEX6xTG4H/EnxXLWD6iYre', '18-User'),
        ('User-19', '$2y$10$8mRhufdin.4HnbNUBRB/iOg.lISpBXkPKej.4rkY5KWr1t1IIhGd.', '19-User'),
        ('User-20', '$2y$10$hx46f8HDfcOwuLetbUPFze9ff2EOkI1274ZyWvwgsES0QI51XVNeO', '20-User'),
        ('User-21', '$2y$10$eI5DIkCBCOc56Z2OLi.uW.vHR4Lhq3x0ctUqoRw6Bb1ULVLz1VJxW', '21-User'),
        ('User-22', '$2y$10$MOYZYFb9lLXJHHn0IpNZIO8.qg1WmxoIOntqaqhW0ZIVePSYBfiVW', '22-User'),
        ('User-23', '$2y$10$XqsEnCR3N.tEkQeAD1Ah5OZ/7SE3v7d0lbXCWX1Q2cpnbl6n2IrVW', '23-User'),
        ('User-24', '$2y$10$yKikyalo3hicEHcMzw77XexDObDXU1RTXp5y6E60MyzWiM.VuCKbC', '24-User')
GO

INSERT INTO Topic (title, beschrijving, author, rubriek, publication_date)
VALUES
        (
            'Kronplatz vs Schladming',
            'Het is een beetje appels met peren vergelijken maar toch!!
            We gaan in Maart met groep diverse niveau van beginner tot redelijk gevorderd.
            1 van deze bestemmingen gaat het worden is er besloten. Welke het gaat worden hangt een beetje af waar de "beste" après ski is.
            Hoeven nou niet direct oerhollands te zijn als er maar een leuke gezellig tent is met wat leuke muziek en sfeer. Liever iets te klein dan te groot zonder sfeer.
            Wellicht is er iemand in beide gebieden geweest en ons wat kan helpen.',
            'User-0',
            5,
            GETDATE()
        ),
        (
            '20-27 januari skiën: waar? Is frankrijk een optie?',
            'Volgende week wil ik met een vriend gaan pisteskiën (evt offpiste, maar is meer bonus dan hoofddoel). Ik wil woensdag of donderdag gaan boeken. Zaterdagavond rijden, zondag aankomen. En dan voor een week. Dus 20-27 januari.

            Er is natuurlijk idioot veel sneeuw in Oostenrijk. Vorige week was ik nog in Kaprun. En elk willekeurig skigebied i nOostenrijk heeft nu voldoende sneeuw. Alleen even rekening houden met of ''t niet gesloten kan worden.

            Maar ik vroeg mij af of Frankrijk ook nog een optie zou zijn? Meestal is accommodatie&pas daar namelijk een stuk goedkoper. Hebben jullie tips?',
            'User-24',
            5,
            GETDATE()
        ),
        (
            'Sneeuwsituatie Winterberg 18/19',
            'De kou lijkt grotendeels van de kaarten verdwenen, maar wie weet kan er een laagje gespoten worden de komende week, naast een paar vlokken natuursneeuw.....',
            'User-11',
            6,
            GETDATE()
        ),
        (
            'Waar sneeuwzekerheid met Pasen (8 april - 20 april)?',
            'Hoi, 
            Ik ben even aan het kijken voor een shortski in de paasvakantie... waar is het nog echt de moeite om zo laat in het seizoen te gaan skiën...
            overal op de site lees ik dat na 13u het beste eraf is in al die hoger gelegen skigebieden... 
            Bedankt voor de tips!',
            'User-6',
            6,
            GETDATE()
        ),
        (
            'sporthorloge geschikt om te skiën',
            'Ben toe aan een nieuwe sporthorloge, en wil deze gebruiken voor het skiën en mountainbiken. Ook zou het leuk zijn als ze de prestaties van mijn wekelijkse fitness zou registreren. Misschien bestaat er ook een app voor Windows phone die te gebruiken valt.',
            'User-19',
            7,
            GETDATE()
        )
GO

INSERT INTO Post (beschrijving, author, topic, publication_date)
VALUES
        (
            'Als jullie op zoek zijn naar après-ski, dan ga je best naar Schladming (Planai). De après-ski in Kronplatz is geen hoogvlieger, maar wel gewoon oké.

            Maar... als jullie op zoek zijn naar het beste skigebied voor een diverse groep zijn met beginners en licht gevorderden, dan zou ik Kronplatz aanraden. Een fantastisch gebied voor beginners met hele brede, lange, voorspelbare blauwe pistes. 

            Bovendien komt alles samen op één punt (de klok bovenop de Kronplatz) waardoor het heel makkelijk is om ''s middags allemaal samen te komen. De vier bergen van Schladming is in de breedte heel erg uitgestrekt, waardoor dat daar minder evident is.',
            'User-1',
            1,
            GETDATE()
        ),
        (
            'Thankx. Zal het gaan voorleggen.',
            'User-0',
            1,
            GETDATE()
        ),
        (
            'Niet te veel promo maken voor Schladming! sttt ^^ Absoluut mee eens trouwens, geweldig gebied en heel gezellig!',
            'User-3',
            1,
            GETDATE()
        ),
        (
            'In Frankrijk valt nu sneeuw geloof ik. En de komende dagen nog wat meer als ik de voorspellingen mag geloven...',
            'User-20',
            2,
            GETDATE()
        ),
        (
            'I am going to Méribel on the 20th for a ski test. I checked out the conditions with local friends. Should be quite OK even though if there won''t be a LOT of snow.',
            'User-8',
            2,
            GETDATE()
        ),
        (
            'Beetje rondgekeken, Valfrejus is erg in de aanbieding. Met eskimopas iets van €170 voor week + pas. Indien erg sneeuw is wel leuk om eens zoiets te doen en dan de bijbehorende gebiedjes ook verkennen.',
            'User-15',
            2,
            GETDATE()
        ),
        (
            'Het blijft volgens Wetter-Sauerland.de, die ik nogal betrouwbaar vind, tussen de -3 en +3. komende 10 dagen. Stemt hoopvol.',
            'User-20',
             3,
             GETDATE()
        ),
        (
            'Ik heb alleen maar gezegd dat als de kou die op dat moment op de kaarten stond ze de snowmakers er niet bij zouden gebruiken... Die kou is nu al weer bijna volledig van de kaarten dus hebben ze weinig keus omdat ze eigenlijk maar 1 dag hebben waarin het echt koud genoeg is om goed de sneeuwkanonnen aan te zetten. Maar als jij graag woorden volledig verdraaid om iemand zwart te maken, ga vooral je gang, maar kies de volgende keer iemand anders...',
            'User-8',
            3,
            GETDATE()
        ),
        (
            'Ik verwacht een ''sneeuwvenster'' bij -3 tot -5 van maandagavond tot woensdagochtend, maar gezien de hoge luchtvochtigheid zal de opbrengst relatief gering zijn. Ik vraag me af of ze de kanonnen úberhaupt (massaal) inzetten.',
            'User-23',
            3,
            GETDATE()
        ),
        (
            'Hoog, veel noorhellingen. Val Thorens, Tignes, Ischgl, Serre Chevalier...',
            'User-16',
            4,
            GETDATE()
        ),
        (
            'Het hangt er inderdaad echt vanaf. Vorig jaar was Sölden (en in mindere mate Gurgl) echt top midden april. Tignes en Val Thorens zijn echt een no-brainer. Altijd goed. En rond die tijd een groot gebied achter de hand.',
            'User-2',
             4,
             GETDATE()
        ),
        (
            'Ik zou voor de TomTom adventurer gaan!',
            'User-16',
            5,
            GETDATE()
        ),
        (
            'Ik zeg Garmin Vivoactive HR (die heb ik zelf). Garmin is w.m.b. het merk wat de meest gebruikte protocollen ondersteunt, ANT+ en Bluetooth Smart.',
            'User-13',
            5,
            GETDATE()
        ),
        (
            'Waarom gebruik je niet gewoon een app op je smartphone? Ski Tracks bijvoorbeeld.',
            'User-20',
             5,
             GETDATE()
        ),
        (
            'Zoals Alex zegt, Garmin Vivoactive HR, sinds kort in mijn bezit.',
            'User-3',
            5,
            GETDATE()
        ),
        (
            'Zelf heb ik de Suunto Ambit 2 - perfect horloge voor outdoor sports / skiën / watersport / fietsen, en ook in de sportschool of tijdens hardlopen sla je er geen gek figuur mee.',
            'User-23',
            5,
            GETDATE()
        )
GO

INSERT INTO Video (titel, samenvatting, link, rubriek, publication_date)
VALUES  
        (
            'Zillertal 3000 - Skigebied Review - Wintersporters',
            'Het skigebied Zillertal 3000 ligt achteraan in het bekende Zillertal in Tirol, Oostenrijk. Het bestaat uit enkele samengevoegde skigebieden in en rond de gemeente Tux waarvan Mayrhofen en de Hintertuxer Gletscher de bekendste zijn.',
            '1Zjmb1NAOWs',
            '5',
            GETDATE()
        ),
        (
            'Vijf tips voor het skigebied van Serfaus-Fiss-Ladis',
            'Veel pistes, moderne liften, hoog en sneeuwzeker en een gezellige après-ski. Het is logisch dat dit gebied extreem populair is bij Nederlanders.',
            'zyUOj7l1B0c',
            '5',
            GETDATE()
        ),
        (
            'SkiWelt Wilder Kaiser-Brixental, Oostenrijk - Skigebied review - Snowplaza',
            'Snowplaza.nl testte het skigebied SkiWeltWilder Kaiser-Brixental. Wat zijn de voor- en nadelen van het gebied, hoe zijn de pistes en waar kun je lekker eten?',
            'fWRspBBJAWY',
            '5',
            GETDATE()
        ),
        (
            'Men’s Snowboard Slopestyle: FULL BROADCAST | X Games Aspen 2018',
            'Watch the spoiler-free full broadcast of the Men’s Snowboard Slopestyle final at X Games Aspen 2018.',
            'SDdfIqJLrq4',
            '9',
            GETDATE()
        ),
        (
            'The Ultimate Snowboarding Compilation (The Art Of Snowboarding)',
            'This is a compilation of amazing snowboarding clips taken from all over the world and from a variety of snowboarders including professional snowboarders.',
            '0uGETVnkujA',
            '9',
            GETDATE()
        ),
        (
            'Everest Gear Check 3-23-15',
            'I run through my Everest expedition kit a few hours before leaving.',
            'yvAeyYt_ek0',
            '14',
            GETDATE()
        ),
        (
            'Essential Mountain Climbing Gear - How to Climb a Mountain on Outside Today',
            'Nick Heil is at Neptune Mountaineering in Boulder, Colorado with Gary Neptune to talk about the gear required for climbing a mountain.',
            'Odpkv6I7n0M',
            '14',
            GETDATE()
        ),
        (
            'Huashan Plank Walk, full experience in HD, with snow!',
            'Watch this to see the entire walk and issues faced when there''s just too many people there at the same time!!',
            'EjvLIvnrTvU',
            '13',
            GETDATE()
        ),
        (
            'Why K2 is a harder climb than Mt. Everest',
            'Vanessa O''Brien is an expert mountaineer. She is the fastest woman to climb the highest peak on every continent and the first American and British woman to climb K2.',
            'Y17A0TraSjY',
            '16',
            GETDATE()
        ),
        (
            'Hardest Mountain To Climb - 10 Most Difficult Mountains To Climb In The World',
            'What is the hardest mountain to climb? Is it the tallest, the steepest, the one with the slipperiest rock walls or the fewest handholds?',
            'wreew3-dacI',
            '11',
            GETDATE()
        ),
        (
            'GoPro: Rock Climbing China''s White Mountain With Abond',
            'Liu Yongbang, aka "Abond," attempts to climb a 5.14 D climbing route, Hot Dumpling — one  of the most challenging climbing routes found.',
            'HY3pDs3iKfk',
            '16',
            GETDATE()
        ),
        (
            'Parts of Europe blanketed by heavy snowfall',
            'Heavy snowfall has caused chaos in Germany and Austria, as both countries remain on high alert.',
            '3jj9n74xNW8',
            '6',
            GETDATE()
        ),
        (
            'AUSTRIA Austrian Alps with die Mayrhofner & die Zillertaler Buam',
            'Perfect groups to enjoy the beautiful Austrian Alps (Dachstein and other mountains) in summertime.',
            'sfBiI6-PnB4',
            '6',
            GETDATE()
        ),
        (
            'The World''s Most Dangerous Downhill Ski Race | Streif: One Hell Of a Ride',
            'From top to bottom, the Streif presents skiers with one imposing challenge after another.',
            'Hq_wxQiJxz0',
            '10',
            GETDATE()
        ),
        (
            'Fabian Lentsch''s Road to the 8 World Tour',
            'There''s no arguing that this kid has guts...lots of ''em. When it comes to freeride skiing, Lentsch has pushed the boundaries of what''s capable on a mountain.',
            'YlFFKbulFW0',
            '8',
            GETDATE()
        ),
        (
            'Best of 8 and 9 Skiing Ever HD',
            '8 Ski & Heli Skiing [heliskiing] Freeskier',
            '2hDlYxRLXjA',
            '8',
            GETDATE()
        ),
        (
            'DASEIN MOVIE (St. Anton am Arlberg, 8, Off piste, Häusl, Heregger, Mackowitz, Arlberg)',
            'DASEIN -- A MOVIE ABOUT THE CONNECTION BETWEEN EVERYDAY LIFE AND FREEDOM',
            '4bFEoPg0UBU',
            '9',
            GETDATE()
        ),
        (
            'World''s Most Dangerous Hiking Trail on Mount Huashan',
            'Although no official statistics are kept some say that the number may be as much as about 100 fatal falls a year.',
            'KbtZfzxX44o',
            '13',
            GETDATE()
        ),
        (
            'Dangerously Steep Trekking Steps In India',
            'This 2300 foot trekking route is not one for the faint hearted!',
            '8VWcQfLxHXM',
            '13',
            GETDATE()
        ),
        (
            'Top 10 Most Beautiful Hikes In The World',
            '10 of the most incredible hiking trails our planet has to offer.',
            'B1jM3kFwOio',
            '12',
            GETDATE()
        ),
        (
            'THE TRUTH ABOUT HIKING RAINBOW MOUNTAIN',
            'Hiking Rainbow Mountain was both the hardest and most rewarding hikes I''ve ever done.',
            'bLqXKBdXAwk',
            '12',
            GETDATE()
        ),
        (
            'sebo alpine boarden burton factory prime',
            'description',
            'HphO9ju4mIw',
            '10',
            GETDATE()
        ),
        (
            'Saturday on alpineboard',
            'description',
            'NZU5BhF1fdM',
            '10',
            GETDATE()
        ),
        (
            'laura alpineboarding in toronto part2',
            'description',
            'AI4TWj7mxZM',
            '10',
            GETDATE()
        ),
        (
            'Pushing Powder Skiing Past the Limit in Record Snowfall',
            'description',
            '32crEYpLZu0',
            '6',
            GETDATE()
        ),
        (
            'DE 1E WINTERSPORT DAG VERLOOPT NIET ZO SOEPEL!',
            'description',
            'Uc_WDgk9TS4',
            '6',
            GETDATE()
        )