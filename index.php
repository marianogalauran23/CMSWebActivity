<?php
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
    <link rel="stylesheet" href="index.css">
    <title><?php echo $university_name; ?></title>
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