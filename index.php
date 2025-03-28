<?php
include 'db.php';
$university_name = "Sana All University";
$year_founded = 2025;

$info_sections = [
    [
        "image" => "assets/pic1.jpg",
        "title" => "University Facilities That Make Learning Better!",
        "content" => "World-class facilities for a top-tier student experience! At Sana All University, we provide everything you need to succeed..."
    ],
    [
        "image" => "assets/pic2.jpg",
        "title" => "How Students Can Learn Significantly at School",
        "content" => "Enrolling in school is just the first step—learning significantly is the real goal!"
    ]
];

$highlights = [
    ["image" => "assets/highlight1.jpg", "title" => "Your Trash, Our Responsibility: Beach Cleanup Drive 2025", "desc" => "📢 Let’s make our beaches shine again!"],
    ["image" => "assets/highlight2.jpg", "title" => "Nature Quest: An Unforgettable Field Trip", "desc" => "🌿 Experience the great outdoors like never before!"],
    ["image" => "assets/highlight3.jpg", "title" => "Class of 2024: One Year, One Dream, One Victory!", "desc" => "🎓 Congratulations, graduates!"]
];

$news = [
    ["image" => "assets/news1.jpg", "title" => "Sana All Cares: Beach Cleanup Drive 2025 a Success!", "desc" => "Trash-picking event to help protect marine life and keep our shores clean."],
    ["image" => "assets/news2.jpg", "title" => "Sana All May Talent: University Talent Show Shines Bright", "desc" => "The Sana All University Talent Show brought out the best of student creativity..."]
];

$events = [
    ["image" => "assets/events1.jpg", "title" => "Sana All May Puso: Valentine's Day Fair 2025"],
    ["image" => "assets/events2.jpg", "title" => "Sana All Matibay: University Sports Fest 2025"],
    ["image" => "assets/event3.jpg", "title" => "Sana All May Ambag: Community Outreach Program"],
    ["image" => "assets/events4.jpg", "title" => "Sana All May Future: Career & Internship Fair"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $university_name; ?></title>
    <style>
html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    scroll-behavior: smooth;
    font-family: Arial, sans-serif;
}
.navbar {
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: <?php echo isset($designSettings['navbar_padding']) ? $designSettings['navbar_padding'] : '15px 20px'; ?>;
    transition: all 0.3s ease;
    background: <?php echo isset($designSettings['navbar_bg_color']) ? $designSettings['navbar_bg_color'] : 'transparent'; ?>;
}

.logo {
    height: 50px;
    transition: all 0.3s ease;
    filter: invert(0);
}

.university-name {
    font-size: 24px;
    margin-left: 2%;
    font-weight: bold;
    color: black;
    transition: all 0.3s ease;
}

.hero-section {
    position: relative;
    width: 100%;
    height: 100vh;
    text-align: <?php echo isset($designSettings['hero_text_position']) ? $designSettings['hero_text_position'] : 'center'; ?>;
    overflow: hidden;
    background: url('assets/background1.jpg') no-repeat center center/cover;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 0 10%;
    color: <?php echo isset($designSettings['hero_text_color']) ? $designSettings['hero_text_color'] : 'white'; ?>;
}

.hero-image {
    width: 100vw;
    height: 100vh;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
}

.hero-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
}

.hero-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-58%, -40%);
    text-align: <?php echo isset($designSettings['hero_text_position']) ? $designSettings['hero_text_position'] : 'center'; ?>;
    color: <?php echo isset($designSettings['hero_text_color']) ? $designSettings['hero_text_color'] : 'white'; ?>;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.hero-text h1 {
    font-size: 50px;
    font-weight: bold;
    margin: 0;
}

.hero-text p {
    font-size: 20px;
    margin-top: 10px;
}

::-webkit-scrollbar {
    width: 0;
    height: 0;
    display: none;
}

.scrolled {
    background: <?php echo isset($designSettings['navbar_scrolled_bg_color']) ? $designSettings['navbar_scrolled_bg_color'] : 'black'; ?>;
    padding: 10px 20px;
}

.scrolled .university-name {
    color: <?php echo isset($designSettings['hero_text_color']) ? $designSettings['hero_text_color'] : 'white'; ?>;
}

.info-section {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    background-color: <?php echo isset($designSettings['info_section_bg_color']) ? $designSettings['info_section_bg_color'] : '#1e1e1e'; ?>;
    padding: 50px;
}

