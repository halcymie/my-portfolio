<?php

$myName = "Jamie Gayo";
$aboutText = "Hi, I'm Jamie! I'm an IT student who enjoys graphic design, creating visual content, and exploring different creative styles. I love bringing ideas to life through design.";
$interests = array("Graphic Design", "Creative Visuals", "Video Editing");


$myEmail = "gayojamie77@gmail.com";
$myFacebook = "https://www.facebook.com/halxycn";
$myGithub = "https://github.com/halcymie";


$greetings = array(
    array("hello", "ENGLISH"),
    array("kumusta", "TAGALOG"),
    array("hola", "SPANISH"),
    array("bonjour", "FRENCH"),
    array("ciao", "ITALIAN"),
    array("annyeong", "KOREAN"),
    array("konnichiwa", "JAPANESE"),
    array("hallo", "GERMAN")
);

$navLinks = array("About" => "#about", "Projects" => "#projects", "Contact" => "#contact");

$categories = array("All", "Graphic Design", "Android Development");

$projects = array(
    array("title" => "Android Quiz App", "category" => "Android Development", "year" => "2026", "description" => "An interactive quiz application developed using Android Studio and Java. It features a welcome screen, multiple-choice questions, radio button selections, and a scoring system that displays the user's final result. It also includes a Start Again feature, allowing users to retake the quiz. The project demonstrates my understanding of Android development, user interface design, and basic programming logic.", "file" => "videos/quizapp.mp4"),
    array("title" => "Android Calculator", "category" => "Android Development", "year" => "2026", "description" => "A basic Android calculator application developed using Android Studio and Java. It allows users to perform common mathematical operations through an organized and user-friendly interface. This project focuses on button interactions, handling user input, displaying calculation results, and applying basic programming logic in mobile application development.", "file" => "videos/calcu.mp4"),
    array("title" => "Create Account: Android Registration App", "category" => "Android Development", "year" => "2026", "description" => "A simple Android registration application developed using Android Studio and Java. It features a clean registration interface with input fields where users can enter their personal details and interact with a registration button. This project focuses on designing mobile layouts using XML, organizing form elements, handling user input, and connecting interface components with Java functionality. It showcases my experience in creating basic Android applications and developing user-friendly mobile interfaces.", "file" => "videos/regis.mp4"),
    array("title" => "2FAST 2FURIOUS: Suki Edition", "category" => "Graphic Design", "year" => "2024", "description" => "A movie-inspired poster featuring Suki, combining bold typography, racing aesthetics, and vibrant colors inspired by 2 Fast 2 Furious.", "file" => "images/project1.jpg"),
    array("title" => "GOJO", "category" => "Graphic Design", "year" => "2024", "description" => "A monochromatic fashion poster featuring Gojo, combining checkerboard patterns, bold outlined typography, and minimalist layouts to create a modern streetwear-inspired editorial design.", "file" => "images/project2.jpg"),
    array("title" => "jk", "category" => "Graphic Design", "year" => "2025", "description" => "A streetwear-inspired editorial design featuring JK, combining bold typography, modern fashion visuals, and monochromatic elements.", "file" => "images/project3.jpg"),
    array("title" => "Vintage Frames", "category" => "Graphic Design", "year" => "2025", "description" => "A vintage-inspired portrait poster featuring a female model, using warm tones, retro textures, and classic editorial elements.", "file" => "images/project4.jpg"),
    array("title" => "Gyaru Pop Culture", "category" => "Graphic Design", "year" => "2026", "description" => "A playful gyaru-inspired photoshoot poster featuring colorful details, expressive visuals, and Y2K design elements.", "file" => "images/project5.jpg"),
    array("title" => "Rockstar Rebellion", "category" => "Graphic Design", "year" => "2025", "description" => "A rock-inspired poster featuring a female model, combining edgy typography, dark visual elements, and alternative fashion aesthetics.", "file" => "images/project6.jpg"),
    array("title" => "Giselle: Y2K Muse", "category" => "Graphic Design", "year" => "2026", "description" => "A Y2K-inspired editorial poster featuring Giselle, highlighting pop culture and fashion through layered compositions and futuristic graphic elements.", "file" => "images/project7.jpg"),
    array("title" => "Nirvana: Grunge Revival", "category" => "Graphic Design", "year" => "2024", "description" => "A grunge-inspired photoshoot poster featuring Nirvana, using distressed textures, dark tones, and alternative rock aesthetics.", "file" => "images/project8.jpg"),
    array("title" => "Ophelia: A Visual Story", "category" => "Graphic Design", "year" => "2025", "description" => "A portrait-based editorial poster inspired by Ophelia, combining soft colors, artistic composition, and expressive visual details.", "file" => "images/project9.jpg"),
    array("title" => "好きぴ (Sukipi)", "category" => "Graphic Design", "year" => "2026", "description" => "A Japanese-inspired graphic design exploring youthful aesthetics, expressive typography, and sweet pop-culture visuals.", "file" => "images/project10.jpg"),
    array("title" => "Y2K Cyber Pop", "category" => "Graphic Design", "year" => "2026", "description" => "A futuristic Y2K-inspired poster featuring a female model, combining vibrant colors, digital graphics, and experimental typography.", "file" => "images/project11.jpg"),
    array("title" => "Vintage Boy: Retro Edit", "category" => "Graphic Design", "year" => "2026", "description" => "A retro-inspired portrait composition featuring a female model, blending vintage colors, decorative elements, and nostalgic editorial styling.", "file" => "images/project12.jpg"),
    array("title" => "Gyaru: Flashback Era", "category" => "Graphic Design", "year" => "2026", "description" => "A gyaru-inspired photoshoot poster featuring expressive fashion visuals, playful Y2K details, and vibrant early 2000s aesthetics.", "file" => "images/project13.jpg")
);

