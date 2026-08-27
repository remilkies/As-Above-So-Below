-- Active: 1786802362824@@localhost@3306@AsAboveSoBelow
-- 1. Create the Tables
CREATE TABLE arcana (
    id VARCHAR(10) PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    meaning TEXT NOT NULL
);


ALTER TABLE suits (
    id VARCHAR(20) PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    element_id VARCHAR(5),
    meaning TEXT NOT NULL,
    FOREIGN KEY (element_id) REFERENCES elements(id)
)


CREATE TABLE minor_numerology (
    id INT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    meaning TEXT NOT NULL
);

CREATE TABLE major_numerology (
    id INT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    meaning TEXT NOT NULL
);

CREATE TABLE ranks (
    id VARCHAR(20) PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    meaning TEXT NOT NULL
);

CREATE TABLE elements (
    id VARCHAR(5) PRIMARY KEY,
    name VARCHAR(5) NOT NULL,
    meaning TEXT NOT NULL
);


CREATE TABLE cards (
    id VARCHAR(50) PRIMARY KEY,
    suit_id VARCHAR(20) NULL,
    rank_id VARCHAR(20) NULL,
    numerology_id INT NULL,
    arcana_id VARCHAR(10) DEFAULT 'minor',
    element_id VARCHAR(5),
    card_meaning TEXT NOT NULL,
    card_meaning_reversed TEXT NULL,
    FOREIGN KEY (suit_id) REFERENCES suits(id),
    FOREIGN KEY (arcana_id) REFERENCES arcana(id),
    FOREIGN KEY (rank_id) REFERENCES ranks(id)
);

-- Arcana Data
INSERT INTO arcana (id, name, meaning) VALUES
('major', 'Major Arcana', 'major milestones, turning-point moments life-reshaping crossroads and the grand narrative of life- the archetypal forces and their spiritual lessons ending in transformative experiences'),
('minor', 'Minor Arcana', "the day-to-day experiences, challenges, and opportunities that shape our journey. Passing moods, workplace frictions, relationship conversations, and quiet internal shifts that don't feel dramatic but end up defining everything.")
ON DUPLICATE KEY UPDATE meaning = VALUES(meaning);

--  Suits Data
INSERT INTO suits (id, name, element_id, meaning) VALUES
('cups', 'Cups', 'Water', "navigating the deep waters of your emotions, relationships, and intuitive connections. Cups ask what's happening in the world beneath the surface - the emotional currents that determine wether anything you build will actully satisfy you."),
('swords', 'Swords', 'Air', 'the sharp edge of intellect, communication, and mental conflict'),
('wands', 'Wands', 'Fire', 'the blazing fires of passion, creative inspiration, and bold willpower'),
('pentacles', 'Pentacles', 'Earth', 'the grounded roots of material abundance, practical foundations, and physical reality');

INSERT INTO elements (id, name, meaning) VALUES
('Water', 'Water', "represents emotions, feelings, intuition and the subconcious. Water flows into every available space, takes the shape of whatever contains it, and finds every crack. You can't push it into a shape it doesn't want to hold. Butit's always moving, always seeking its own level." ),
('Air', 'Air', "represents thought, logic and communication. Air has no substance of its own. You can't shape it, hold it or see it. But it carries sound, transmits ideas, and makes speech possible. Every word you ever spoke traveled through air to reach another preson's mind. The Suit of Swords works through this element: invisible, fast constantly in motion and capable of cuttring through anything it touches. A sharp mind is one of the greatest gifts a person can have. The capacity for discrimination, for telling truth from comfortable fiction and seeing what's actully happening instead of what you wish were happening, makes concious choice possible."),
('Fire', 'Fire', "represents willpower, intuition and inspiration. Fire is the only element that isn't a substance. Water is something you can hold. Earth is something you can stand on. Air surrounds you whether you notice it or not. But fire is a process - it only exists while it's consuming something else. Take away its fuel and it vanishes. Feed it and it grows beyond your control. What happens when raw creative force enters your life and what does it cost to keep it burning?"),
('Earth', 'Earth', "represents recources, finances, health, manifestation and material matters") -- ADD MORE TO THIS LATER

--  Minor Numerology
INSERT INTO minor_numerology (id, name, meaning) VALUES
(1, 'Ace (One)', 'new beginnings, pure potential, raw energy, and fresh opportunities'),
(2, 'Two', 'balance, duality, partnerships, and making choices'),
(3, 'Three', 'a time of collaborative energy, creative growth, and outward expression'),
(4, 'Four', 'stability, solid foundations, structure, and resting before the next step'),
(5, 'Five', 'a period of instability, chaotic change, and challenging transitions'),
(6, 'Six', 'harmony, restoration, healing, and finding balance after a struggle'),
(7, 'Seven', 'spiritual growth, introspection, assessment, and seeking deeper truths'),
(8, 'Eight', 'mastery, action, momentum, and achieving material or practical success'),
(9, 'Nine', 'fruition, nearing completion, inner wisdom, and culminating energy'),
(10, 'Ten', 'completion, the end of a cycle, absolute fulfillment, and making way for the new');

