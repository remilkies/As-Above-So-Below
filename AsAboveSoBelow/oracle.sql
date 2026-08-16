-- Active: 1786802362824@@localhost@3306@AsAboveSoBelow
-- 1. Create the Tables
CREATE TABLE arcana (
    id VARCHAR(10) PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    meaning TEXT NOT NULL
);

CREATE TABLE suits (
    id VARCHAR(20) PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    element VARCHAR(50),
    meaning TEXT NOT NULL
);

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
)

CREATE TABLE cards (
    id VARCHAR(50) PRIMARY KEY,
    suit_id VARCHAR(20) NULL,
    rank_id VARCHAR(20) NULL,
    numerology_id INT NULL,
    arcana_id VARCHAR(10) DEFAULT 'minor',
    card_meaning TEXT NOT NULL,
    card_meaning_reversed TEXT NULL,
    FOREIGN KEY (suit_id) REFERENCES suits(id),
    FOREIGN KEY (arcana_id) REFERENCES arcana(id),
    FOREIGN KEY (rank_id) REFERENCES ranks(id)
);

-- Arcana Data
INSERT INTO arcana (id, name, meaning) VALUES
('major', 'Major Arcana', 'major milestones and the grand narrative of life, it''s spiritual lessons, and transformative experiences'),
('minor', 'Minor Arcana', 'the day-to-day experiences, challenges, and opportunities that shape our journey');

--  Suits Data
INSERT INTO suits (id, name, element, meaning) VALUES
('cups', 'Cups', 'Water', 'navigating the deep waters of your emotions, relationships, and intuitive connections'),
('swords', 'Swords', 'Air', 'the sharp edge of intellect, communication, and mental conflict'),
('wands', 'Wands', 'Fire', 'the blazing fires of passion, creative inspiration, and bold willpower'),
('pentacles', 'Pentacles', 'Earth', 'the grounded roots of material abundance, practical foundations, and physical reality');

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
('page', 'Page', 'curiosity, new messages, exploration, and the fresh spark of learning'),
('knight', 'Knight', 'action, momentum, and the pursuit of a specific vision or goal'),
('queen', 'Queen', 'internal mastery, emotional wisdom, nurturing presence, and deep self-assurance'),
('king', 'King', 'external mastery, authority, strategic vision, and command over their realm');

-- ✨ Specific Cards ✨
INSERT INTO cards (id, suit_id, rank_id, arcana_id, card_meaning, card_meaning_reversed) VALUES
('5_swords', 'swords', '5', 'minor', 'a hollow victory won at a high cost, urging you to choose your battles wisely', NULL),
('tower', NULL, NULL, 'major', 'if it all falls apart,consider that maybe it wasn''t that well built to begin with. Let go when the tower finally falls, in the rubble you will find your freedom', 'averting disaster at the last moment, or an internal fear of inevitable change.'),
('justice', NULL, NULL, 'major', 'a cosmic audit, asking, “Are your choices matching your values?” See things as they actually are now, and trust that truth has a longer arc than luck', NULL),
('1_cups', 'cups', '1', 'minor', 'a joyful celebration of community, mutual support, and shared victory', NULL),
('2_cups', 'cups', '2', 'minor', 'a joyful celebration of community, mutual support, and shared victory', NULL),
('3_cups', 'cups', '3', 'minor', 'a joyful celebration of community, mutual support, and shared victory', NULL),
('4_cups', 'cups', '4', 'minor', 'a joyful celebration of community, mutual support, and shared victory', NULL),
('5_cups', 'cups', '5', 'minor', 'a joyful celebration of community, mutual support, and shared victory', NULL),
('6_cups', 'cups', '6', 'minor', 'a joyful celebration of community, mutual support, and shared victory', NULL),
('7_cups', 'cups', '7', 'minor', 'a joyful celebration of community, mutual support, and shared victory', NULL);

-- ===============================
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

SET GLOBAL event_scheduler = ON; -- shoutout mySQL task schedulaer (if it works (please work))
-- UGHHHHHHHHHHHHHHHHHHHHHHHHHHError: Event Scheduler: An error occurred when initializing system tables. Disabling the Event Scheduler

-- auto grimreaper for old readings
CREATE EVENT purge_ancient_readings
ON SCHEDULE EVERY 1 DAY
DO
    DELETE FROM readings
    WHERE created_at < NOW() - INTERVAL 7 DAY;
