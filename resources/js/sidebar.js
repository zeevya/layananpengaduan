document.addEventListener("DOMContentLoaded", function () {
    // Ambil sidebar dari folder components/
    fetch("components/sidebar.html")
      .then((response) => response.text())
      .then((data) => {
        document.getElementById("sidebar-container").innerHTML = data;
  
        // Setelah sidebar dimuat, baru pasang event listener untuk toggle
        setupSidebarToggle();
      })
      .catch((error) => console.error("Gagal memuat sidebar:", error));
  });
  
  function setupSidebarToggle() {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("toggleBtn");
    const spans = document.querySelectorAll("#sidebar span");
    const logo = document.getElementById("logo");
    const toggleIcon = toggleBtn.querySelector("i");
  
    toggleBtn.addEventListener("click", function () {
      sidebar.classList.toggle("w-64");
      spans.forEach((span) => span.classList.toggle("hidden"));
  
      // Perbesar atau perkecil logo saat toggle
      if (sidebar.classList.contains("w-64")) {
        logo.classList.replace("w-8", "w-24");
        toggleIcon.classList.replace("fa-chevron-right", "fa-chevron-left");
        toggleBtn.classList.add("left-64"); // Pindah tombol toggle ke kanan
      } else {
        logo.classList.replace("w-24", "w-8");
        toggleIcon.classList.replace("fa-chevron-left", "fa-chevron-right");
        toggleBtn.classList.remove("left-64"); // Kembali ke posisi awal
      }
    });
  }
  