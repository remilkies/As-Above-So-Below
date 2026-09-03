<img src="/asabovesobelow/icons/Group 93.png" width="100%">

> *"What should I look forward to? What should I beware?"*  
> *It's not about fate. It's about awareness, and awareness creates freedom.*

**As Above, So Below** is a celestial full-stack tarot engine that merges Hegelian dialectics with dynamic card synthesis. Draw dual archetypes through an interactive 3D card spread to generate real-time synthesized prophecies derived from suit collisions, elemental dignities, arcana alignments, and card reversals.

## Core Features

### 🌀 Hegelian Synthesis Engine
Processes card pairs through a strict dialectical framework—treating Card A as the **Thesis** (*what to look forward to*) and Card B as the **Antithesis** (*what to beware*). The backend PHP stitching engine resolves opposing forces into a unified **Synthesis** prophecy. 

### 🔮 Dynamic Reading Synthesis

This system acts as a digital simulation of Hegelian dialectics. Instead of hardcoding thousands of unique pairings, the PHP backend acts as an object-oriented synthesis engine. An algorithmic reading generator parses drawn card pairs and calculates multi-layered outputs—evaluating Major vs. Minor Arcana weight, suit/element collisions, numerological digit reduction, and upright or reversed card states.

### 🌙 Interactive Wheel & Touch Spread
Features a 15-card angled spread equipped with pointer-event dragging, deck collapse animation, custom reshuffling state locks, and 3D CSS card flipping.

### 🌙 Inner Sanctum & Past Prophecies

Authenticated seekers can step into their personal portal to review previous daily readings, track recurring archetypes, and revisit past readings over time. An interactive 3D spatial carousel displays active saved readings, inverted card indicators, and auto-cleansed date logs.

### 🧹 Automated 7-Day Purge Logic
Built-in background cleanup to maintain cosmic fluidity and lean database hygiene; past readings self-purge after seven days upon database connection.

### ✨ Celestial Dark UI & Custom Card Deck

Hand-crafted line illustrations and custom tarot card vectors set inside a dark celestial interface complete with interactive card wheels and crystal iconography.

## Tech Stack

### Frontend Rituals

* **HTML5 & CSS3:** CSS Custom Properties, 3D CSS Transforms, Glassmorphism, Bootstrap 5.3.
* **Vanilla JavaScript (ES6+):** Custom State Machine, Pointer Dragging, Asynchronous Fetch API, 3D Matrix Carousel.
* Custom SVG & Line Art Assets

### Backend Sorcery

* **PHP 8.x:** Object-Oriented Synthesis Engine, Session Management, Dynamic HTML Rendering.
* **PDO Abstraction Layer:** Secure prepared statements with parameter binding.
* Session Management & Authentication

###  The Oracle (Database)

* **MySQL / MariaDB:** Relational database schema storing users, readings, and card attributes. (Foreign Keys, Left Joins)

## Application Flow
```text
User Draws Cards → Interactive Wheel UI → AJAX Request (POST)
                                                 ↓
                                    PHP Backend (oracle.php)
                                                 ↓
                         MySQL Database Query via PDO (LEFT JOINs)
                                                 ↓
                         Synthesis Engine (Arcana + Suits + Numerology)
                                                 ↓
                         HTML Response Payload & Sanctum Record Created
```
---

## 🃏 The Random Card Constraints

This project was born from a random deck shuffle, and its core mechanics are dictated by three unyielding constraints:

### 🟢 Human Truth: The Right Match Changes Everything

A single card holds a singular truth, but **the right match changes the entire prophecy**. Instead of hardcoding thousands of unique pairings, the PHP backend acts as an object-oriented synthesis engine. It evaluates the suit, numerology, and rank of the Thesis and weaves them with the Antithesis to generate a completely customized reading.

### 🔵 Behavioural Twist: Readings Expire After One Week

Cosmic energies are constantly in flux; the universe only holds onto a specific fate for a brief moment. After exactly 7 days, a background routine purges the saved reading from the database. Your slate is wiped clean, prompting you to reflect on the present moment once more.

```sql
DELETE FROM saved_readings WHERE created_at < NOW() - INTERVAL 7 DAY;

```

### 🔴 Build Constraint: The Admin is Never Named or Seen

There is no human admin controlling the cards, managing the database, or moderating your path. The "Admin" is the unseen, chaotic hand of the universe. The system runs entirely on its own code, completely unmonitored, untamed, and free of human ego.

---


## 🔮 Generate Your Prophecy

### Prerequisites

* PHP (v8.0+)
* MySQL / MariaDB
* A local server environment (XAMPP, MAMP, etc.)

### Installation & Ritual Setup

1. **Clone the repository** into your local server directory (e.g., `htdocs`):
```bash
git clone [https://github.com/remilkies/as-above-so-below.git](https://github.com/remilkies/as-above-so-below.git)
cd as-above-so-below

```


2. **Database Setup:**

Import the included `oracle.sql` schema into MySQL / MariaDB via CLI or phpMyAdmin:

```sql
CREATE DATABASE as_above_so_below;
USE as_above_so_below;
SOURCE AsAboveSoBelow.sql;
```

3. **Oracle Database Configuration**
Database connection settings and automatic 7-day purge logic are pre-configured inside `backend/oracle.php`. Adjust credentials if your local environment differs from standard XAMPP defaults:
```php
<?php 
// Database Connection & Gatekeeper
$host = '127.0.0.1'; // Bypasses Unix/Mac socket issues in local environments
$user = 'root';      // XAMPP default MySQL username
$pass = '';          // XAMPP default password
$db   = 'AsAboveSoBelow';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Silent 7-Day Purge Execution
    $purgeStmt = $pdo->prepare("DELETE FROM readings WHERE created_at < DATE_SUB(NOW(), INTERVAL 7 DAY)");
    $purgeStmt->execute();
} catch (\PDOException $e) {
    error_log("Oracle Error: " . $e->getMessage());
    http_response_code(500); 
    echo "The Oracle channel has collapsed. Error code: " . (int)$e->getCode();
    exit;
}
?>

```


4. **Launch:** Start Apache and MySQL, then navigate to `http://localhost/as-above-so-below` in your browser to begin the ritual.

---

## 🌌 The Unseen Admin Notice


Not created by **REMByte** <3
*Home of Aesthetic Functionality*
> *"Do not search the codebase for a moderator profile, an admin portal, or a creator credential. The architect has stepped aside to let the system run on pure, beautiful, cosmic entropy."*



---
