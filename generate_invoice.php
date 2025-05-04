<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const { jsPDF } = window.jspdf;

    const nama_pelanggan = localStorage.getItem("nama_pelanggan") || "Guest";
    const kode_meja = localStorage.getItem("kode_meja") || "N/A";
    const order = JSON.parse(localStorage.getItem("order")) || [];

    // Tampilkan informasi pelanggan
    document.getElementById("nama_pelanggan").textContent = nama_pelanggan;
    document.getElementById("kode_meja").textContent = kode_meja;

    const tableBody = document.getElementById("invoice-table");
    const totalPriceElement = document.getElementById("total-price");
    let total = 0;

    tableBody.innerHTML = "";
    order.forEach((item) => {
      const row = document.createElement("tr");
      row.innerHTML = `
        <td>${item.name}</td>
        <td>${item.quantity}</td>
        <td>Rp ${item.price.toLocaleString()}</td>
        <td>Rp ${(item.price * item.quantity).toLocaleString()}</td>
      `;
      tableBody.appendChild(row);
      total += item.price * item.quantity;
    });

    totalPriceElement.textContent = `Total: Rp ${total.toLocaleString()}`;

    // Fungsi untuk mengunduh PDF
    document
      .getElementById("download-invoice")
      .addEventListener("click", function () {
        const doc = new jsPDF();

        doc.setFontSize(18);
        doc.text("Invoice - Kedai Kopi Kenangan", 20, 20);

        doc.setFontSize(12);
        doc.text(`Nama Pelanggan: ${nama_pelanggan}`, 20, 30);
        doc.text(`Nomor Meja: ${kode_meja}`, 20, 40);

        let y = 50;
        doc.text(
          "-------------------------------------------------",
          20,
          y
        );
        y += 10;

        order.forEach((item) => {
          doc.text(
            `${item.name} (${item.quantity}x) - Rp ${(
              item.price * item.quantity
            ).toLocaleString()}`,
            20,
            y
          );
          y += 10;
        });

        doc.text(
          "-------------------------------------------------",
          20,
          y
        );
        y += 10;
        doc.text(`Total: Rp ${total.toLocaleString()}`, 20, y);

        doc.save(`Invoice_${nama_pelanggan}.pdf`);
      });
  });
</script>
