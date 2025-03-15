<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Spokify</title>
  <link rel="stylesheet" href="spotify.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="desktop-version">
  <div class="container">

    <!-- Mobile Sidebar  -->
    <div class="sidebar-toggle" id="sidebarToggle">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="logo">
        <img src="assets/Spotify_logo_without_text.svg" alt="Spotify Logo">
        <h1>Spokify</h1>
      </div>
      <nav>
        <ul>
          <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="#"><i class="fas fa-search"></i> Search</a></li>
          <li><a href="#"><i class="fas fa-book"></i> Your Library</a></li>
          <li><a href="#"><i class="fas fa-music"></i> My Playlist</a></li>
        </ul>
      </nav>
      <div class="account">
      <p><i class="fas fa-user fa-lg"></i> User: <strong><?php echo htmlspecialchars($_SESSION['first_name'] ?? 'Guest'); ?> <?php echo htmlspecialchars($_SESSION['last_name'] ?? ''); ?></strong></p>
      </div>
      <a href="logout.php" style="color: #fff; text-decoration: none;">Logout</a>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <header class="header">
        <h2>Good Morning</h2>
        <div class="search-bar">
          <input type="text" placeholder="Search...">
        </div>
      </header>

      <!-- Playlist Section -->
      <section class="playlist">
        <h3>Your Playlists</h3>
        <div class="playlist-grid">
          <div class="playlist-card">
            <img src="assets/pic1.jpg" alt="Playlist Cover">
            <p>Daniel Caesar</p>
          </div>
          <div class="playlist-card">
            <img src="assets/Taylorswift.jpg" alt="Playlist Cover">
            <p>Taylor Swift</p>
          </div>
        </div>
      </section>

      <!-- Trending Section -->
      <section class="trending">
        <h3>Trending Now</h3>
        <div class="trending-grid">
          <div class="trending-card">
            <img src="assets/trending/Marilag.jpg" alt="Trending Cover">
            <p>Marilag</p>
            <p class="artist">Dionela</p>
          </div>
          <div class="trending-card">
            <img src="assets/trending/blue.jpg" alt="Trending Cover">
            <p>blue</p>
            <p class="artist">yung kai</p>
          </div>
          <div class="trending-card">
            <img src="assets/trending/isa-lang.jpg" alt="Trending Cover">
            <p>Isa lang</p>
            <p class="artist">Arthur Nery</p>
          </div>
          <div class="trending-card">
            <img src="assets/trending/bawat-sandali.jpg" alt="Trending Cover">
            <p>Sa Bawat Sandali</p>
            <p class="artist">Amiel Sol</p>
          </div>
          <div class="trending-card">
            <img src="assets/trending/luther.jpg" alt="Trending Cover">
            <p>luther(with sza)</p>
            <p class="artist">Kendrick Lamar, SZA</p>
          </div>
        </div>
      </section>

      <!-- Recently Played Section -->
      <section class="recently-played">
        <h3>Recently Played</h3>
        <div class="recently-played-grid">

          <div class="recently-played-card">
            <img src="assets/npal.jpg" alt="Recently Played Cover">
            <p>Bilangkad</p>
            <p class="artist">No Pets Allowed</p>
          </div>

          <div class="recently-played-card">
            <img src="assets/palagi.jpg" alt="Recently Played Cover">
            <p>Palagi</p>
            <p class="artist">TJ Monterde</p>
          </div>

          <div class="recently-played-card">
            <img src="assets/mahika.jpg" alt="Recently Played Cover">
            <p>Mahika</p>
            <p class="artist">Adie</p>
          </div>

        </div>
      </section>
    </main>

    <!-- Music Player -->
    <footer class="music-player">
      <div class="player-container">
        <div class="song-info">
          <img src="assets/pic1.jpg" alt="Song Cover" id="song-cover">
          <div>
            <p id="song-title"></p>
            <p id="song-artist" class="artist"></p>
          </div>
        </div>
        <div class="player-controls">
          <button id="prev"><i class="fas fa-backward"></i></button>
          <button id="play"><i class="fas fa-play"></i></button>
          <button id="next"><i class="fas fa-forward"></i></button>
        </div>
        <div class="progress-bar">
          <input type="range" id="progress" value="0">
          <div class="time">
            <span id="current-time">0:00</span>
            <span id="duration">0:00</span>
          </div>
        </div>
      </div>
    </footer>
  </div>
  </div>

  <script src="spotify.js"></script>
</body>
</html>