.info-box {
    width: 45%;
    background-color: <?php echo isset($designSettings['info_box_bg_color']) ? $designSettings['info_box_bg_color'] : 'black'; ?>;
    padding: 20px;
    margin: 10px;
    border-radius: <?php echo isset($designSettings['border_radius']) ? $designSettings['border_radius'] : '8px'; ?>;
    text-align: center;
    color: <?php echo isset($designSettings['info_box_text_color']) ? $designSettings['info_box_text_color'] : 'white'; ?>;
}

.info-image {
    width: 100%;
    border-radius: <?php echo isset($designSettings['border_radius']) ? $designSettings['border_radius'] : '8px'; ?>;
}

h2 {
    font-size: 24px;
    margin-top: 15px;
}

p {
    font-size: 16px;
    line-height: 1.6;
}

strong {
    font-weight: bold;
}

em {
    font-style: italic;
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 50%;
}

.hero-content h1 {
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 20px;
}

.hero-content p {
    font-size: 18px;
    line-height: 1.6;
}

.highlights-section {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    padding: 40px;
    background-color: <?php echo isset($designSettings['highlight_bg_color']) ? $designSettings['highlight_bg_color'] : '#f7f7f7'; ?>;
}

.highlight {
    flex: 1;
    text-align: center;
    background: white;
    padding: 20px;
    border-radius: <?php echo isset($designSettings['border_radius']) ? $designSettings['border_radius'] : '10px'; ?>;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.highlight img {
    width: 100%;
    height: auto;
    border-radius: <?php echo isset($designSettings['border_radius']) ? $designSettings['border_radius'] : '10px'; ?>;
}

.highlight h2 {
    font-size: 22px;
    margin: 15px 0;
    color: <?php echo isset($designSettings['highlight_text_color']) ? $designSettings['highlight_text_color'] : '#333'; ?>;
}

.highlight p {
    font-size: 16px;
    color: #555;
    line-height: 1.6;
}

.news-section {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
    padding: 20px 0;
    border-top: 1px solid #ddd;
    background-color: <?php echo isset($designSettings['news_section_bg_color']) ? $designSettings['news_section_bg_color'] : 'white'; ?>;
}

.news-item {
    display: flex;
    align-items: center;
    gap: 15px;
    max-width: 50%;
}

.news-item img {
    width: 120px;
    height: 120px;
    border-radius: <?php echo isset($designSettings['border_radius']) ? $designSettings['border_radius'] : '10px'; ?>;
    object-fit: cover;
}

.news-content h3 {
    font-size: 18px;
    margin: 0;
    color: <?php echo isset($designSettings['highlight_text_color']) ? $designSettings['highlight_text_color'] : '#333'; ?>;
}

.news-content p {
    font-size: 14px;
    color: #555;
    margin-top: 5px;
    line-height: 1.5;
}

.research-title {
    text-align: center;
    width: 100%;
    font-size: 28px;
    font-weight: bold;
    color: <?php echo isset($designSettings['research_title_text_color']) ? $designSettings['research_title_text_color'] : 'white'; ?>;
    background: <?php echo isset($designSettings['research_title_bg_color']) ? $designSettings['research_title_bg_color'] : '#333'; ?>;
    padding: 15px 0;
    margin: 0;
}

.research-section {
    position: relative;
    background: url('assets/QuantumComputer.jpg') no-repeat center center/cover;
    width: 100vw;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 0 10%;
}

.research-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

.research-content {
    position: relative;
    max-width: 50%;
    color: white;
    z-index: 1;
}

.research-content h1 {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 10px;
}

.research-content p {
    font-size: 16px;
    line-height: 1.6;
}

.events-container {
    text-align: center;
    padding: 40px;
    margin-top: 12%;
    margin-bottom: 6%;
}

.events-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    justify-content: center;
    align-items: center;
}

.event {
    text-align: center;
}

.event img {
    width: 100%;
    max-width: 300px;
    height: auto;
    border-radius:  <?php echo isset($designSettings['border_radius']) ? $designSettings['border_radius'] : '8px'; ?>;
}

.event h3 {
    font-size: 16px;
    margin-top: 10px;
    color: <?php echo isset($designSettings['event_text_color']) ? $designSettings['event_text_color'] : '#333'; ?>;
}

.banner {
    position: relative;
    text-align: left;
    color: white;
}

.banner img {
    width: 100%;
    height: auto;
    filter: brightness(70%);
}

