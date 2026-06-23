<?php
$page_title = "Credits — League Mentor AI";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <style>
        .credits-wrap {
            min-height: 80vh;
            padding: 5rem 0 6rem;
            position: relative;
            z-index: 1;
        }
        .credits-header {
            text-align: center;
            margin-bottom: 3.5rem;
        }
        .credits-eyebrow {
            font-family: var(--font-display);
            font-size: .68rem;
            letter-spacing: .35em;
            color: var(--blue-accent);
            text-transform: uppercase;
            margin-bottom: .75rem;
        }
        .credits-title {
            font-family: var(--font-display);
            font-size: clamp(1.8rem, 4vw, 3rem);
            font-weight: 900;
            background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-bright) 50%, var(--gold-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }
        .credits-subtitle {
            font-size: .95rem;
            color: var(--text-muted);
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.7;
        }
        .credits-divider {
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold-bright), transparent);
            margin: 1.5rem auto 0;
        }

        /* Team section */
        .credits-section-title {
            font-family: var(--font-display);
            font-size: .7rem;
            letter-spacing: .3em;
            color: var(--blue-accent);
            text-transform: uppercase;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.25rem;
            margin-bottom: 3rem;
        }
        .team-card {
            background: var(--navy-mid);
            border: 1px solid var(--border-gold);
            border-radius: 6px;
            padding: 1.75rem 1.5rem;
            text-align: center;
            transition: transform .3s, box-shadow .3s;
            position: relative;
            overflow: hidden;
        }
        .team-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold-bright), transparent);
            opacity: 0;
            transition: opacity .3s;
        }
        .team-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 35px rgba(0,0,0,.45);
        }
        .team-card:hover::before { opacity: 1; }
        .team-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-bright));
            border: 2px solid var(--border-gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin: 0 auto 1rem;
            box-shadow: 0 0 18px rgba(200,170,110,.25);
        }
        .team-name {
            font-family: var(--font-display);
            font-size: .95rem;
            font-weight: 700;
            color: var(--gold-bright);
            letter-spacing: .05em;
            margin-bottom: .35rem;
        }
        .team-role {
            font-size: .78rem;
            color: var(--blue-accent);
            font-family: var(--font-display);
            letter-spacing: .1em;
            text-transform: uppercase;
            margin-bottom: .5rem;
        }
        .team-desc {
            font-size: .8rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* Tech stack */
        .tech-card {
            background: var(--navy-mid);
            border: 1px solid var(--border-gold);
            border-radius: 6px;
            padding: 2rem;
            margin-bottom: 3rem;
        }
        .tech-grid {
            display: flex;
            flex-wrap: wrap;
            gap: .75rem;
            justify-content: center;
            margin-top: 1rem;
        }
        .tech-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: rgba(200,170,110,.06);
            border: 1px solid var(--border-gold);
            border-radius: 50px;
            padding: .5rem 1.1rem;
            font-family: var(--font-display);
            font-size: .7rem;
            letter-spacing: .08em;
            color: var(--gold-bright);
        }
        .tech-badge i { color: var(--blue-accent); }

        /* Disclaimer */
        .disclaimer-card {
            background: rgba(200,170,110,.04);
            border: 1px solid rgba(200,170,110,.2);
            border-left: 3px solid var(--gold-bright);
            border-radius: 0 6px 6px 0;
            padding: 1.25rem 1.5rem;
            font-size: .82rem;
            color: var(--text-muted);
            line-height: 1.7;
            text-align: center;
        }

        @media (max-width: 576px) {
            .credits-wrap { padding: 3rem 0 4rem; }
            .team-grid { grid-template-columns: 1fr 1fr; gap: .85rem; }
            .team-card { padding: 1.25rem 1rem; }
            .team-avatar { width: 52px; height: 52px; font-size: 1.2rem; }
            .team-name { font-size: .82rem; }
        }
        @media (max-width: 380px) {
            .team-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- ── NAVBAR ─────────────────────────────────────────────── -->
<nav class="navbar navbar-expand-lg lm-nav sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">⚔ League<span>Mentor</span> AI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navMenu">
            <ul class="navbar-nav gap-1">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="guides.php">Guides</a></li>
                <li class="nav-item"><a class="nav-link" href="chatbot.php">Chat</a></li>
                <li class="nav-item"><a class="nav-link active" href="credits.php">Credits</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ── CREDITS CONTENT ────────────────────────────────────── -->
<div class="credits-wrap">
    <div class="container">

        <!-- Header -->
        <div class="credits-header">
            <p class="credits-eyebrow">DIT 2-7 · Web Development Final Project</p>
            <h1 class="credits-title">Meet the Team</h1>
            <p class="credits-subtitle">
                League Mentor AI was built as a final project for DIT 2-7 Web Development.
                Here are the people who made it happen.
            </p>
            <div class="credits-divider"></div>
        </div>

        <!-- Team Members -->
        <p class="credits-section-title">✦ Project Team ✦</p>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-avatar">⚔</div>
                <div class="team-name">Team Member 1</div>
                <div class="team-role">Project Lead</div>
                <div class="team-desc">Overall project coordination, database design, and backend logic.</div>
            </div>
            <div class="team-card">
                <div class="team-avatar">🎨</div>
                <div class="team-name">Team Member 2</div>
                <div class="team-role">UI / Frontend</div>
                <div class="team-desc">Interface design, CSS styling, and responsive layout implementation.</div>
            </div>
            <div class="team-card">
                <div class="team-avatar">🤖</div>
                <div class="team-name">Team Member 3</div>
                <div class="team-role">Chatbot Logic</div>
                <div class="team-desc">Chatbot response system, keyword matching, and knowledge base curation.</div>
            </div>
            <div class="team-card">
                <div class="team-avatar">📚</div>
                <div class="team-name">Team Member 4</div>
                <div class="team-role">Content & Guides</div>
                <div class="team-desc">Game guides content, knowledge base entries, and quality assurance.</div>
            </div>
        </div>

        <!-- Tech Stack -->
        <div class="tech-card">
            <p class="credits-section-title" style="margin-bottom:.5rem;">✦ Built With ✦</p>
            <div class="tech-grid">
                <span class="tech-badge"><i class="bi bi-filetype-php"></i> PHP 8</span>
                <span class="tech-badge"><i class="bi bi-database"></i> MySQL</span>
                <span class="tech-badge"><i class="bi bi-bootstrap"></i> Bootstrap 5</span>
                <span class="tech-badge"><i class="bi bi-filetype-js"></i> Vanilla JS</span>
                <span class="tech-badge"><i class="bi bi-filetype-css"></i> CSS3</span>
                <span class="tech-badge"><i class="bi bi-fonts"></i> Google Fonts</span>
                <span class="tech-badge"><i class="bi bi-grid"></i> Bootstrap Icons</span>
            </div>
        </div>

        <!-- Disclaimer -->
        <div class="disclaimer-card">
            <i class="bi bi-info-circle" style="color:var(--gold-bright); margin-right:.4rem;"></i>
            League Mentor AI is an academic project created for educational purposes only.
            It is not affiliated with, endorsed by, or sponsored by Riot Games.
            League of Legends is a trademark of Riot Games, Inc.
        </div>

    </div>
</div>

<!-- ── FOOTER ─────────────────────────────────────────────── -->
<footer class="lm-footer">
    <div class="container">
        <div class="footer-links">
            <a href="index.php">Home</a>
            <a href="guides.php">Guides</a>
            <a href="chatbot.php">Chat</a>
            <a href="credits.php">Credits</a>
        </div>
        <p>
            &copy; <?= date('Y') ?> League Mentor AI &nbsp;|&nbsp;
            DIT 2-7 Web Development Final Project
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/index.js"></script>

</body>
</html>
