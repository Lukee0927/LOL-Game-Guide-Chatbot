-- ============================================================
--  League Mentor AI — Database Schema & Knowledge Base
--  Database: leaguementor
--  Table:    chatbot_knowledge
-- ============================================================

CREATE DATABASE IF NOT EXISTS leaguementor
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_unicode_ci;

USE leaguementor;

DROP TABLE IF EXISTS chatbot_knowledge;

CREATE TABLE chatbot_knowledge (
    id          INT          NOT NULL AUTO_INCREMENT,
    keyword     VARCHAR(255) NOT NULL,
    response    TEXT         NOT NULL,
    category    VARCHAR(100) NOT NULL DEFAULT 'General',
    created_at  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX idx_keyword (keyword)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
--  KNOWLEDGE BASE — 50 Records
-- ============================================================
INSERT INTO chatbot_knowledge (keyword, response, category) VALUES

-- BASICS (1–8)
('hello',           'Hey Summoner! 👋 Welcome to League Mentor AI. Ask me anything about champions, roles, items, runes, or ranked climbing — I''m here to help you improve!', 'Basics'),
('hi',              'Hey there! I''m your personal League coach. Whether you''re brand new or climbing the ranks, I''ve got tips for you. What would you like to learn today?', 'Basics'),
('what is league',  'League of Legends is a 5v5 multiplayer online battle arena (MOBA) by Riot Games. Two teams compete to destroy the enemy Nexus — the glowing crystal structure at the heart of their base. The game features over 160 unique champions, each with distinct abilities and roles.', 'Basics'),
('nexus',           'The Nexus is the core objective of every League game. It''s located deep inside each team''s base. To win, your team must destroy the enemy Nexus. Protect yours and push through their defenses — usually by taking down towers and inhibitors first.', 'Basics'),
('turret',          'Turrets (towers) are defensive structures that deal significant damage to enemies. They protect your lanes and base. Always prioritize not dying to turrets early game. Turrets deal increased damage with each shot on the same target — don''t stand still under one!', 'Basics'),
('inhibitor',       'Inhibitors are objectives located just before the Nexus in each lane. Destroying one causes super minions to spawn in that lane for your team, applying immense pressure. Taking an inhibitor is a major advantage that can win games!', 'Basics'),
('minion',          'Minions are NPC units that spawn every 30 seconds and march down each lane. Last-hitting them gives you gold (CS). They also deal damage to turrets and inhibitors. Controlling minion waves is one of the most important skills to develop as a player.', 'Basics'),
('how to play',     'Start by choosing a role you enjoy — Top, Jungle, Mid, ADC, or Support. Pick a beginner-friendly champion like Garen, Annie, or Ashe. Focus on last-hitting minions for gold, avoiding unnecessary deaths, and learning your champion''s abilities. Improvement comes from consistent practice and reviewing your mistakes!', 'Basics'),

-- ROLES (9–14)
('top lane',        'Top lane is isolated and often features durable, self-sufficient champions like tanks (Malphite, Ornn), fighters (Darius, Garen, Fiora), or split-pushers (Camille, Tryndamere). Top laners usually absorb pressure and become frontline fighters in team fights. Focus on wave management, trading patterns, and teleporting to impact other lanes.', 'Roles'),
('jungle',          'The Jungler doesn''t lane — instead they farm neutral monsters in the jungle and Gank (ambush) enemy laners to create advantages. Junglers also control major objectives like Dragon and Baron. Great junglers have excellent map awareness, pathing efficiency, and timing. Champions like Warwick, Amumu, and Vi are great for beginners.', 'Roles'),
('mid lane',        'Mid lane is the center of the map, giving access to all other lanes. Mid laners are often carries or assassins (Zed, Ahri, Syndra) who roam after winning their lane. AP mages and assassins dominate here. Always think about roaming to Top or Bot to gain team advantages after pushing your wave.', 'Roles'),
('adc',             'ADC (Attack Damage Carry) plays in the Bot lane with a Support. ADCs are ranged champions who deal sustained physical damage and carry late game team fights. Great starting ADCs include Miss Fortune, Jinx, and Ashe. Focus on farming minions, positioning safely in fights, and building critical strike or on-hit items.', 'Roles'),
('support',         'Support protects and enables the ADC in the early game, then peels or engages for the whole team. Supports come in several types: engage (Leona, Nautilus), enchanters (Lulu, Soraka), and poke (Xerath, Zyra). Ward constantly, track the enemy jungler, and help set up objectives with your team.', 'Roles'),
('role',            'League has 5 primary roles: Top Lane (durable carries/fighters), Jungle (objective control, ganking), Mid Lane (roaming carries/mages), ADC/Bot Lane (ranged physical carry), and Support (protect, engage, or heal allies). Each role has a unique playstyle — find the one that matches your personality!', 'Roles'),

-- CHAMPIONS (15–20)
('garen',           'Garen is a fantastic beginner Top laner! He''s tanky, deals solid damage, and has a self-heal passive. His Q silences enemies, E deals AoE damage, and his R (Demacian Justice) executes low-health enemies. Build Stridebreaker, Mortal Reminder, and Sterak''s Gage for a well-rounded bruiser setup.', 'Champions'),
('ahri',            'Ahri is a mobile AP assassin/mage in Mid lane. Her Orb of Deception deals true damage on return, Charm (E) is a crucial CC ability, and her ultimate Spirit Rush gives 3 dashes. Mastering Ahri''s W-E combo is key. Build Luden''s Companion into Shadowflame for burst damage.', 'Champions'),
('jinx',            'Jinx is a hyper-carry ADC known for her attack speed steroid and global ultimate. She has two weapon modes: minigun (attack speed) and rocket launcher (AoE damage). Build Kraken Slayer into Runaan''s Hurricane for team fight dominance. She''s weak early, so survive lane and dominate late game.', 'Champions'),
('thresh',          'Thresh is one of the most skilled and rewarding supports in the game. His Death Sentence (Q) is a hook that leads into Death Leap (W), where allies can jump to safety or engage with you. The Dark Passage lantern can save teammates. Master his hook timing and positioning to dominate your lane.', 'Champions'),
('yasuo',           'Yasuo is a high skill-cap Mid laner with a high-risk, high-reward playstyle. His passive gives him double critical strike chance, his Wind Wall (W) blocks projectiles, and Last Breath (R) synergizes with any knock-up. Focus on CS, not kills, early. Build Immortal Shieldbow first for survivability.', 'Champions'),
('beginner champion', 'Best beginner champions: Top — Garen (tanky, simple kit), Jungle — Warwick (easy clear, healing), Mid — Annie (point-and-click, strong burst), ADC — Ashe (free slow, global arrow), Support — Soraka (healing focused, forgiving). These champions let you focus on game fundamentals without complex mechanics.', 'Champions'),

-- OBJECTIVES (21–25)
('dragon',          'Dragon (Drake) spawns at 5 minutes in the Bot-side river. Each kill gives your team a stack of the current elemental soul. After 4 stacks, your team gets the powerful Dragon Soul. Dragon types include Infernal (damage), Mountain (shielding), Cloud (cooldowns), Ocean (healing), and Chemtech/Hextech. Always prioritize Dragon!', 'Objectives'),
('baron',           'Baron Nashor spawns at 20 minutes in the Top-side river pit. Killing it grants the Hand of Baron buff to nearby allies, which empowers your minions for 3 minutes. Baron is the most powerful objective in the game — taking it often decides the match. Never contest Baron without vision and numbers advantage.', 'Objectives'),
('rift herald',     'The Rift Herald spawns at 8 minutes in the Top-side river (where Baron will later spawn). Killing it drops the Eye of the Herald — use it to smash a turret plate by charging it like a battering ram. It''s excellent for getting early tower gold and map pressure. It disappears at 20 minutes when Baron spawns.', 'Objectives'),
('objective',       'Key objectives to prioritize: Dragon (every 5 min) for soul stacks, Rift Herald (8-19 min) for tower pressure, Baron (20+ min) for minion buff, and towers for gold and map control. Always contest objectives with your team. Objectives win games — not just kills!', 'Objectives'),
('elder dragon',    'Elder Dragon spawns after one team has claimed a Dragon Soul. It grants the Elemental Elderflame buff, which executes enemies below a health threshold. This is an extremely powerful late-game objective. The team that secures Elder Dragon while ahead can often close out games immediately. Treat it with the same urgency as Baron.', 'Objectives'),

-- RUNES (26–30)
('rune',            'Runes are pre-game bonuses that enhance your champion''s power. You choose a Keystone rune (the most powerful), plus 2 minor runes from the same tree, and 2 from a secondary tree. Common keystones: Press the Attack (ADC), Conqueror (fighters), Electrocute (assassins), Arcane Comet (poke mages), and Guardian (engage supports).', 'Runes'),
('conqueror',       'Conqueror is a stacking rune ideal for fighters and bruisers who stay in extended fights (Darius, Garen, Fiora, Aatrox). Each hit in combat stacks it — at max stacks you deal bonus damage and heal. It outperforms other runes in fights that last longer than 3 seconds. Pair with Triumph and Legend: Alacrity.', 'Runes'),
('electrocute',     'Electrocute is a keystone for burst damage dealers — assassins and poke mages. Hit an enemy with 3 unique attacks or abilities within 3 seconds to proc it for bonus adaptive damage. Great on Zed, Talon, Syndra, and LeBlanc. Pair with Sudden Impact, Eyeball Collection, and Treasure Hunter for the full burst setup.', 'Runes'),
('fleet footwork',  'Fleet Footwork is a mobility and sustain rune popular on ADCs and some melee champions. Every 100 energy stacks grant a dash of movement speed and healing on your next auto attack. It helps you dodge skillshots and survive aggressive lanes. A great choice on Ezreal, Kai''Sa, and Lucian for the extra mobility.', 'Runes'),
('lethal tempo',    'Lethal Tempo is a rune that grants stacking attack speed when you attack enemies — ideal for attack-speed-focused ADCs like Jinx, Kog''Maw, and Twitch who want to shred tanks. At full stacks you can even exceed the attack speed cap! Pair it with Legend: Alacrity and Last Stand for maximum DPS output.', 'Runes'),

-- ITEMS (31–36)
('item',            'Items are purchased with gold earned during the game. Every champion has a core item build that maximizes their strength. Starter items (like Doran''s Blade for AD or Doran''s Ring for AP) give early stats. Mythic items form your core powerspike, followed by Legendary items to complete your build. Always check a champion guide for the optimal build!', 'Items'),
('kraken slayer',   'Kraken Slayer is a critical ADC Mythic that deals % max health true damage every 3rd attack — ideal for shredding tanks. It''s the go-to choice when the enemy team has multiple high-health targets. Build it on Jinx, Vayne, or Caitlyn. Pair with Runaan''s Hurricane and Infinity Edge for massive team fight damage.', 'Items'),
('luden',           'Luden''s Companion is an AP Mythic for burst mages and poke champions. It grants a charged shot that deals magic damage and bounces to nearby enemies. Excellent on Xerath, Ahri, and Syndra. The extra ability haste also lets you use your abilities more often. Follow it up with Shadowflame and Rabadon''s Deathcap.', 'Items'),
('trinity force',   'Trinity Force (Tri-Force) is a beloved Mythic for on-hit fighters and attack-speed bruisers like Irelia, Camille, Corki, and Twisted Fate. The Spellblade passive makes your next auto after casting an ability deal bonus damage. It gives attack speed, health, and AD — a perfect stat spread for split-pushing champions.', 'Items'),
('sunfire aegis',   'Sunfire Aegis is a tank Mythic that deals ramping magic damage to nearby enemies — great on engage tanks like Malphite, Ornn, Maokai, or Amumu. The longer you stay in a fight, the more burning stacks you apply. Pair with Demonic Embrace for bonus AP scaling damage based on your target''s max health.', 'Items'),
('rabadon',         'Rabadon''s Deathcap is a legendary AP item that amplifies your total AP by 35% — making it the highest damage spike for any mage. Always build it as your 3rd or 4th item after your core mythic and components. On champions like Syndra, Lux, or Viktor, Rabadon''s can single-handedly double your burst damage output.', 'Items'),

-- CS / FARMING (37–39)
('cs',              'CS (Creep Score) is the number of minions you''ve successfully last-hit for gold. Aim for 6-8 CS per minute as a realistic goal. At 10 minutes, 80+ CS is good, 100+ is excellent. Missing CS is the #1 source of lost gold for most players. Practice last-hitting in a custom game against no enemies until it feels natural.', 'Farming'),
('farming',         'Farming is the act of last-hitting minions for gold. Each minion gives between 14–90 gold. Consistent farming beats getting kills — a full minion wave is worth approximately 100-250 gold. Never stop farming even when ahead. Push waves before recalls, roams, or objective fights so you don''t miss gold.', 'Farming'),
('wave management', 'Wave management is the art of controlling minion waves to create advantages. Slow push: let your wave build up by letting the enemy''s wave slightly win. Fast push: clear the wave quickly to roam or take objectives. Freeze: trap the wave near your tower to deny enemy CS and create gank setups. Master these to dominate your lane!', 'Farming'),

-- VISION (40–41)
('ward',            'Warding gives your team vision on enemy movement, preventing ganks and securing objectives. Place wards in river bushes, jungle entrances, and around Dragon/Baron before they spawn. Support and Jungle champions should ward most aggressively. Always carry a Control Ward — they''re only 75 gold and permanently deny enemy vision in that spot.', 'Vision'),
('vision',          'Vision control wins games. Your team needs to see the enemy jungler, incoming ganks, and objective timers. Pink Wards (Control Wards) disable enemy wards permanently until destroyed. Use your trinket ward on cooldown — it''s free! Before Baron or Dragon spawns, clear enemy wards in the area and place yours for a safe fight.', 'Vision'),

-- TEAM FIGHTING (42–44)
('team fight',      'In team fights, know your role: Tanks engage first and soak damage. Carries deal damage from the backline. Supports peel for carries or enable the engage. Never rush in as a carry — let your tank initiate. Focus the closest, squishiest target. Stay grouped and avoid getting caught alone — 5v4 fights are much easier to win!', 'Team Fighting'),
('peel',            'Peeling means protecting your team''s carries from enemy divers and assassins. As a support or tank, use CC (stuns, slows, knockbacks) on enemies trying to reach your ADC. Champions like Lulu, Janna, and Braum excel at peeling. Communication matters — position between your carry and the most threatening enemy.', 'Team Fighting'),
('engage',          'Engaging means initiating a fight, usually by locking down a key enemy target. Great engage champions include Leona, Malphite, Amumu, and Vi. A good engage catches key enemies out of position and forces a fight on your terms. Always engage when you have numbers advantage, objective pressure, or when enemy summoner spells are down.', 'Team Fighting'),

-- RANKED CLIMBING (45–48)
('ranked',          'To climb in Ranked, focus on consistency: play 1-3 champions you know deeply, focus on fundamentals (CS, vision, objectives) over kills, review your replays for mistakes, and play when you''re focused — not tilted or tired. Each rank from Iron to Challenger requires progressively better macro and micro decisions.', 'Ranked'),
('how to climb',    'The key to climbing in ranked: master a small champion pool (2-3 champs), focus on your role''s primary win conditions, play when mentally fresh, mute toxic players immediately, and always ask yourself "what could I have done differently?" after a loss. LP gains come from consistent fundamentals, not flashy plays.', 'Ranked'),
('tilt',            'Tilt is when frustration affects your decision-making and gameplay quality. Signs of tilt: forcing fights, flaming teammates, playing recklessly. Combat tilt by taking breaks between losses, muting all-chat, focusing only on your own performance, and setting a 2-loss limit before you stop playing for the session. Mindset is a skill!', 'Ranked'),
('lp',              'LP (League Points) are used to advance through tiers. You gain LP for wins and lose it for defeats. At 100 LP, you enter a promotion series to the next division. Focus on consistent wins rather than worrying about LP — play your best every game and the LP will follow naturally. Dodging bad lobbies costs only 3-5 LP and saves your MMR.', 'Ranked'),

-- ADVANCED STRATEGIES (49–50)
('macro',           'Macro strategy is the big-picture decision-making in League: where to be, when to fight, and what objectives to take. After winning a fight or securing a kill, always ask: "What can I take now?" Push a lane, secure Dragon, take Baron, or pressure the enemy base. Macro wins games more consistently than individual mechanics.', 'Advanced'),
('split push',      'Split pushing means sending one champion to push a side lane while your team creates pressure elsewhere. It forces the enemy to choose: send someone to stop you (giving your team numbers advantage) or ignore you (and lose a tower/inhibitor). Champions like Fiora, Tryndamere, and Jax are ideal split pushers. Always have teleport for safety!', 'Advanced');
