<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
  background: #f8fafc;
  margin: 0;
  padding: 0;
}

/* Style the header */
header {
  background: linear-gradient(90deg, #4f8cff 0%, #6ee7b7 100%);
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
  letter-spacing: 2px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 30%;
  height: 300px; /* only for demonstration, should be removed */
  background: #fff;
  padding: 20px;
  border-radius: 10px 0 0 10px;
  box-shadow: 2px 0 8px rgba(0,0,0,0.04);
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

nav ul li {
  margin-bottom: 18px;
}

nav ul li a {
  display: block;
  padding: 12px 18px;
  color: #333;
  text-decoration: none;
  border-radius: 6px;
  font-weight: 500;
  transition: background 0.2s, color 0.2s;
}

nav ul li a.active,
nav ul li a:hover {
  background: linear-gradient(90deg, #4f8cff 0%, #6ee7b7 100%);
  color: #fff;
}

/* Article styles */
article {
  float: left;
  padding: 24px;
  width: 70%;
  background-color: #f1f1f1;
  height: 300px; /* only for demonstration, should be removed */
  border-radius: 0 10px 10px 0;
  box-shadow: 2px 0 8px rgba(0,0,0,0.04);
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background: #4f8cff;
  padding: 14px;
  text-align: center;
  color: white;
  font-size: 18px;
  border-radius: 0 0 10px 10px;
  margin-top: 30px;
}

/* Responsive layout */
@media (max-width: 900px) {
  nav, article {
    float: none;
    width: 100%;
    border-radius: 10px;
    height: auto;
    box-shadow: none;
  }
  section {
    padding: 0 10px;
  }
  footer {
    border-radius: 0 0 10px 10px;
  }
}
</style>
</head>
<body>

<h2 style="text-align:center; color:#4f8cff; margin-top:24px;">Abduwlahab, mohammadjarer A.</h2>
<p style="text-align:center; color:#555;">This is our website</p>

<header>
  <h2>Cities</h2>
</header>

<section>
  <nav>
    <ul>
      <li><a href="home.php?page=london" class="<?php echo ($_GET['page'] ?? '') === 'london'  ? 'active' : ''; ?>">London</a></li>
      <li><a href="home.php?page=paris" class="<?php echo ($_GET['page'] ?? '') === 'paris'  ? 'active' : ''; ?>">Paris</a></li>
      <li><a href="home.php?page=tokyo" class="<?php echo ($_GET['page'] ?? '') === 'tokyo'  ? 'active' : ''; ?>">Tokyo</a></li>
    </ul>
  </nav>
  
  <article>
    <!-- wala nanih sulod -->
     <?php
        if (isset($_GET['page'])){
            $page = $_GET['page'];
            // Include the corresponding content based on the requested page
            switch ($page) {
                case 'london':
                    include 'london.php';
                    break;
                case 'paris':
                    include 'paris.php';
                    break;
                case 'tokyo':
                    include 'tokyo.php';
                    break;
            }
        }
     ?>
  </article>
</section>

<footer>
  <p>Footer</p>
</footer>

</body>
</html>

