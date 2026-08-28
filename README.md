<img src="/asabovesobelow/icons/Group 93.png" width="100%">

# 🌙 As Above, So Below (A Cosmic Tarot Synthesizer)

> *What should I look forward to?*
> *What should I beware?*
> *It's not about fate. It's about awareness, and awareness creates freedom.*

Welcome to **As Above, So Below**, a digital tarot matchmaking engine built to bring cosmic alignment to the present moment.

Tarot is an ancient tool for self-discovery, guidance, and personal growth. It helps you connect with your intuition and view reality from an entirely new perspective. This platform is not about predicting the future; it is about understanding yourself deeper in the present moment, translating the chaotic randomness of the universe into mindful, active intuition.

## 🌌 The Cosmic Core: As Above, So Below

The entire architecture of this application is designed to encompass the classic hermetic maxim: *As above, so below* - that the unconscious mind and materal reality are only reflections of one another. Or as I have lay it out:

* **As Above:** Your first card drawn—representing tbe skyward current. Not a fortune told, but the raw spark of unmanifest voltage waiting to descend. The subtle ideal seeking a vessel-the pure frequency of revelation ready to move through you if your lens is clear.
* **So Below:** Your second card drawn-representing the shadow in the soil. Where high voltage degrades into static. Because the same lightning that illuminates can scorch, this shows where unexamined attention turns potential power into friction, inertia, or lost ground..


## 🌀 Philosophical Framework: Hegelian Dialectics in Code

This platform’s database architecture and linguistic "stitching" engine are heavily rooted in Hegelian dialectical theory.

> *"Dialectics explains reality as a dynamic process, constantly changing due to the internal contradictions... historically, change occurs over time precisely when opposing forces interact." (Dziak, 2024)*

This system acts as a digital simulation of this exact process, using PHP and SQL to resolve the tension between opposing forces. *The right match changes everything:*

```text
[ Card A: THESIS ]              [ Card B: ANTITHESIS ]
  (What to look forward to)             (What to what to beware)
             \                                 /
              \                               /
               \                             /
                \                           /
                 ▼                         ▼
               [ THE SYSTEM'S STITCHING ENGINE ]
                             │
                             ▼
                     [ THE SYNTHESIS ]
                  (Your Custom Prophecy)

```

* **The Thesis (Card A):** Represents the cosmic path you are actively stepping into.
* **The Antithesis (Card B):** Functions not as a polar opposite, but as a conflicting, oppositional pressure—the earthly warning confronting your current trajectory.
* **The Synthesis (The Dynamic Reading):** Because time is an absolute constant, this structural tension must inevitably resolve. The PHP backend processes these opposing values, dynamically stitching their individual meanings, numerologies, and elemental dignities together to culminate in a cohesive **Synthesis**.

The resulting prophecy is a fresh reality that is neither identical to Card A nor Card B, but a complex, unified culmination of both.

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

## 🛠️ Tech Stack & Architecture

* **Frontend Rituals:** HTML5, CSS3 (Advanced grid layout, 3D CSS transforms for card flipping, custom cursors), Vanilla JavaScript (Custom state machines and AJAX `fetch` APIs for seamless card draws without page reloads).
* **The Oracle Engine (Backend):** PHP 8.0+ handling complex object-oriented synthesis and asynchronous prophecy generation.
* **The Vault (Database):** MySQL / MariaDB, utilizing a fully normalized (i think) relational schema interacted with securely via **PHP PDO**.

---

## 🔮 Generate Your Prophecy

### Prerequisites

* PHP (v8.0+)
* MySQL / MariaDB
* A local server environment (XAMPP, MAMP, etc.)

### Installation & Ritual Setup

1. **Clone the repository** into your local server directory (e.g., `htdocs`):
```bash
git clone https://github.com/your-username/as-above-so-below.git
cd as-above-so-below

```


2. **Database Setup:**
* Open your SQL client and create a database named `as_above_so_below`.
* Import the `schema.sql` file containing the cards, suits, numerology, and user tables.


3. **Configuration:**
Create a `config.php` file in the root directory to securely connect to your database using PDO:
```php
<?php
$host = 'localhost';
$dbname = 'as_above_so_below';
$user = 'root';
$pass = 'your_secure_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("The connection to the unseen realm failed: " . $e->getMessage());
}
?>

```


4. **Launch:** Start Apache and MySQL, then navigate to `http://localhost/as-above-so-below` in your browser to begin the ritual.

---

## 🌌 The Unseen Admin Notice

> *"The universe is under no obligation to make sense to you."*

Do not search the codebase for a moderator profile, an admin portal, or a creator credential. The architect has stepped aside to let the system run on pure, beautiful, cosmic entropy.

---
