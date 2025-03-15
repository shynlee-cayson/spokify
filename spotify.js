const playButton = document.getElementById('play');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');
const progress = document.getElementById('progress');
const songCover = document.getElementById('song-cover');
const songTitle = document.getElementById('song-title');
const songArtist = document.getElementById('song-artist');
const currentTime = document.getElementById('current-time');
const duration = document.getElementById('duration');

let isPlaying = false;
let currentSongIndex = 0;
let songs = [];

const audio = new Audio();

async function fetchSongs() {
  try {
    const response = await fetch('songs.json');
    if (!response.ok) {
      throw new Error('Failed to fetch songs');
    }
    songs = await response.json();
    loadSong(songs[currentSongIndex]);
  } catch (error) {
    console.error('Error fetching songs:', error);
  }
}

function loadSong(song) {
  songCover.src = song.cover;
  songTitle.textContent = song.title;
  songArtist.textContent = song.artist;
  audio.src = song.file;

  progress.value = 0;
  currentTime.textContent = '0:00';
  duration.textContent = '0:00';

  audio.addEventListener('loadedmetadata', () => {
    duration.textContent = formatTime(audio.duration);
  });
}

function playSong() {
  isPlaying = true;
  audio.play();
  playButton.innerHTML = '<i class="fas fa-pause"></i>';
}

function pauseSong() {
  isPlaying = false;
  audio.pause();
  playButton.innerHTML = '<i class="fas fa-play"></i>';
}

function nextSong() {
  currentSongIndex = (currentSongIndex + 1) % songs.length;
  loadSong(songs[currentSongIndex]);
  if (isPlaying) playSong();
}

function prevSong() {
  currentSongIndex = (currentSongIndex - 1 + songs.length) % songs.length;
  loadSong(songs[currentSongIndex]);
  if (isPlaying) playSong();
}

function updateProgress() {
  const { currentTime: time, duration: total } = audio;
  progress.value = (time / total) * 100;
  currentTime.textContent = formatTime(time);
  duration.textContent = formatTime(total);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  const seconds = Math.floor(time % 60);
  return `${minutes}:${seconds.toString().padStart(2, '0')}`;
}

playButton.addEventListener('click', () => (isPlaying ? pauseSong() : playSong()));
nextButton.addEventListener('click', nextSong);
prevButton.addEventListener('click', prevSong);
audio.addEventListener('timeupdate', updateProgress);
audio.addEventListener('ended', nextSong);

progress.addEventListener('input', () => {
  const seekTime = (progress.value / 100) * audio.duration;
  audio.currentTime = seekTime;
});

function updateProgress() {
  const { currentTime: time, duration: total } = audio;
  const progressPercent = (time / total) * 100;
  progress.value = progressPercent;

  progress.style.setProperty('--progress', `${progressPercent}%`);

  currentTime.textContent = formatTime(time);
  duration.textContent = formatTime(total);
}

fetchSongs();


let currentSong = 1;

document.getElementById('next').addEventListener('click', function() {
  if (currentSong === 1) {

    document.body.style.background = "linear-gradient(180deg, #d52a4fc8, #000)";
    document.querySelector('.music-player').style.background = "linear-gradient(190deg, #000, #d52a4f)";
    currentSong = 2;
  } else {
    document.body.style.background = "linear-gradient(180deg, #3017a1c4, #000)";
    document.querySelector('.music-player').style.background = "linear-gradient(190deg, #000000, #3017a1)";
    currentSong = 1;
  }
});

document.getElementById('prev').addEventListener('click', function() {
  if (currentSong === 1) {
    document.body.style.background = "linear-gradient(180deg, #d52a4fc8, #000)";
    document.querySelector('.music-player').style.background = "linear-gradient(190deg, #000, #d52a4f)";
    currentSong = 2;
  } else {
    document.body.style.background = "linear-gradient(180deg, #3017a1c4, #000)";
    document.querySelector('.music-player').style.background = "linear-gradient(190deg, #000000, #3017a1)";
    currentSong = 1;
  }
});

document.addEventListener('DOMContentLoaded', function () {
  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebar = document.querySelector('.sidebar');

  sidebarToggle.addEventListener('click', function () {
    sidebar.classList.toggle('visible');
    sidebarToggle.classList.toggle('active');
  });
});