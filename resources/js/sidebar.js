document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("toggleBtn");
    const logo = document.getElementById("logo");
    const toggleIcon = toggleBtn.querySelector("i");

    toggleBtn.addEventListener("click", function () {
        sidebar.classList.toggle("w-64");

        if (sidebar.classList.contains("w-64")) {
            logo.classList.replace("w-8", "w-24");
            toggleIcon.classList.replace("fa-chevron-right", "fa-chevron-left");
            toggleBtn.style.left = "16rem";
        } else {
            logo.classList.replace("w-24", "w-8");
            toggleIcon.classList.replace("fa-chevron-left", "fa-chevron-right");
            toggleBtn.style.left = "4rem";
        }
    });
});