$selected = array(4, 5, 8, 12, 9, 13, 15);


// ===== ABOUT PICTURE =====
// looks inside the images folder for a file that starts with "about" (about.jpg, about.png ...)
$aboutFiles = glob(__DIR__ . "/images/about*");
$aboutImage = "";
if (count($aboutFiles) > 0) {
    $aboutImage = "images/" . rawurlencode(basename($aboutFiles[0]));
}


// ===== FUNCTIONS =====
function showMedia($file, $alt) {
    if (substr($file, -4) == ".mp4") {
        echo '<video src="' . htmlspecialchars($file) . '" autoplay muted loop playsinline></video>';
    } else {
        echo '<img src="' . htmlspecialchars($file) . '" alt="' . htmlspecialchars($alt) . '">';
    }
}

// shows one project card (used by the sliding part and by ALL WORKS)
function displayProject($title, $category, $year, $description, $file, $class = "") {
    echo '<article class="card ' . $class . '" data-category="' . htmlspecialchars($category) . '">';
    showMedia($file, $title);
    echo '<div class="meta"><h3>' . htmlspecialchars($title) . '</h3><small>' . htmlspecialchars($year) . '</small></div>';
    echo '<p>' . htmlspecialchars($description) . '</p>';
    echo '</article>';
}

// used to sort the projects: the bigger year goes first
function newestFirst($a, $b) {
    return strcmp($b["year"], $a["year"]);
}
// ===== GET THE SELECTED WORKS, THEN SORT ALL WORKS =====
// (the selected works must be collected first, because the numbers change after sorting)
$selectedWorks = array();
foreach ($selected as $number) {
    $selectedWorks[] = $projects[$number - 1];
}

// newest year first (2026, 2025, 2024)
usort($projects, "newestFirst");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($myName); ?> - Portfolio</title>

    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500;800&family=DM+Sans:wght@400;500&family=Mrs+Saint+Delafield&display=swap" rel="stylesheet">

    <!-- the ?v= part makes the browser load the newest file after I change it -->
    <link rel="stylesheet" href="style.css?v=<?php echo filemtime(__DIR__ . "/style.css"); ?>">

    <!-- turns on dark mode right away if I chose it last time -->
    <script>
        if (localStorage.getItem("theme") == "dark") {
            document.documentElement.classList.add("dark");
        }
    </script>

    <!-- sends the greetings from PHP to JavaScript -->
    <script>var greetings = <?php echo json_encode($greetings); ?>;</script>
