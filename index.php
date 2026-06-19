<?php
$pageTitle    = 'League Mentor AI — Your Personal LoL Coach';
$activePage   = 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

</head>
<body>

<!-- ── NAVBAR ─────────────────────────────────────────────── -->
<nav class="navbar navbar-expand-lg lm-nav sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            ⚔ League<span>Mentor</span> AI
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navMenu">
            <ul class="navbar-nav gap-1">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="guides.php">Guides</a></li>
                <li class="nav-item"><a class="nav-link" href="chatbot.php">Chat</a></li>
                <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ── HERO ───────────────────────────────────────────────── -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-hex"></div>
    <div class="container hero-content">
        <p class="hero-eyebrow">Your Personal League of Legends Coach</p>
        <h1 class="hero-title">Level Up Your<br>Gameplay Today</h1>
        <div class="hero-divider"></div>
        <p class="hero-subtitle">
            League Mentor AI is a database-powered coaching chatbot designed to help you
            master champions, roles, objectives, and ranked strategy — all in one place.
        </p>
        <div class="hero-actions">
            <a href="chatbot.php" class="btn-gold">Ask the Mentor</a>
            <a href="guides.php" class="btn-outline-gold">Browse Guides</a>
        </div>
    </div>
</section>

<!-- ── STATS STRIP ────────────────────────────────────────── -->
<section class="about-strip">
    <div class="container">
        <div class="row g-3 text-center">
            <div class="col-6 col-md-3 reveal">
                <div class="stat-box">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Knowledge Records</div>
                </div>
            </div>
            <div class="col-6 col-md-3 reveal">
                <div class="stat-box">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Roles Covered</div>
                </div>
            </div>
            <div class="col-6 col-md-3 reveal">
                <div class="stat-box">
                    <div class="stat-number">10</div>
                    <div class="stat-label">Topic Categories</div>
                </div>
            </div>
            <div class="col-6 col-md-3 reveal">
                <div class="stat-box">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">AI Coaching</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ── FEATURES ───────────────────────────────────────────── -->
<section class="features">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-eyebrow">What You'll Learn</p>
            <h2 class="section-title">Coaching Built Into Every Answer</h2>
        </div>
        <div class="row g-4">
            <?php
            $features = [
                ['bi-person-video3',   'Role Mastery',       'Deep-dive into Top, Jungle, Mid, ADC, and Support mechanics tailored to your playstyle.'],
                ['bi-gem',             'Rune & Item Builds', 'Understand which keystones and item paths maximize your champion\'s power spikes.'],
                ['bi-trophy',          'Ranked Climbing',    'Practical LP climbing advice: champion pools, mental game, macro decisions, and more.'],
                ['bi-map',             'Macro Strategy',     'Learn wave management, objective priority, vision control, and split-push theory.'],
                ['bi-shield-fill',     'Objective Control',  'Understand Dragon, Baron, Rift Herald, and Elder Dragon timing and teamfight setups.'],
                ['bi-lightning-charge','AI Chatbot Coach',   'Get instant answers from a dynamic MySQL knowledge base — no hardcoded responses.'],
            ];
            foreach ($features as $i => [$icon, $title, $desc]):
            ?>
            <div class="col-md-6 col-lg-4 reveal">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi <?= $icon ?>"></i></div>
                    <h5><?= $title ?></h5>
                    <p><?= $desc ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ── TOPICS PREVIEW ─────────────────────────────────────── -->
<section class="topics">
    <div class="container text-center">
        <p class="section-eyebrow">Explore All Topics</p>
        <h2 class="section-title mb-4">Ask About Anything</h2>
        <div class="reveal">
            <?php
            $topics = [
                ['bi-cpu',              'Top Lane'],
                ['bi-tree',             'Jungle'],
                ['bi-crosshair2',       'Mid Lane'],
                ['bi-bullseye',         'ADC'],
                ['bi-heart-pulse',      'Support'],
                ['bi-dragon',           'Dragon'],
                ['bi-crown',            'Baron Nashor'],
                ['bi-gem',              'Runes'],
                ['bi-bag',              'Items'],
                ['bi-graph-up-arrow',   'Ranked Tips'],
                ['bi-eye',              'Vision Control'],
                ['bi-people-fill',      'Team Fighting'],
                ['bi-pie-chart-fill',   'CS & Farming'],
                ['bi-lightning-fill',   'Wave Management'],
                ['bi-map-fill',         'Macro Play'],
                ['bi-joystick',         'Champion Basics'],
            ];
            foreach ($topics as [$icon, $label]):
            ?>
            <a href="chatbot.php" class="topic-chip">
                <i class="bi <?= $icon ?>"></i> <?= $label ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ── CTA ────────────────────────────────────────────────── -->
<section class="cta-band">
    <div class="container reveal">
        <p class="section-eyebrow">Ready to Improve?</p>
        <h2 class="cta-title">Start Your Coaching Session Now</h2>
        <p>Ask the League Mentor AI anything — from basic mechanics to advanced macro strategy.</p>
        <a href="chatbot.php" class="btn-gold">Launch the Chatbot <i class="bi bi-arrow-right ms-2"></i></a>
    </div>
</section>

<!-- ── FOOTER ─────────────────────────────────────────────── -->
<footer class="lm-footer">
    <div class="container">
        <p>
            &copy; <?= date('Y') ?> League Mentor AI &nbsp;|&nbsp;
            DIT 2-7 Web Development Final Project &nbsp;|&nbsp;
            <a href="admin.php">Admin Panel</a>
        </p>
        <p style="margin-top:.5rem; font-size:.62rem;">
            League Mentor AI is not endorsed by Riot Games and does not reflect the views or opinions of Riot Games or anyone officially involved in producing League of Legends.
        </p>
    </div>
</footer>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/index.js"></script>

</body>
</html>
