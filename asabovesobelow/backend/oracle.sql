-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2026 at 06:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AsAboveSoBelow`
--

-- --------------------------------------------------------

--
-- Table structure for table `arcana`
--

CREATE TABLE `arcana` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `meaning` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arcana`
--

INSERT INTO `arcana` (`id`, `name`, `meaning`) VALUES
('major', 'Major Arcana', 'major milestones, turning-point moments life-reshaping crossroads and the grand narrative of life- the archetypal forces and their spiritual lessons ending in transformative experiences'),
('minor', 'Minor Arcana', 'the day-to-day experiences, challenges, and opportunities that shape our journey. Passing moods, workplace frictions, relationship conversations, and quiet internal shifts that don\'t feel dramatic but end up defining everything.');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` varchar(50) NOT NULL,
  `suit_id` varchar(20) DEFAULT NULL,
  `rank_id` varchar(20) DEFAULT NULL,
  `numerology_id` int(11) DEFAULT NULL,
  `arcana_id` varchar(10) DEFAULT 'minor',
  `element_id` varchar(5) DEFAULT NULL,
  `card_meaning` text NOT NULL,
  `card_meaning_reversed` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `suit_id`, `rank_id`, `numerology_id`, `arcana_id`, `element_id`, `card_meaning`, `card_meaning_reversed`) VALUES
('10_Cups', 'cups', NULL, 10, 'minor', NULL, 'harmonious fulfillment, enduring emotional security, and the peaceful alignment of the domestic and spiritual self.', 'broken domestic expectations, idealized family structures collapsing, or the painful divergence of shared paths.'),
('11_Justice', NULL, NULL, 11, 'major', NULL, 'a cosmic audit, asking, “Are your choices matching your values?” See things as they actually are now, and trust that truth has a longer arc than luck', NULL),
('12_TheHangedMan', NULL, NULL, 12, 'major', NULL, 'voluntary surrender, radical paradigm shifts, and the profound wisdom found only by looking at existence from an inverted angle.', 'stagnation, fruitless martyrdom, or stubborn resistance against an inevitable perspective transformation.'),
('13_death', NULL, NULL, 13, 'major', NULL, 'absolute systemic transformation, the purging of obsolete paradigms, and the absolute necessity of an ending to clear space for the new.', 'pathological resistance to change, clinging to dead iterations of the self, or fear of finality.'),
('15_TheDevil', NULL, NULL, 15, 'major', NULL, 'confronting the shadowed architecture of self-imposed bondage, psychological dependencies, and materialism that eclipses spiritual sovereignty.', 'gradual liberation from destructive patterns, reclaiming personal autonomy, and breaking toxic cycles.'),
('16_TheTower', NULL, NULL, 16, 'major', NULL, 'if it all falls apart, consider that maybe it wasn\'t that well built to begin with. Seekers fear this card because of its connotation of destruction, but its truth is you cannot destroy that which never existed. The lightning strike may look like a violent toppling of a sound structure but this structure is no longer sound, it no longer serves you anymore. False or not, destruction may hurt, it may be uncomfortable but the tower won\'t allow you to be comfortable on unstable land in a reality that never was. This is your awakening, once the dust clears you\'ll have the clarity to see beyond your beliefs and what you perceived as the end was actually the beginning. Let go when the tower finally falls, in the rubble you will find your freedom-- Don\'t forget to yell JENGA', 'averting disaster at the last moment, or an internal fear of inevitable change.'),
('1_Cups', 'cups', NULL, 1, 'minor', NULL, 'a flood of raw emotion, new love, and an overwhelming overflow of intuitive potential', NULL),
('1_TheMagician', NULL, NULL, 1, 'major', NULL, 'conscious manifestation and the alignment of supreme willpower with universal resources. You possess all the tools required to bring your design into physical reality; hesitation is the only obstacle.', 'creative blocks, misdirected intent, or utilizing skill and artifice for manipulation rather than authentic creation.'),
('2_Cups', 'cups', NULL, 2, 'minor', NULL, 'a sacred partnership, deep mutual connection, and the harmonizing of two aligned souls', NULL),
('3_Cups', 'cups', NULL, 3, 'minor', NULL, 'a joyful celebration of community, genuine friendship, shared victory, and emotional expression', NULL),
('4_Cups', 'cups', NULL, 4, 'minor', NULL, 'emotional apathy and uninspired contemplation, fixating on what is missing while ignoring new offerings', NULL),
('5_Cups', 'cups', NULL, 5, 'minor', NULL, 'grief and regret over spilled energy, forgetting that while some cups are empty, others still stand full', NULL),
('5_Swords', 'swords', NULL, 5, 'minor', NULL, 'a hollow victory won at a high cost, urging you to choose your battles wisely', NULL),
('6_Cups', 'cups', NULL, 6, 'minor', NULL, 'sweet nostalgia, innocent memories, and returning to the roots of simple, uncomplicating joy', NULL),
('6_TheLovers', NULL, NULL, 6, 'major', NULL, 'profound emotional and moral alignment, sacred union, and a pivotal choice that demands complete integration of your core values.', 'internal discord, fractured values, or a refusal to take accountability for a critical relational fork in the road.'),
('7_Cups', 'cups', NULL, 7, 'minor', NULL, 'dazzling illusions, endless daydreams, and the paralysis of having too many tempting choices', NULL),
('8_Cups', 'cups', NULL, 8, 'minor', NULL, 'the courageous, deliberate departure from an emotional investment that has expired, seeking deeper spiritual truth regardless of the temporary grief.', 'lingering in stagnant dynamics out of fear of the unknown, emotional escapism, or half-hearted retreats.'),
('8_strength', NULL, NULL, 8, 'major', NULL, 'courage governed by profound compassion and self-mastery. True power is quiet, patient, and entirely immune to external volatility.', 'fluctuating self-esteem, unmanaged impulse, or giving into base emotional reactivity under pressure.'),
('9_Cups', 'cups', NULL, 9, 'minor', NULL, 'absolute emotional satisfaction, wish-fulfillment, and deep psychological alignment with your own achievements. The culmination of inner peace.', 'complacency, hollow materialism, or masking profound emotional dissatisfaction behind a facade of perfection.'),
('9_TheHermit', NULL, NULL, 9, 'major', NULL, 'withdrawal from the superficial noise of the collective to seek inner illumination, solitude, and uncompromised truth.', 'isolation born of bitterness, alienation, or an obstinate refusal to accept guidance from external realities.'),
('Queen_Cups', 'cups', 'queen', NULL, 'minor', NULL, 'mastery over emotional waters—deep intuitive intelligence, unconditional compassion, and unshakeable psychological boundaries.', 'emotional instability, psychic over-extension, or using empathy as a tool for subtle psychological control.');

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `id` varchar(5) NOT NULL,
  `name` varchar(5) NOT NULL,
  `meaning` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elements`
