// ============================================================
// TokoKita - Main JavaScript
// ============================================================

document.addEventListener("DOMContentLoaded", () => {
  // ---- Cart Item Counter (from localStorage) ----
  updateCartBadge();

  // ---- Add to Cart ----
  document.querySelectorAll(".btn-add-cart").forEach((btn) => {
    btn.addEventListener("click", function () {
      const id = this.dataset.id;
      const nama = this.dataset.nama;
      const harga = parseInt(this.dataset.harga);
      addToCart(id, nama, harga);
    });
  });

  // ---- Qty Control (Detail Page) ----
  const qtyInput = document.getElementById("qtyInput");
  document.getElementById("btnMinus")?.addEventListener("click", () => {
    if (qtyInput.value > 1) qtyInput.value--;
  });
  document.getElementById("btnPlus")?.addEventListener("click", () => {
    qtyInput.value++;
  });

  // ---- Search Filter ----
  const searchInput = document.getElementById("searchProduk");
  searchInput?.addEventListener("input", function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll(".product-card-wrapper").forEach((card) => {
      const nama = card
        .querySelector(".product-name")
        ?.textContent.toLowerCase();
      card.style.display = nama?.includes(q) ? "" : "none";
    });
  });
});

// ---- Cart Functions ----
function getCart() {
  return JSON.parse(localStorage.getItem("tokokita_cart") || "[]");
}

function addToCart(id, nama, harga) {
  let cart = getCart();
  const idx = cart.findIndex((i) => i.id === id);
  if (idx > -1) {
    cart[idx].qty++;
  } else {
    cart.push({ id, nama, harga, qty: 1 });
  }
  localStorage.setItem("tokokita_cart", JSON.stringify(cart));
  updateCartBadge();
  showToast(`✅ "${nama}" ditambahkan ke keranjang!`);
}

function removeFromCart(id) {
  let cart = getCart().filter((i) => i.id !== id);
  localStorage.setItem("tokokita_cart", JSON.stringify(cart));
  updateCartBadge();
  renderCartTable();
}

function updateQty(id, qty) {
  let cart = getCart();
  const idx = cart.findIndex((i) => i.id === id);
  if (idx > -1) cart[idx].qty = parseInt(qty);
  localStorage.setItem("tokokita_cart", JSON.stringify(cart));
  renderCartTable();
}

function updateCartBadge() {
  const cart = getCart();
  const total = cart.reduce((sum, i) => sum + i.qty, 0);
  document.querySelectorAll(".cart-badge").forEach((el) => {
    el.textContent = total;
    el.style.display = total > 0 ? "flex" : "none";
  });
}

function renderCartTable() {
  const cart = getCart();
  const tbody = document.getElementById("cartBody");
  const summary = document.getElementById("cartSummary");
  if (!tbody) return;

  if (cart.length === 0) {
    tbody.innerHTML = `<tr><td colspan="5" class="text-center py-5 text-muted">Keranjang kosong. <a href="produk.html">Belanja sekarang!</a></td></tr>`;
  } else {
    tbody.innerHTML = cart
      .map(
        (item, i) => `
      <tr>
        <td>${i + 1}</td>
        <td>${item.nama}</td>
        <td>
          <input type="number" class="form-control form-control-sm" style="width:70px"
            value="${item.qty}" min="1" onchange="updateQty('${item.id}', this.value)">
        </td>
        <td>${formatRupiah(item.harga)}</td>
        <td>${formatRupiah(item.harga * item.qty)}</td>
        <td><button class="btn btn-sm btn-danger" onclick="removeFromCart('${item.id}')">🗑</button></td>
      </tr>
    `,
      )
      .join("");
  }

  const total = cart.reduce((sum, i) => sum + i.harga * i.qty, 0);
  if (summary) {
    summary.innerHTML = `
      <div class="d-flex justify-content-between"><span>Subtotal</span><strong>${formatRupiah(total)}</strong></div>
      <div class="d-flex justify-content-between"><span>Ongkir</span><strong>Rp 15.000</strong></div>
      <div class="d-flex justify-content-between total-row"><span>Total</span><strong class="text-primary">${formatRupiah(total + 15000)}</strong></div>
    `;
  }
  updateCartBadge();
}

// ---- Toast Notification ----
function showToast(message) {
  const toast = document.createElement("div");
  toast.className =
    "position-fixed bottom-0 end-0 m-3 p-3 rounded shadow bg-dark text-white";
  toast.style.cssText = "z-index:9999; font-size:.9rem; max-width:320px;";
  toast.textContent = message;
  document.body.appendChild(toast);
  setTimeout(() => toast.remove(), 2500);
}

// ---- Format Rupiah ----
function formatRupiah(num) {
  return "Rp " + parseInt(num).toLocaleString("id-ID");
}

// ---- Form Validation ----
function validateForm(formId) {
  const form = document.getElementById(formId);
  if (!form) return true;
  let valid = true;
  form.querySelectorAll("[required]").forEach((input) => {
    if (!input.value.trim()) {
      input.classList.add("is-invalid");
      valid = false;
    } else {
      input.classList.remove("is-invalid");
    }
  });
  return valid;
}