</head>
<body>

    <!-- MENU -->
    <nav>
        <a href="#home" class="logo"><?php echo htmlspecialchars($myName); ?></a>

        <div class="links">
            <?php foreach ($navLinks as $label => $target) { ?>
                <a href="<?php echo $target; ?>"><?php echo $label; ?></a>
            <?php } ?>
        </div>

        <button class="theme-btn" id="themeToggle" aria-label="Dark or light mode"></button>
    </nav>

    <!-- 1. FIRST SCREEN -->
    <header id="home" class="landing">
        <p class="top-label fade-load" style="--d:.2s">HELLO WORLD! <i class="dot"></i></p>

        <div class="fade-load" style="--d:.6s">
            <h1 class="hello"><span id="helloWord">hello</span><span class="red">.</span></h1>
            <p class="lang" id="helloLang">ENGLISH</p>
        </div>

        <p class="welcome fade-load" style="--d:1s">WELCOME TO MY CREATIVE SPACE</p>
        <a href="#showcase" class="scroll-hint fade-load" style="--d:1.4s">SCROLL TO EXPLORE</a>
    </header>

    <!-- 2. SELECTED WORKS (they slide from right to left) -->
    <section id="showcase" class="showcase">
        <div class="bar">
            <span>SELECTED WORKS / <?php echo count($selected); ?></span>
            <span>HOVER TO PAUSE</span>
        </div>

        <div class="track">
            <!-- the works are repeated 4 times so the sliding never has an empty space -->
            <?php for ($copy = 1; $copy <= 4; $copy++) { ?>
                <div class="set">
                    <?php foreach ($selectedWorks as $work) {
                        displayProject($work["title"], $work["category"], $work["year"], $work["description"], $work["file"], "slide");
                    } ?>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- 3. ABOUT ME -->
    <section id="about" class="section about">
        <div class="photo reveal">
            <?php if ($aboutImage != "") { ?>
                <img src="<?php echo $aboutImage; ?>" alt="Picture of <?php echo htmlspecialchars($myName); ?>">
            <?php } else { ?>
                <p class="missing">Put your picture in the images folder and name it about.jpg (or about.png).</p>
            <?php } ?>

            <span class="tag t1">STUDENT</span>
            <span class="tag t2">CREATIVE</span>
        </div>

        <div class="reveal">
            <p class="label">ABOUT ME</p>
            <h2 class="title">
                <span class="hello-small">Hello, I'm</span>
                <span class="name-color"><?php echo strtoupper(htmlspecialchars($myName)); ?>.</span>
            </h2>
            <p class="lead"><?php echo htmlspecialchars($aboutText); ?></p>

            <ul class="interests">
                <?php foreach ($interests as $interest) { ?>
                    <li><?php echo htmlspecialchars($interest); ?></li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <!-- 4. ALL WORKS -->
    <section id="projects" class="section">
        <p class="label reveal">PROJECTS</p>
        <h2 class="title reveal">ALL WORKS</h2>

        <div class="filters">
            <?php foreach ($categories as $category) { ?>
                <button class="<?php if ($category == "All") { echo 'active'; } ?>" data-filter="<?php echo $category; ?>"><?php echo $category; ?></button>
            <?php } ?>
        </div>

        <div class="grid" id="projectGrid">
            <?php foreach ($projects as $project) {
                displayProject($project["title"], $project["category"], $project["year"], $project["description"], $project["file"]);
            } ?>
        </div>
    </section>

    <!-- 5. CONTACT -->
    <section id="contact" class="section">
        <p class="label reveal">CONTACT</p>
        <h2 class="title reveal">LET'S CONNECT<span class="red">.</span></h2>
        <p class="lead reveal">Message me anytime. I read every message.</p>

        <div class="contact-links reveal">
            <button type="button" class="btn" id="emailBtn">EMAIL ME &rarr;</button>
            <a href="<?php echo htmlspecialchars($myFacebook); ?>" target="_blank" rel="noopener" class="btn">MESSAGE ME ON FACEBOOK &rarr;</a>
            <a href="<?php echo htmlspecialchars($myGithub); ?>" target="_blank" rel="noopener" class="btn">VIEW MY GITHUB &rarr;</a>
        </div>
    </section>

    <!-- POPUP: opens when I click a project -->
    <div class="modal" id="workModal">
        <div class="modal-box">
            <div class="modal-top">
                <span id="workMeta">PROJECT</span>
                <button type="button" class="modal-close" id="workClose" aria-label="Close"></button>
            </div>
            <div class="work-media" id="workMedia"></div>
            <h2 id="workTitle"></h2>
            <p class="modal-desc" id="workDesc"></p>
        </div>
    </div>

    <!-- POPUP: opens when I click EMAIL ME -->
    <div class="modal" id="emailModal">
        <div class="modal-box">
            <div class="modal-top">
                <span>DIRECT CONTACT / EMAIL</span>
                <button type="button" class="modal-close" id="emailClose" aria-label="Close"></button>
            </div>
            <p class="modal-small">HAVE SOMETHING IN MIND?</p>
            <h2>Let's start a conversation.</h2>
            <p class="modal-email" id="modalEmail"><?php echo htmlspecialchars($myEmail); ?></p>
           
            <div class="modal-actions">
                <button type="button" id="copyEmail">COPY EMAIL</button>
            </div>
        </div>
    </div>

    <footer><span><?php echo htmlspecialchars($myName); ?> &copy; <?php echo date("Y"); ?></span>
    </footer>

    <script src="script.js?v=<?php echo filemtime(__DIR__ . "/script.js"); ?>"></script>
</body>
</html>