--

INSERT INTO `elements` (`id`, `name`, `meaning`) VALUES
('Air', 'Air', 'represents thought, logic and communication. Air has no substance of its own. You can\'t shape it, hold it or see it. But it carries sound, transmits ideas, and makes speech possible. Every word you ever spoke traveled through air to reach another preson\'s mind. The Suit of Swords works through this element: invisible, fast constantly in motion and capable of cuttring through anything it touches. A sharp mind is one of the greatest gifts a person can have. The capacity for discrimination, for telling truth from comfortable fiction and seeing what\'s actully happening instead of what you wish were happening, makes concious choice possible.'),
('Earth', 'Earth', 'represents recources, finances, health, manifestation and material matters'),
('Fire', 'Fire', 'represents willpower, intuition and inspiration. Fire is the only element that isn\'t a substance. Water is something you can hold. Earth is something you can stand on. Air surrounds you whether you notice it or not. But fire is a process - it only exists while it\'s consuming something else. Take away its fuel and it vanishes. Feed it and it grows beyond your control. What happens when raw creative force enters your life and what does it cost to keep it burning?'),
('Water', 'Water', 'represents emotions, feelings, intuition and the subconcious. Water flows into every available space, takes the shape of whatever contains it, and finds every crack. You can\'t push it into a shape it doesn\'t want to hold. Butit\'s always moving, always seeking its own level.');

-- --------------------------------------------------------

--
-- Table structure for table `major_numerology`
--

CREATE TABLE `major_numerology` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `meaning` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `major_numerology`
--

INSERT INTO `major_numerology` (`id`, `name`, `meaning`) VALUES
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
(10, 'Ten', 'a pivotable threshold, a turning point of transformation, where a cycle reaches it\'s end, and transitions into a higher level of awarness'),
(21, 'Twenty-One', 'complete integration, successful conclusion of the journey, and total cosmic whole');

-- --------------------------------------------------------

--
-- Table structure for table `minor_numerology`
--

CREATE TABLE `minor_numerology` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `meaning` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `minor_numerology`
--