--  Major Numerology
INSERT INTO major_numerology (id, name, meaning) VALUES
(0, 'Zero', 'infinite potential, pure spirit, divine zero-point, and new beginnings'),
(1, 'One', 'focused will, concious creation, action, and the power to manifest reality'),
(2, 'Two', 'duality, intuition, subconcious wisdom, and the veil between seen and unseen'),
(3, 'Three', 'growth, creative abundance, and expression'),
(4, 'Four', 'structure, stability, foundation, authority, and earthly order'),
(5, 'Five', 'major life changes, spiritual lessons, institutional rules, or dynamic change'),
(6, 'Six', 'harmony, choice, alignment of opposing forces, and cooperation'),
(7, 'Seven', 'spiritual and mental triumph, determination, steering through opposition'),
(8, 'Eight', 'inner power, mastery, cause and effect, equalibrium, and karmic balance'),
(9, 'Nine', 'inner wisdom, attainment, introspection, and the closure'),
(10, 'Ten', 'a pivotable threshold, a turning point of transformation, where a cycle reaches it''s end, and transitions into a higher level of awarness'),
(21, 'Twenty-One', 'complete integration, successful conclusion of the journey, and total cosmic whole');

--  Card Ranks
INSERT INTO ranks (id, name, meaning) VALUES
('page', 'Page', "exploration, and the fresh spark of learning. Pages carry messages and bring the energy of encountering something for the first time - curious, open, unfiltered, and not yet skilled enough to know what they don't know, they sit at the boundary between discovery and expression."),
('knight', 'Knight', "action, momentum. Knights have taken their new power out into the world and they're in pursuit of a specific vision or goal -- bold, committed, sometimes reckless, always in motion. Knights represent the stage where you've moved past discovery into action, but haven't yet learned restraint."),
('queen', 'Queen', "receptive mastery, emotional wisdom, nurturing presence, and deep self-assurance. Fully integrated their suit's energy from the inside, Queens don't need to prove anything or pursue anything. She holds the power, sustains it, and lets it work through her."),
('king', 'King', "external mastery, authority. Kings fully integrate their suit's energy and send it out into the world, aligning with strategic vision, and command over their realm")
ON DUPLICATE KEY UPDATE meaning = VALUES(meaning);




