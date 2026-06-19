<?php
// ============================================================
//  League Mentor AI — Guides / Learning Hub (guides.php)
// ============================================================
$page_title = "Guides — League Mentor AI";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700;900&family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="css/guides.css" rel="stylesheet">

</head>
<body>

<!-- ── Navbar ── -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php">⚔ League<span>Mentor</span> AI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navMenu">
            <ul class="navbar-nav gap-1">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="guides.php">Guides</a></li>
                <li class="nav-item"><a class="nav-link" href="chatbot.php">Chat</a></li>
                <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ── Page Header ── -->
<div class="page-header">
    <div class="container page-header-inner">
        <p class="page-eyebrow">✦ Knowledge Base ✦</p>
        <h1 class="page-title">Learning Hub</h1>
        <p class="page-subtitle">Everything you need to master every role, mechanic, and map objective — from Iron to Challenger.</p>
    </div>
</div>

<!-- ── Main Content ── -->
<div class="guides-content">
    <div class="container">
        <div class="row g-4">

            <!-- Sidebar -->
            <div class="col-lg-3 d-none d-lg-block">
                <div class="sidebar">
                    <div class="sidebar-nav">
                        <div class="sidebar-title">📚 Table of Contents</div>
                        <a class="sidebar-link" href="#top-lane"><span class="icon">🛡️</span> Top Lane</a>
                        <a class="sidebar-link" href="#jungle"><span class="icon">🌲</span> Jungle</a>
                        <a class="sidebar-link" href="#mid-lane"><span class="icon">⚡</span> Mid Lane</a>
                        <a class="sidebar-link" href="#adc"><span class="icon">🏹</span> ADC</a>
                        <a class="sidebar-link" href="#support"><span class="icon">💙</span> Support</a>
                        <a class="sidebar-link" href="#objectives"><span class="icon">🐉</span> Objectives</a>
                        <a class="sidebar-link" href="#items"><span class="icon">⚔️</span> Items</a>
                        <a class="sidebar-link" href="#runes"><span class="icon">✨</span> Runes</a>
                        <a class="sidebar-link" href="#farming"><span class="icon">🌾</span> Farming & CS</a>
                        <a class="sidebar-link" href="#vision"><span class="icon">👁️</span> Vision Control</a>
                        <a class="sidebar-link" href="#teamfight"><span class="icon">⚔</span> Team Fighting</a>
                        <a class="sidebar-link" href="#ranked"><span class="icon">🏆</span> Ranked Tips</a>
                    </div>
                </div>
            </div>

            <!-- Main Guides -->
            <div class="col-lg-9">

                <!-- TOP LANE -->
                <div id="top-lane" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">🛡️</div>
                        <div>
                            <div class="guide-heading">Top Lane</div>
                            <span class="guide-category-badge">Role Guide</span>
                        </div>
                    </div>
                    <div class="tip-card"><div class="tip-bullet">1</div><div class="tip-text"><strong>The Island:</strong> Top lane is isolated from the rest of the map early on. Learn to survive alone and manage waves independently before calling for help.</div></div>
                    <div class="tip-card"><div class="tip-bullet">2</div><div class="tip-text"><strong>Champion Types:</strong> Top lane features <strong>tanks</strong> (Malphite, Ornn), <strong>fighters/bruisers</strong> (Darius, Garen, Fiora), and <strong>split-pushers</strong> (Tryndamere, Camille). Know your playstyle.</div></div>
                    <div class="tip-card"><div class="tip-bullet">3</div><div class="tip-text"><strong>Teleport Priority:</strong> Use Teleport to join fights in other lanes after pushing your wave. A well-timed TP can flip a losing bot lane fight.</div></div>
                    <div class="tip-card"><div class="tip-bullet">4</div><div class="tip-text"><strong>Split-Pushing:</strong> Push side lanes as a split-pusher to force the enemy to react. If they send two people, your team has a 4v3 advantage in the rest of the map.</div></div>
                    <div class="info-box">
                        <div class="info-box-title">🏆 Beginner Champions</div>
                        <span class="champ-tag">Garen</span><span class="champ-tag">Malphite</span><span class="champ-tag">Nasus</span><span class="champ-tag">Maokai</span><span class="champ-tag">Shen</span>
                    </div>
                </div>

                <!-- JUNGLE -->
                <div id="jungle" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">🌲</div>
                        <div>
                            <div class="guide-heading">Jungle</div>
                            <span class="guide-category-badge">Role Guide</span>
                        </div>
                    </div>
                    <div class="tip-card"><div class="tip-bullet">1</div><div class="tip-text"><strong>Clear Efficiency:</strong> Clear jungle camps quickly and with minimal health lost. Start at the buff that benefits your champion most (Red for fighters, Blue for mages).</div></div>
                    <div class="tip-card"><div class="tip-bullet">2</div><div class="tip-text"><strong>Gank Timing:</strong> Gank lanes when enemies are overextended (past the midpoint of the lane) or when a laner has hard CC to chain with yours.</div></div>
                    <div class="tip-card"><div class="tip-bullet">3</div><div class="tip-text"><strong>Objective Control:</strong> Track Dragon and Baron timers. Appear in bot lane before Dragon spawns to set up vision and secure the objective.</div></div>
                    <div class="tip-card"><div class="tip-bullet">4</div><div class="tip-text"><strong>Counter-Jungling:</strong> Steal enemy jungle camps when the enemy jungler is spotted on the other side of the map. Free gold and XP!</div></div>
                    <div class="tip-card"><div class="tip-bullet">5</div><div class="tip-text"><strong>Pathing:</strong> Plan your first clear before the game starts. A standard path: buff → 3 camps → buff → gank or continue clearing. Always have a plan.</div></div>
                    <div class="info-box">
                        <div class="info-box-title">🏆 Beginner Champions</div>
                        <span class="champ-tag">Warwick</span><span class="champ-tag">Amumu</span><span class="champ-tag">Vi</span><span class="champ-tag">Hecarim</span><span class="champ-tag">Master Yi</span>
                    </div>
                </div>

                <!-- MID LANE -->
                <div id="mid-lane" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">⚡</div>
                        <div>
                            <div class="guide-heading">Mid Lane</div>
                            <span class="guide-category-badge">Role Guide</span>
                        </div>
                    </div>
                    <div class="tip-card"><div class="tip-bullet">1</div><div class="tip-text"><strong>Roaming:</strong> Mid lane is centrally located. After pushing your wave to the enemy turret, roam to Top or Bot to create early advantages.</div></div>
                    <div class="tip-card"><div class="tip-bullet">2</div><div class="tip-text"><strong>Priority Matchups:</strong> Learn your champion's strengths. Assassins burst squishies; mages have range advantage; control mages dominate with zone control.</div></div>
                    <div class="tip-card"><div class="tip-bullet">3</div><div class="tip-text"><strong>Vision in River:</strong> Place wards in both river bushes to avoid getting ganked from two sides. Mid is vulnerable to ganks from all directions.</div></div>
                    <div class="tip-card"><div class="tip-bullet">4</div><div class="tip-text"><strong>Wave Push Before Roam:</strong> Always shove the wave before roaming. An uncleared wave losing to the enemy turret costs you CS and XP while you're gone.</div></div>
                    <div class="info-box">
                        <div class="info-box-title">🏆 Beginner Champions</div>
                        <span class="champ-tag">Annie</span><span class="champ-tag">Vex</span><span class="champ-tag">Lux</span><span class="champ-tag">Malzahar</span><span class="champ-tag">Pantheon</span>
                    </div>
                </div>

                <!-- ADC -->
                <div id="adc" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">🏹</div>
                        <div>
                            <div class="guide-heading">ADC (Attack Damage Carry)</div>
                            <span class="guide-category-badge">Role Guide</span>
                        </div>
                    </div>
                    <div class="tip-card"><div class="tip-bullet">1</div><div class="tip-text"><strong>Positioning:</strong> Stay at the back of fights. Never walk into melee range. Kite backwards while auto-attacking using Attack Move Click (A+Click).</div></div>
                    <div class="tip-card"><div class="tip-bullet">2</div><div class="tip-text"><strong>Bot Lane Synergy:</strong> Communicate with your Support. Strong engage supports (Leona) want you to follow up their CC immediately. Enchanter supports (Lulu) want you to stay near them.</div></div>
                    <div class="tip-card"><div class="tip-bullet">3</div><div class="tip-text"><strong>Farm Over Fighting:</strong> Getting 10 CS = 1 kill worth of gold. Farm consistently through early game. Don't force bad fights — scale to late game.</div></div>
                    <div class="tip-card"><div class="tip-bullet">4</div><div class="tip-text"><strong>Target Priority:</strong> In team fights, auto-attack the closest enemy you can safely reach. Don't run past tanks to reach the backline and die.</div></div>
                    <div class="info-box">
                        <div class="info-box-title">🏆 Beginner Champions</div>
                        <span class="champ-tag">Miss Fortune</span><span class="champ-tag">Ashe</span><span class="champ-tag">Jinx</span><span class="champ-tag">Sivir</span><span class="champ-tag">Caitlyn</span>
                    </div>
                </div>

                <!-- SUPPORT -->
                <div id="support" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">💙</div>
                        <div>
                            <div class="guide-heading">Support</div>
                            <span class="guide-category-badge">Role Guide</span>
                        </div>
                    </div>
                    <div class="tip-card"><div class="tip-bullet">1</div><div class="tip-text"><strong>Ward Everything:</strong> As support, you have the most free time to ward. Always keep Dragon/Baron warded before they spawn and maintain river vision.</div></div>
                    <div class="tip-card"><div class="tip-bullet">2</div><div class="tip-text"><strong>Support Types:</strong> <strong>Engage</strong> (Leona, Nautilus): start fights. <strong>Enchanter</strong> (Lulu, Soraka): protect your carry. <strong>Poke</strong> (Xerath, Zyra): harass enemies to low HP before fighting.</div></div>
                    <div class="tip-card"><div class="tip-bullet">3</div><div class="tip-text"><strong>Control Wards:</strong> Buy a Control Ward every back. At 75g each, they're the best investment in the game for denying enemy vision.</div></div>
                    <div class="tip-card"><div class="tip-bullet">4</div><div class="tip-text"><strong>Late Game Roaming:</strong> After laning phase, roam with your jungler, help Mid, and set up objective vision. Don't just follow your ADC — create impact across the map.</div></div>
                    <div class="info-box">
                        <div class="info-box-title">🏆 Beginner Champions</div>
                        <span class="champ-tag">Lux</span><span class="champ-tag">Soraka</span><span class="champ-tag">Nautilus</span><span class="champ-tag">Blitzcrank</span><span class="champ-tag">Sona</span>
                    </div>
                </div>

                <!-- OBJECTIVES -->
                <div id="objectives" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">🐉</div>
                        <div>
                            <div class="guide-heading">Map Objectives</div>
                            <span class="guide-category-badge">Macro Strategy</span>
                        </div>
                    </div>
                    <p style="font-size:0.9rem; color:var(--text-muted); margin-bottom:1.25rem; line-height:1.7;">Objectives win games. Killing enemies is great, but taking objectives is how you actually push toward the Nexus.</p>
                    <div style="overflow-x:auto;">
                        <table class="obj-table">
                            <thead>
                                <tr>
                                    <th>Objective</th>
                                    <th>Spawns</th>
                                    <th>Reward</th>
                                    <th>Priority</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>🐉 Dragon</td><td>5:00 (respawns every 5 min)</td><td>Elemental soul stacks; Dragon Soul at 4</td><td>🔴 High</td></tr>
                                <tr><td>🦎 Rift Herald</td><td>8:00 (despawns at 20:00)</td><td>Eye item — smash a tower plate</td><td>🟡 Medium</td></tr>
                                <tr><td>🐛 Baron Nashor</td><td>20:00 (respawns every 6 min)</td><td>Empowered minions for 3 minutes</td><td>🔴 Highest</td></tr>
                                <tr><td>🔥 Elder Dragon</td><td>After a soul is claimed</td><td>Execute enemies below HP threshold</td><td>🔴 Highest</td></tr>
                                <tr><td>🏰 Turrets</td><td>Game start</td><td>Gold + map control/pressure</td><td>🟢 Always</td></tr>
                                <tr><td>🔮 Inhibitors</td><td>Behind turrets</td><td>Super minions spawn in that lane</td><td>🔴 Game-winning</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tip-card mt-3"><div class="tip-bullet">💡</div><div class="tip-text"><strong>Pro Tip:</strong> Always fight for objectives when ahead. Never attempt Baron without vision control and at least a 4v5 or better numbers advantage.</div></div>
                </div>

                <!-- ITEMS -->
                <div id="items" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">⚔️</div>
                        <div>
                            <div class="guide-heading">Items & Builds</div>
                            <span class="guide-category-badge">Equipment Guide</span>
                        </div>
                    </div>
                    <div class="tip-card"><div class="tip-bullet">1</div><div class="tip-text"><strong>Mythic First:</strong> Your Mythic item defines your build. Buy it as your first completed item. It provides a passive bonus for each Legendary item you own.</div></div>
                    <div class="tip-card"><div class="tip-bullet">2</div><div class="tip-text"><strong>Situational Buying:</strong> Adapt your build based on the enemy team. Building armor vs 4 AD champions, magic resist vs heavy AP. No build is always correct.</div></div>
                    <div class="tip-card"><div class="tip-bullet">3</div><div class="tip-text"><strong>Starter Items:</strong> Doran's Blade (AD), Doran's Ring (AP), Doran's Shield (defensive lanes). Long Sword or Amplifying Tome for early power spikes.</div></div>
                    <div class="tip-card"><div class="tip-bullet">4</div><div class="tip-text"><strong>Back at Right Times:</strong> Recall after completing components. Returning with 1300+ gold to buy a full component is more efficient than recalling with only 400g.</div></div>
                    <div class="info-box">
                        <div class="info-box-title">⭐ Iconic Items by Role</div>
                        <p style="font-size:0.85rem; line-height:1.8; margin:0;">
                            <strong style="color:var(--gold-light)">ADC:</strong> <span class="champ-tag">Kraken Slayer</span><span class="champ-tag">Infinity Edge</span><span class="champ-tag">Runaan's Hurricane</span><br>
                            <strong style="color:var(--gold-light)">AP Mage:</strong> <span class="champ-tag">Luden's Companion</span><span class="champ-tag">Rabadon's Deathcap</span><span class="champ-tag">Shadowflame</span><br>
                            <strong style="color:var(--gold-light)">Fighter:</strong> <span class="champ-tag">Trinity Force</span><span class="champ-tag">Sterak's Gage</span><span class="champ-tag">Black Cleaver</span><br>
                            <strong style="color:var(--gold-light)">Tank:</strong> <span class="champ-tag">Sunfire Aegis</span><span class="champ-tag">Thornmail</span><span class="champ-tag">Gargoyle Stoneplate</span>
                        </p>
                    </div>
                </div>

                <!-- RUNES -->
                <div id="runes" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">✨</div>
                        <div>
                            <div class="guide-heading">Runes</div>
                            <span class="guide-category-badge">Pre-Game Optimization</span>
                        </div>
                    </div>
                    <div class="tip-card"><div class="tip-bullet">1</div><div class="tip-text"><strong>Conqueror:</strong> Best for fighters in extended trades. Stack it up in fights lasting 3+ seconds. Ideal on <span class="champ-tag">Darius</span><span class="champ-tag">Garen</span><span class="champ-tag">Fiora</span><span class="champ-tag">Aatrox</span>.</div></div>
                    <div class="tip-card"><div class="tip-bullet">2</div><div class="tip-text"><strong>Electrocute:</strong> Best for assassins and burst mages. Proc with 3 unique abilities/autos in 3 seconds. Great on <span class="champ-tag">Zed</span><span class="champ-tag">Talon</span><span class="champ-tag">LeBlanc</span>.</div></div>
                    <div class="tip-card"><div class="tip-bullet">3</div><div class="tip-text"><strong>Lethal Tempo:</strong> Ideal for attack-speed carries who shred tanks. Allows exceeding the attack speed cap! Top picks: <span class="champ-tag">Jinx</span><span class="champ-tag">Kog'Maw</span><span class="champ-tag">Twitch</span>.</div></div>
                    <div class="tip-card"><div class="tip-bullet">4</div><div class="tip-text"><strong>Fleet Footwork:</strong> Sustain and mobility rune for ADCs in tough lanes. Grants movement speed and healing on charged autos. Pairs well with <span class="champ-tag">Ezreal</span><span class="champ-tag">Lucian</span>.</div></div>
                    <div class="tip-card"><div class="tip-bullet">5</div><div class="tip-text"><strong>Secondary Paths:</strong> Don't neglect your secondary rune tree. Domination for extra burst, Precision for combat stats, Resolve for tank stats, Inspiration for utility.</div></div>
                </div>

                <!-- FARMING -->
                <div id="farming" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">🌾</div>
                        <div>
                            <div class="guide-heading">Farming & CS</div>
                            <span class="guide-category-badge">Fundamentals</span>
                        </div>
                    </div>
                    <div class="tip-card"><div class="tip-bullet">1</div><div class="tip-text"><strong>CS Goals:</strong> Aim for <strong>6–8 CS per minute</strong>. At 10 minutes: 80+ is good, 100+ is excellent. 7 missed minions = 1 kill worth of gold.</div></div>
                    <div class="tip-card"><div class="tip-bullet">2</div><div class="tip-text"><strong>Last-Hit Mechanics:</strong> Only hit a minion when the killing blow will land on that auto-attack. Watch HP bars — melee minions have ~450 HP, casters ~280 HP.</div></div>
                    <div class="tip-card"><div class="tip-bullet">3</div><div class="tip-text"><strong>Wave Management:</strong> <strong>Slow push</strong> (build up a large wave), <strong>Fast push</strong> (clear fast for recall/roam), <strong>Freeze</strong> (hold wave near your turret to deny enemy CS).</div></div>
                    <div class="tip-card"><div class="tip-bullet">4</div><div class="tip-text"><strong>Cannon Minions:</strong> Cannon minions give <strong>60–90 gold</strong> — never miss them. They appear every 3 waves in early game and more frequently later.</div></div>
                    <div class="tip-card"><div class="tip-bullet">5</div><div class="tip-text"><strong>Practice Mode:</strong> Use a custom game with no enemies to practice last-hitting until it's instinctive. Aim for 7/7 CS per minute before worrying about macro play.</div></div>
                </div>

                <!-- VISION -->
                <div id="vision" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">👁️</div>
                        <div>
                            <div class="guide-heading">Vision Control</div>
                            <span class="guide-category-badge">Map Awareness</span>
                        </div>
                    </div>
                    <div class="tip-card"><div class="tip-bullet">1</div><div class="tip-text"><strong>Ward Constantly:</strong> Place Stealth Wards in river bushes, jungle entrances, and objective areas. Always ward when ahead — it protects your lead.</div></div>
                    <div class="tip-card"><div class="tip-bullet">2</div><div class="tip-text"><strong>Control Wards:</strong> Buy one on every back. They cost only 75g and permanently deny a spot of enemy vision until destroyed. Best 75g in the game.</div></div>
                    <div class="tip-card"><div class="tip-bullet">3</div><div class="tip-text"><strong>Pre-Objective Vision:</strong> Clear enemy wards around Dragon/Baron 30 seconds before they spawn, then place your own. Vision = safe fights.</div></div>
                    <div class="tip-card"><div class="tip-bullet">4</div><div class="tip-text"><strong>Vision Score:</strong> Check your Vision Score in the post-game screen. Higher is better. Top players have 2–3x more wards per game than lower-ranked players.</div></div>
                </div>

                <!-- TEAM FIGHTING -->
                <div id="teamfight" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">⚔</div>
                        <div>
                            <div class="guide-heading">Team Fighting</div>
                            <span class="guide-category-badge">Advanced Combat</span>
                        </div>
                    </div>
                    <div class="tip-card"><div class="tip-bullet">1</div><div class="tip-text"><strong>Know Your Role:</strong> Tanks engage first. Carries deal damage from the back. Supports protect carries or peel off divers. Never break role during a fight.</div></div>
                    <div class="tip-card"><div class="tip-bullet">2</div><div class="tip-text"><strong>Target Priority:</strong> As a carry, auto-attack the nearest safe target. As an assassin, dive for the fed carry. As a tank, dive the enemy carry to disrupt them.</div></div>
                    <div class="tip-card"><div class="tip-bullet">3</div><div class="tip-text"><strong>Cooldown Tracking:</strong> Remember enemy ultimate cooldowns. Don't engage while the enemy Malphite, Amumu, or Orianna has their ult available.</div></div>
                    <div class="tip-card"><div class="tip-bullet">4</div><div class="tip-text"><strong>Avoid Getting Caught:</strong> Never walk through unwarded jungle when behind or when objectives are at stake. One pick can lose a Baron fight before it starts.</div></div>
                </div>

                <!-- RANKED -->
                <div id="ranked" class="guide-block">
                    <div class="guide-section-header">
                        <div class="guide-icon-box">🏆</div>
                        <div>
                            <div class="guide-heading">Ranked Climbing Tips</div>
                            <span class="guide-category-badge">Rank Improvement</span>
                        </div>
                    </div>
                    <div class="tip-card"><div class="tip-bullet">1</div><div class="tip-text"><strong>Small Champion Pool:</strong> Play only 2–3 champions until you reach Gold. Deep knowledge beats playing every new champion. Master your picks.</div></div>
                    <div class="tip-card"><div class="tip-bullet">2</div><div class="tip-text"><strong>2-Loss Limit:</strong> If you lose 2 games in a row, stop playing for the session. Playing tilted will spiral into more losses. Mental health = MMR.</div></div>
                    <div class="tip-card"><div class="tip-bullet">3</div><div class="tip-text"><strong>Fundamentals Over Flashy Plays:</strong> Consistent CS, vision, and objective play will gain more LP than impressive mechanics. Masters win through reliability.</div></div>
                    <div class="tip-card"><div class="tip-bullet">4</div><div class="tip-text"><strong>Review Replays:</strong> Watch your own replays after losses. Identify one key mistake per game and fix it. Improvement is intentional, not accidental.</div></div>
                    <div class="tip-card"><div class="tip-bullet">5</div><div class="tip-text"><strong>Dodge Bad Lobbies:</strong> Dodging costs only 3–5 LP but saves your MMR from a near-certain loss. Dodge if your team has AFK/trolls in champion select.</div></div>
                </div>

                <!-- CTA Strip -->
                <div class="cta-strip">
                    <h4>Still have questions?</h4>
                    <p>Ask our AI chatbot directly — it searches the full knowledge base instantly and gives you personalized advice.</p>
                    <a href="chatbot.php" class="btn-gold">
                        <i class="bi bi-chat-dots-fill"></i> Ask the Mentor
                    </a>
                </div>

            </div><!-- /col -->
        </div><!-- /row -->
    </div><!-- /container -->
</div>

<!-- ── Footer ── -->
<footer>
    <div class="container">
        <div class="footer-bottom">
            <span>⚔</span> League Mentor AI — Academic Project &nbsp;|&nbsp; Not affiliated with Riot Games &nbsp;<span>⚔</span>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/guides.js"></script>

</body>
</html>
