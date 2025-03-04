function filterTable() {
    let searchInput = document.getElementById("searchInput").value.toLowerCase();
    let statusFilter = document.getElementById("statusFilter").value;
    let table = document.getElementById("statusTable");
    let rows = table.getElementsByTagName("tr");
  
    for (let i = 1; i < rows.length; i++) {
      let tds = rows[i].getElementsByTagName("td");
      if (tds.length > 0) {
        let status = tds[11].textContent.trim(); // Kolom status
        let rowText = rows[i].textContent.toLowerCase(); // Seluruh teks dalam baris
  
        let matchSearch = rowText.includes(searchInput);
        let matchStatus = statusFilter === "" || status === statusFilter;
  
        if (matchSearch && matchStatus) {
          rows[i].style.display = "";
        } else {
          rows[i].style.display = "none";
        }
      }
    }
  }