-- ✨ Specific Cards ✨
INSERT INTO cards (id, suit_id, rank_id, numerology_id, arcana_id, card_meaning, card_meaning_reversed) VALUES
('5_Swords', 'swords', NULL, 5, 'minor', 'a hollow victory won at a high cost, urging you to choose your battles wisely', NULL),
('16_TheTower', NULL, NULL, 16, 'major', 'if it all falls apart, consider that maybe it wasn''t that well built to begin with. Seekers fear this card because of its connotation of destruction, but its truth is you cannot destroy that which never existed. The lightning strike may look like a violent toppling of a sound structure but this structure is no longer sound, it no longer serves you anymore. False or not, destruction may hurt, it may be uncomfortable but the tower won''t allow you to be comfortable on unstable land in a reality that never was. This is your awakening, once the dust clears you''ll have the clarity to see beyond your beliefs and what you perceived as the end was actually the beginning. Let go when the tower finally falls, in the rubble you will find your freedom-- Don''t forget to yell JENGA', 'averting disaster at the last moment, or an internal fear of inevitable change.'),
('11_Justice', NULL, NULL, 11, 'major', 'a cosmic audit, asking, “Are your choices matching your values?” See things as they actually are now, and trust that truth has a longer arc than luck', NULL),
('1_Cups', 'cups', NULL, 1, 'minor', 'a flood of raw emotion, new love, and an overwhelming overflow of intuitive potential', NULL),
('2_Cups', 'cups', NULL, 2, 'minor', 'a sacred partnership, deep mutual connection, and the harmonizing of two aligned souls', NULL),
('3_Cups', 'cups', NULL, 3, 'minor', 'a joyful celebration of community, genuine friendship, shared victory, and emotional expression', NULL),
('4_Cups', 'cups', NULL, 4, 'minor', 'emotional apathy and uninspired contemplation, fixating on what is missing while ignoring new offerings', NULL),
('5_Cups', 'cups', NULL, 5, 'minor', 'grief and regret over spilled energy, forgetting that while some cups are empty, others still stand full', NULL),
('6_Cups', 'cups', NULL, 6, 'minor', 'sweet nostalgia, innocent memories, and returning to the roots of simple, uncomplicating joy', NULL),
('7_Cups', 'cups', NULL, 7, 'minor', 'dazzling illusions, endless daydreams, and the paralysis of having too many tempting choices', NULL),
('1_TheMagician', NULL, NULL, 1, 'major', 'conscious manifestation and the alignment of supreme willpower with universal resources. You possess all the tools required to bring your design into physical reality; hesitation is the only obstacle.', 'creative blocks, misdirected intent, or utilizing skill and artifice for manipulation rather than authentic creation.'),
('6_TheLovers', NULL, NULL, 6, 'major', 'profound emotional and moral alignment, sacred union, and a pivotal choice that demands complete integration of your core values.', 'internal discord, fractured values, or a refusal to take accountability for a critical relational fork in the road.'),
('8_Cups', 'cups', NULL, 8, 'minor', 'the courageous, deliberate departure from an emotional investment that has expired, seeking deeper spiritual truth regardless of the temporary grief.', 'lingering in stagnant dynamics out of fear of the unknown, emotional escapism, or half-hearted retreats.'),
('8_strength', NULL, NULL, 8, 'major', 'courage governed by profound compassion and self-mastery. True power is quiet, patient, and entirely immune to external volatility.', 'fluctuating self-esteem, unmanaged impulse, or giving into base emotional reactivity under pressure.'),
('9_Cups', 'cups', NULL, 9, 'minor', 'absolute emotional satisfaction, wish-fulfillment, and deep psychological alignment with your own achievements. The culmination of inner peace.', 'complacency, hollow materialism, or masking profound emotional dissatisfaction behind a facade of perfection.'),
('9_TheHermit', NULL, NULL, 9, 'major', 'withdrawal from the superficial noise of the collective to seek inner illumination, solitude, and uncompromised truth.', 'isolation born of bitterness, alienation, or an obstinate refusal to accept guidance from external realities.'),
('10_Cups', 'cups', NULL, 10, 'minor', 'harmonious fulfillment, enduring emotional security, and the peaceful alignment of the domestic and spiritual self.', 'broken domestic expectations, idealized family structures collapsing, or the painful divergence of shared paths.'),
('12_TheHangedMan', NULL, NULL, 12, 'major', 'voluntary surrender, radical paradigm shifts, and the profound wisdom found only by looking at existence from an inverted angle.', 'stagnation, fruitless martyrdom, or stubborn resistance against an inevitable perspective transformation.'),
('13_death', NULL, NULL, 13, 'major', 'absolute systemic transformation, the purging of obsolete paradigms, and the absolute necessity of an ending to clear space for the new.', 'pathological resistance to change, clinging to dead iterations of the self, or fear of finality.'),
('15_TheDevil', NULL, NULL, 15, 'major', 'confronting the shadowed architecture of self-imposed bondage, psychological dependencies, and materialism that eclipses spiritual sovereignty.', 'gradual liberation from destructive patterns, reclaiming personal autonomy, and breaking toxic cycles.'),
('Queen_Cups', 'cups', 'queen', NULL, 'minor', 'mastery over emotional waters—deep intuitive intelligence, unconditional compassion, and unshakeable psychological boundaries.', 'emotional instability, psychic over-extension, or using empathy as a tool for subtle psychological control.')
ON DUPLICATE KEY UPDATE card_meaning = VALUES(card_meaning), card_meaning_reversed = VALUES(card_meaning_reversed);
-- REALM OF MORTALS AND MEMEORIES
-- ===============================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    display_name VARCHAR(100) NOT NULL,
    password_hash VARCHAR(255) NOT NULL, -- php password_hash()
    created_at DATE DEFAULT CURRENT_DATE
);

CREATE TABLE readings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    card_a_id VARCHAR(50) NOT NULL,
    card_a_reversed BOOLEAN DEFAULT FALSE,
    card_b_id VARCHAR(50) NOT NULL,
    card_b_reversed BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (card_a_id) REFERENCES cards(id),
    FOREIGN KEY (card_b_id) REFERENCES cards(id)
);

INSERT INTO users (username, display_name, password_hash) 
VALUES ('seeker', 'Mystic Seeker', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1aQ1N.Yq.8Zq3X1N.Yq.8Zq3X1N.Yq');

INSERT INTO readings (user_id, card_a_id, card_a_reversed, card_b_id, card_b_reversed, created_at) VALUES
(1, '16_TheTower', 0, '1_Cups', 0, NOW()),                                 
(1, '2_Cups', 0, '5_Swords', 1, NOW() - INTERVAL 1 DAY),                   
(1, '3_Cups', 0, '7_Cups', 0, NOW() - INTERVAL 2 DAY);

-- SET GLOBAL event_scheduler = ON; -- shoutout mySQL task schedulaer (if it works (please work))
-- -- UGHHHHHHHHHHHHHHHHHHHHHHHHHHError: Event Scheduler: An error occurred when initializing system tables. Disabling the Event Scheduler

-- -- auto grimreaper for old readings
-- CREATE EVENT purge_ancient_readings
-- ON SCHEDULE EVERY 1 DAY
-- DO
--     DELETE FROM readings
--     WHERE created_at < NOW() - INTERVAL 7 DAY;
