// ============================================================
// TokoKita - Main JavaScript
// ============================================================

document.addEventListener("DOMContentLoaded", () => {
  updateCartBadge();

  // Qty control on detail page
  document.getElementById("btnMinus")?.addEventListener("click", () => {
    const q = document.getElementById("qtyInput");
    if (q.value > 1) q.value--;
  });
  document.getElementById("btnPlus")?.addEventListener("click", () => {
    document.getElementById("qtyInput").value++;
  });
});

// Format Rupiah
function formatRupiah(num) {
  return "Rp " + parseInt(num).toLocaleString("id-ID");
}

// Cart badge (purely visual for guest; PHP handles real count for logged-in)
function updateCartBadge() {
  // server-side badge updated in navbar.php for logged-in users
}

// Toast notification
function showToast(message, type = "success") {
  const bg = type === "success" ? "#10b981" : "#ef4444";
  const toast = document.createElement("div");
  toast.style.cssText = `position:fixed;bottom:1.5rem;right:1.5rem;z-index:9999;
    background:${bg};color:#fff;padding:.75rem 1.25rem;border-radius:.75rem;
    box-shadow:0 4px 12px rgba(0,0,0,.2);font-family:inherit;font-size:.9rem;
    max-width:320px;transition:opacity .3s;`;
  toast.textContent = message;
  document.body.appendChild(toast);
  setTimeout(() => {
    toast.style.opacity = "0";
    setTimeout(() => toast.remove(), 300);
  }, 2500);
}