.text-overlay {
    position: absolute;
    top: 50%;
    left: 10%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.7);
    padding: 20px;
    max-width: 500px;
    border-radius:  <?php echo isset($designSettings['border_radius']) ? $designSettings['border_radius'] : '10px'; ?>;
}

h1 {
    font-size: 28px;
    margin-bottom: 10px;
}

p {
    font-size: 16px;
    line-height: 1.5;
}

footer {
    background-color: <?php echo isset($designSettings['footer_bg_color']) ? $designSettings['footer_bg_color'] : '#333'; ?>;
    color: <?php echo isset($designSettings['footer_text_color']) ? $designSettings['footer_text_color'] : 'white'; ?>;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 20px;
    flex-wrap: wrap;
    text-align: center;
}

footer div {
    display: flex;
    flex-direction: column;
}

footer a {
    color: <?php echo isset($designSettings['footer_text_color']) ? $designSettings['footer_text_color'] : 'white'; ?>;
    text-decoration: none;
    margin: 5px 0;
    font-size: 14px;
    transition: 0.3s ease-in-out;
}

footer a:hover {
    color: <?php echo isset($designSettings['link_hover_color']) ? $designSettings['link_hover_color'] : '#f4c542'; ?>;
    text-decoration: underline;
}

.footer-logo {
    text-align: center;
}

.footer-logo img {
    width: 80px;
    height: auto;
    margin-bottom: 10px;
}

.new-box {
    padding: 3%;
}

.text-text {
    font-size: 6vh;
    margin-bottom: 6%;
}
</style>

</head>
<body>
    <nav class="navbar" id="navbar">
        <img src="assets/logo.png" class="logo" id="logo">
        <h1 class="university-name" id="nav-title"> <?php echo $university_name; ?> </h1>
    </nav>
    
    <div class="hero-section">
        <img src="assets/homepage.jpg" class="hero-image">
        <div class="hero-text">
            <h1><?php echo $university_name; ?></h1>
            <p>Since <?php echo $year_founded; ?></p>
        </div>
    </div>
    
    <div class="info-section">
        <?php foreach ($info_sections as $info) { ?>
            <div class="info-box">
                <img src="<?php echo $info['image']; ?>" class="info-image">
                <h2><?php echo $info['title']; ?></h2>
                <p><?php echo $info['content']; ?></p>
            </div>
        <?php } ?>
    </div>
    
    <div class="highlights-section">
        <?php foreach ($highlights as $highlight) { ?>
            <div class="highlight">
                <img src="<?php echo $highlight['image']; ?>" alt="<?php echo $highlight['title']; ?>">
                <h2><?php echo $highlight['title']; ?></h2>
                <p><?php echo $highlight['desc']; ?></p>
            </div>
        <?php } ?>
    </div>
    
    <div class="new-box">
        <h1>NEWS IN <?php echo strtoupper($university_name); ?></h1>
        <div class="news-section">
            <?php foreach ($news as $item) { ?>
                <div class="news-item">
                    <img src="<?php echo $item['image']; ?>">
                    <div class="news-content">
                        <h3><?php echo $item['title']; ?></h3>
                        <p><?php echo $item['desc']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    
    <h1 class="research-title">RESEARCH</h1>
    <div class="research-section">
        <div class="research-content">
            <h1>University Researchers Make Breakthrough in Quantum Computing!</h1>
            <p>In a groundbreaking achievement, researchers at <strong><?php echo $university_name; ?></strong> have developed a new approach to quantum computing...</p>
        </div>
    </div>
    
    <div class="events-container">
        <h1 class="text-text">UPCOMING EVENTS</h1>
        <div class="events-grid">
            <?php foreach ($events as $event) { ?>
                <div class="event">
                    <img src="<?php echo $event['image']; ?>" alt="<?php echo $event['title']; ?>">
                    <h3><?php echo $event['title']; ?></h3>
                </div>
            <?php } ?>
        </div>
    </div>

    
    <footer>
        <div>
            <a>Contact Us</a>
            <a>Plan and Shuttle</a>
            <a>Planning to Visit</a>
        </div>
        <div class="footer-logo">
            <img src="assets/logo.png" alt="Sana All University Logo">
            <h1><?php echo strtoupper($university_name); ?></h1>
            <p>© <?php echo $year_founded; ?> The Founders of <?php echo $university_name; ?></p>
        </div>
    </footer>
    
    <script src="index.js"></script>
</body>
</html>