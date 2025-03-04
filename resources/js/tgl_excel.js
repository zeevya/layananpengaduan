function filterByDate() {
    let startDate = document.getElementById("startDate").value;
    let endDate = document.getElementById("endDate").value;
    let dateDiffText = document.getElementById("dateDifference");
  
    if (startDate && endDate) {
      let start = new Date(startDate);
      let end = new Date(endDate);
  
      // Menambahkan 1 hari agar tanggal awal ikut dihitung
      let dayDiff = (end - start) / (1000 * 60 * 60 * 24) + 1;
  
      if (dayDiff >= 1) {
        dateDiffText.textContent = (`${dayDiff} hari`);
      } else {
        dateDiffText.textContent = "(Tanggal tidak valid)";
      }
    } else {
      dateDiffText.textContent = "";
    }
  
    // Filter tabel berdasarkan tanggal
    let table = document.getElementById("statusTable");
    let rows = table.getElementsByTagName("tr");
  
    for (let i = 1; i < rows.length; i++) {
      let tds = rows[i].getElementsByTagName("td");
      if (tds.length > 0) {
        let dateText = tds[1].textContent.trim();
        let rowDate = new Date(dateText);
  
        let isWithinRange =
          (!startDate || rowDate >= new Date(startDate)) &&
          (!endDate || rowDate <= new Date(endDate));
  
        rows[i].style.display = isWithinRange ? "" : "none";
      }
    }
  }
  
  function printTable() {
    let printContent = document.getElementById("statusTable").outerHTML;
    let newWindow = window.open("", "", "width=800,height=600");
    newWindow.document.write("<html><head><title>Print Table</title>");
    newWindow.document.write(
      '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">'
    );
    newWindow.document.write("</head><body>");
    newWindow.document.write(printContent);
    newWindow.document.write("</body></html>");
    newWindow.document.close();
    newWindow.print();
  }
  
  function printTable() {
    let table = document.getElementById("statusTable");
    let wb = XLSX.utils.book_new();
    let ws = XLSX.utils.table_to_sheet(table);
  
    // Menambahkan sheet ke workbook
    XLSX.utils.book_append_sheet(wb, ws, "Status Pengaduan");
  
    // Menyimpan file Excel
    XLSX.writeFile(wb, "Status_Pengaduan.xlsx");
  }