INSERT INTO `minor_numerology` (`id`, `name`, `meaning`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `meaning` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `name`, `meaning`) VALUES
('king', 'King', 'external mastery, authority. Kings fully integrate their suit\'s energy and send it out into the world, aligning with strategic vision, and command over their realm'),
('knight', 'Knight', 'action, momentum. Knights have taken their new power out into the world and they\'re in pursuit of a specific vision or goal -- bold, committed, sometimes reckless, always in motion. Knights represent the stage where you\'ve moved past discovery into action, but haven\'t yet learned restraint.'),
('page', 'Page', 'exploration, and the fresh spark of learning. Pages carry messages and bring the energy of encountering something for the first time - curious, open, unfiltered, and not yet skilled enough to know what they don\'t know, they sit at the boundary between discovery and expression.'),
('queen', 'Queen', 'receptive mastery, emotional wisdom, nurturing presence, and deep self-assurance. Fully integrated their suit\'s energy from the inside, Queens don\'t need to prove anything or pursue anything. She holds the power, sustains it, and lets it work through her.');

-- --------------------------------------------------------

--
-- Table structure for table `readings`
--

CREATE TABLE `readings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_a_id` varchar(50) NOT NULL,
  `card_a_reversed` tinyint(1) DEFAULT 0,
  `card_b_id` varchar(50) NOT NULL,
  `card_b_reversed` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reading_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `readings` (Dummy Entries)
--

INSERT INTO `readings` (`id`, `user_id`, `card_a_id`, `card_a_reversed`, `card_b_id`, `card_b_reversed`, `created_at`, `reading_text`) VALUES
(
    1, 
    2, 
    '16_TheTower', 
    0, 
    '15_TheDevil', 
    1, 
    '2026-08-26 21:00:00', 
    '<p><strong>The Tower & The Devil (Reversed)</strong></p><p>A profound reckoning shook your foundations yesterday, tearing down an outdated framework you had long outgrown. Yet, the reversed Devil indicates the subtle beginning of liberation—the heavy chains of a self-imposed cycle are finally beginning to slip away as you step out from the rubble.</p>'
),
(
    2, 
    2, 
    '1_TheMagician', 
    0, 
    '12_TheHangedMan', 
    0, 
    '2026-08-27 02:37:00', 
    '<p><strong>The Magician & The Hanged Man</strong></p><p>Drawn deep in the quiet hours of the morning, this combination bridges raw creative willpower with radical surrender. You possess all the tools required to manifest your design into reality, but the universe demands a voluntary pause—an inverted perspective—before you take the final leap.</p>'
);

-- --------------------------------------------------------

--
-- Table structure for table `suits`
--

CREATE TABLE `suits` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `element_id` varchar(5) DEFAULT NULL,
  `meaning` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suits`
--

INSERT INTO `suits` (`id`, `name`, `element_id`, `meaning`) VALUES
('cups', 'Cups', 'Water', 'navigating the deep waters of your emotions, relationships, and intuitive connections'),
('pentacles', 'Pentacles', 'Earth', 'the grounded roots of material abundance, practical foundations, and physical reality'),
('swords', 'Swords', 'Air', 'the sharp edge of intellect, communication, and mental conflict'),
('wands', 'Wands', 'Fire', 'the blazing fires of passion, creative inspiration, and bold willpower');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `display_name`, `password_hash`, `created_at`) VALUES
(2, 'seeker', 'Mystic Seeker', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1aQ1N.Yq.8Zq3X1N.Yq.8Zq3X1N.Yq', '2026-08-26');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `arcana`
--
ALTER TABLE `arcana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suit_id` (`suit_id`),
  ADD KEY `arcana_id` (`arcana_id`),
  ADD KEY `rank_id` (`rank_id`);

--
-- Indexes for table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `major_numerology`
--
ALTER TABLE `major_numerology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minor_numerology`
--
ALTER TABLE `minor_numerology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `readings`
--
ALTER TABLE `readings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `card_a_id` (`card_a_id`),
  ADD KEY `card_b_id` (`card_b_id`);

--
-- Indexes for table `suits`
--
ALTER TABLE `suits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `element_id` (`element_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `readings`
--
ALTER TABLE `readings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`suit_id`) REFERENCES `suits` (`id`),
  ADD CONSTRAINT `cards_ibfk_2` FOREIGN KEY (`arcana_id`) REFERENCES `arcana` (`id`),
  ADD CONSTRAINT `cards_ibfk_3` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`);

--
-- Constraints for table `readings`
--
ALTER TABLE `readings`
  ADD CONSTRAINT `readings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `readings_ibfk_2` FOREIGN KEY (`card_a_id`) REFERENCES `cards` (`id`),
  ADD CONSTRAINT `readings_ibfk_3` FOREIGN KEY (`card_b_id`) REFERENCES `cards` (`id`);

--
-- Constraints for table `suits`
--
ALTER TABLE `suits`
  ADD CONSTRAINT `suits_ibfk_1` FOREIGN KEY (`element_id`) REFERENCES `elements` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
