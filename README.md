# 🌌 As Above, So Below (A Cosmic Tarot Synthesizer)

> What should I look forward to?
> What should I beware?
> It's not about fate. It's about awareness and awareness creates freedom <3

Welcome to **As Above, So Below**, a digital tarot matchmaking engine built to bring cosmic alignment to the present moment <3

Tarot is an ancient tool for self-discovery, guidance, and personal growth. It helps you connect with your intuition and see things from an entirely new perspective. This platform is not about predicting the future; it is about understanding yourself deeper in the present moment, translating the chaotic randomness of the universe into mindful, active intuition >:D

## The Cosmic Core: As Above, So Below
The entire architecture of this application is designed to encompass the classic hermetic maxim: *As above, so below; as within, so without; as the universe, so the soul.*

*   **As Above:** Your first card drawn—representing the cosmic path ahead and *what you should look forward to*.
*   **So Below:** Your second card drawn—representing the earthly warnings and *what you should beware*.
*   **As Within:** Your active choice. The moment you decide to draw, pulling your inner energy into the digital realm.
*   **So Without:** The complete lack of a human moderator, administrator, or dictator pulling the strings. The system operates entirely autonomously.
*   **As the Universe:** Pure randomness, chance, and chaotic database generation. 
*   **So the Soul:** Your personal interpretation of this digital chaos, reflecting on thoughts, paths, and patterns you might have never even considered before.

---

## 🌀 Philosophical Framework: Hegelian Dialectics in Code

This platform’s database architecture and linguistic "stitching" engine are heavily rooted in Hegelian dialectical theory. 

> "Dialectics explains reality as a dynamic process, constantly changing due to the internal contradictions... historically, change occurs over time precisely when opposing forces interact." *(Dziak, 2024)*

This system acts as a digital simulation of this exact process, using code to resolve the tension between opposing forces, *the right match changes everything*:

[ Card A: THESIS ]              [ Card B: ANTITHESIS ]
  (What to look forward to)             (What to what to beware)
             \                               /
              \                             /
               \                           /
                \                         /
                 ▼                       ▼
              [ THE SYSTEM'S STITCHING ENGINE ]
                             │
                             ▼
                   [ THE SYNTHESIS ]
                (Your Custom Prophecy)

*   **The Thesis (Card A):** Represents the cosmic path you are actively stepping into (what you should look forward to).
*   **The Antithesis (Card B):** Functions not as a polar opposite, but as a conflicting, oppositional pressure—the earthly warning confronting your current trajectory (what you should beware).
*   **The Synthesis (The Dynamic Reading):** Because time is an absolute constant, this structural tension must inevitably resolve. The PHP backend processes these opposing values, stitching their individual meanings, numerologies, and suits together to culminate in a **Synthesis**. 

The resulting prophecy is a fresh reality that is neither identical to Card A nor Card B, but a complex, unified culmination of both; forcing the user into a state of mindful reflection.

---

## 🃏 The Random Card Constraints
This project was born from a random deck shuffle in class. The application's core mechanics are dictated by these three specific constraints:

### 🟢 Human Truth: The Right Match Changes Everything
A single card holds a singular truth, but **the right match changes the entire prophecy**. The PHP backend acts as a synthesis engine. It takes the suit, the numerology, and the card meaning of Card A (Thesis) and stitches them dynamically with Card B (Antithesis) to generate a completely customized, interwoven reading (Synthesis) that is entirely unique to your combination.

### 🔵 Behavioural Twist: Readings Expire After One Week
The cosmic energies of the universe are constantly in flux. The universe only holds onto that fate for a brief moment. After exactly 7 days, a MySQL background query purges the saved reading from the database. Your slate is wiped clean, prompting you to reflect on the present moment once more.

### 🔴 Build Constraint: The Admin is Never Named or Seen
There is no human admin controlling the cards, managing the database, or moderating your path. The "Admin" is the unseen, chaotic hand of the universe. The system runs entirely on its own code, completely unmonitored, untamed, and free of human ego.

---

## 🛠️ Tech Stack & Architecture
### Dynamic "Stitching" Engine
Instead of hardcoding thousands of unique card pairings, the system utilizes a highly scalable, modular object-oriented approach in PHP. 
*   **Suits** (4 options), **Numerology** (10 options), and **Cards** (78 options) are stored as individual objects.
*   When two cards are drawn, the backend dynamically weaves their variables into a cohesive, poetic narrative.

### Ephemeral MySQL Database
A lightweight database schema stores active, saved readings. A silent, automated cleanup routine runs on database connection to permanently delete expired fates:
```sql
DELETE FROM saved_readings WHERE created_at < NOW() - INTERVAL 7 DAY;
```

## 🔮 Generate Your Profecy
* **Prerequisites**
*   PHP (v8.0+)
*   MySQL / MariaDB
*   A local Apache server environment (like XAMPP, MAMP, or Docker)

* **Installation**
1. Clone the repository into your local server directory (e.g., `htdocs` or `www`):
   ```bash
   git clone [https://github.com/your-username/as-above-so-below.git](https://github.com/your-username/as-above-so-below.git)

   cd as-above-so-below
   ```
## Database Setup:
* Open your SQL client (e.g., phpMyAdmin).
* Create a database named as_above_so_below.
* Import the schema.sql file containing the cards, suits, and numerology tables.

## Configuration:
Create a config.php file in the root directory to securely connect to your database:
```PHP
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'your_secure_password');
define('DB_NAME', 'as_above_so_below');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>
```
## Launch:
Start Apache and MySQL via your local environment manager.
Navigate to http://localhost/as-above-so-below in your browser.

## 🌌 The Unseen Admin Notice
 > "The universe is under no obligation to make sense to you."
  * Do not search the codebase for a moderator profile, an admin portal, or a creator credential. The architect has stepped aside to let the system run on pure, beautiful, cosmic entropy.
