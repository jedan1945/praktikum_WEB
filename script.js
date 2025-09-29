// Tombol Dark Mode
const darkToggle = document.getElementById("darkToggle");
darkToggle.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");
  darkToggle.textContent = 
    document.body.classList.contains("dark-mode") 
    ? "Light Mode" 
    : "Dark Mode";
});

// Fetch API (contoh ambil anime Gundam dari Jikan API)
async function fetchAnime() {
  try {
    const res = await fetch("https://api.jikan.moe/v4/anime?q=gundam&limit=3");
    const data = await res.json();

    const animeList = document.getElementById("animeList");
    animeList.innerHTML = "<h3>Data Anime Gundam (API)</h3>";

    data.data.forEach(anime => {
      const div = document.createElement("div");
      div.className = "card";
      div.innerHTML = `
        <h4>${anime.title}</h4>
        <img src="${anime.images.jpg.image_url}" alt="${anime.title}" width="200">
        <p>${anime.synopsis ? anime.synopsis.substring(0,100) + "..." : "No synopsis available"}</p>
      `;
      animeList.appendChild(div);
    });

  } catch (err) {
    console.error("Error fetching anime:", err);
  }
}

fetchAnime();
