<?php
$page_title = "Chat — League Mentor AI";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="css/chatbot.css" rel="stylesheet">
    
</head>
<body>

<!-- ── NAVBAR ─────────────────────────────────────────────── -->
<nav class="navbar navbar-expand-lg lm-nav">
    <div class="container">
        <a class="navbar-brand" href="index.php">⚔ League<span>Mentor</span> AI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navMenu">
            <ul class="navbar-nav gap-1">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="guides.php">Guides</a></li>
                <li class="nav-item"><a class="nav-link active" href="chatbot.php">Chat</a></li>
                <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ── CHAT WRAPPER ───────────────────────────────────────── -->
<div class="chat-wrapper">
    <div class="chat-container">

        <!-- Header -->
        <div class="chat-header">
            <div class="avatar-orb"><img src="images/RyzeProfile.jpg" alt="League Mentor AI"></div>
            <div class="chat-header-info">
                <div class="name">League Mentor AI</div>
                <div class="status-text">
                    <span class="status-dot"></span>Online — Ask me anything about LoL
                </div>
            </div>
            <div class="chat-header-actions">
                <button class="btn-clear" id="clear-btn" title="Clear chat history">
                    <i class="bi bi-trash3"></i> Clear
                </button>
                <a href="guides.php" class="btn-clear">
                    <i class="bi bi-book"></i> Guides
                </a>
            </div>
        </div>

        <!-- Messages -->
        <div id="chat-messages">
            <!-- Welcome message -->
            <div class="welcome-msg" id="welcome-block">
                <div class="w-icon">⚔</div>
                <h5>Welcome, Summoner!</h5>
                <div class="welcome-divider"></div>
                <p>I'm your personal League of Legends coach. Ask me about champion roles, items, runes, ranked tips, objectives, or anything else to improve your gameplay.</p>
            </div>
        </div>

        <!-- Typing indicator (inside messages, but visually separate) -->
        <div id="typing-row" class="msg-row typing-indicator" style="padding: 0 1.5rem 0; background: rgba(8,17,32,.7); border-left: 1px solid var(--border-gold); border-right: 1px solid var(--border-gold);">
            <div class="msg-avatar bot-av"><img src="images/bot-avatar.png" alt="League Mentor AI"></div>
            <div>
                <div class="bubble bubble-bot">
                    <div class="typing-dots">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Suggested prompts -->
        <div class="suggested-prompts" id="suggested-prompts">
            <button class="prompt-chip" data-prompt="What is the ADC role?">What is ADC?</button>
            <button class="prompt-chip" data-prompt="How do I improve my CS?">Improve CS</button>
            <button class="prompt-chip" data-prompt="Tell me about Dragon">Dragon objective</button>
            <button class="prompt-chip" data-prompt="What are the best runes for ADC?">ADC Runes</button>
            <button class="prompt-chip" data-prompt="How do I climb in ranked?">Climb Ranked</button>
            <button class="prompt-chip" data-prompt="What is wave management?">Wave Mgmt</button>
            <button class="prompt-chip" data-prompt="Tell me about Baron Nashor">Baron Nashor</button>
            <button class="prompt-chip" data-prompt="What is vision control?">Vision Control</button>
        </div>

        <!-- Input bar -->
        <div class="chat-input-bar">
            <textarea
                id="user-input"
                placeholder="Ask about champions, roles, items, runes, ranked tips…"
                rows="1"
                maxlength="400"
                aria-label="Your message"
            ></textarea>
            <button id="send-btn" title="Send message" aria-label="Send">
                <i class="bi bi-send-fill"></i>
            </button>
        </div>

    </div><!-- /chat-container -->
</div><!-- /chat-wrapper -->

<!-- ── FOOTER ─────────────────────────────────────────────── -->
<footer class="lm-footer">
    <div class="container">
        <p>
            &copy; <?= date('Y') ?> League Mentor AI &nbsp;|&nbsp;
            DIT 2-7 Web Dev Final Project &nbsp;|&nbsp;
            <a href="admin.php">Admin Panel</a>
        </p>
    </div>
</footer>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/chatbot.js"></script>

</body>
</html>
