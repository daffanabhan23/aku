document.addEventListener('DOMContentLoaded', () => {
    // Elemen DOM
    const cartItemsInlineDiv = document.getElementById('cart-items-inline');
    const totalPriceInlineSpan = document.getElementById('total-price-inline');
    const emptyCartMsgInlineP = document.getElementById('empty-cart-msg-inline');
    const checkoutBtnInlineButton = document.getElementById('checkout-btn-inline');
    const qrCodeContainerInlineDiv = document.getElementById('qr-code-container-inline');

    let cart = JSON.parse(localStorage.getItem('kantinKuLandingPageCartV2')) || {}; // Ganti key localStorage jika perlu
    let originalStocks = {}; 

    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        originalStocks[button.dataset.id] = parseInt(button.dataset.stokAsli);
    });

    function saveCartToLocalStorage() {
        localStorage.setItem('kantinKuLandingPageCartV2', JSON.stringify(cart));
    }

    function updateCartDisplay() {
        if (!cartItemsInlineDiv || !totalPriceInlineSpan || !checkoutBtnInlineButton) return;

        cartItemsInlineDiv.innerHTML = ''; 
        let currentTotal = 0;
        let totalItemsInCart = 0;

        if (Object.keys(cart).length === 0) {
            if (emptyCartMsgInlineP) emptyCartMsgInlineP.style.display = 'block';
        } else {
            if (emptyCartMsgInlineP) emptyCartMsgInlineP.style.display = 'none';
            for (const barangId in cart) {
                const item = cart[barangId];
                currentTotal += item.price * item.quantity;
                totalItemsInCart += item.quantity;

                const itemDiv = document.createElement('div');
                itemDiv.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-2', 'p-2', 'border-bottom');
                itemDiv.innerHTML = `
                    <div class='flex-grow-1'>
                        <small class='fw-medium'>${item.name} (x${item.quantity})</small><br>
                        <small class='text-muted'>Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</small>
                    </div>
                    <button class='btn btn-sm btn-outline-danger remove-from-cart-btn' data-id='${barangId}'>&times;</button>
                `;
                cartItemsInlineDiv.appendChild(itemDiv);
            }
        }

        totalPriceInlineSpan.textContent = `Rp ${currentTotal.toLocaleString('id-ID')}`;
        checkoutBtnInlineButton.disabled = totalItemsInCart === 0;

        if (qrCodeContainerInlineDiv && totalItemsInCart > 0) {
            // Jangan sembunyikan QR jika sudah ditampilkan dan keranjang masih ada isinya
            // kecuali jika keranjang jadi kosong.
        } else if (qrCodeContainerInlineDiv) {
             qrCodeContainerInlineDiv.classList.add('d-none');
        }
        
        updateItemStockAndButtonStates();
        saveCartToLocalStorage();
    }

    function updateItemStockAndButtonStates() {
        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            const barangId = button.dataset.id;
            const stockAsli = originalStocks[barangId] || 0;
            const quantityInCart = cart[barangId] ? cart[barangId].quantity : 0;
            const sisaStokDisplay = stockAsli - quantityInCart;

            const stokDisplaySpan = document.getElementById(`stok-${barangId}`);
            if (stokDisplaySpan) stokDisplaySpan.textContent = sisaStokDisplay;
            button.disabled = sisaStokDisplay <= 0;
        });
    }

    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const id = e.currentTarget.dataset.id;
            const name = e.currentTarget.dataset.name;
            const price = parseFloat(e.currentTarget.dataset.price);
            const stockAsli = originalStocks[id];

            if (!cart[id]) cart[id] = { name: name, price: price, quantity: 0 };

            if (cart[id].quantity < stockAsli) {
                cart[id].quantity++;
            } else {
                alert('Stok untuk item ini tidak mencukupi!');
            }
            updateCartDisplay();
        });
    });

    cartItemsInlineDiv.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-from-cart-btn')) {
            const barangId = e.target.dataset.id;
            if (cart[barangId]) {
                cart[barangId].quantity--;
                if (cart[barangId].quantity <= 0) delete cart[barangId];
            }
            updateCartDisplay();
        }
    });

    if (checkoutBtnInlineButton) {
        checkoutBtnInlineButton.addEventListener('click', () => {
            if (Object.keys(cart).length === 0) {
                // Jika ingin alert saat keranjang kosong, bisa tambahkan di sini,
                // tapi tombol sudah disabled jadi idealnya tidak bisa diklik.
                // alert('Keranjang Anda masih kosong.'); 
                return;
            }

            if (qrCodeContainerInlineDiv) {
                qrCodeContainerInlineDiv.classList.remove('d-none'); // Tampilkan QR Code statis
                // TIDAK ADA ALERT DI SINI LAGI
            }
            
            // Opsi: Kosongkan keranjang setelah "bayar"
            // cart = {}; 
            // updateCartDisplay(); // Jika ingin keranjang dikosongkan dan QR tetap terlihat sampai interaksi berikutnya
        });
    }
    
    document.querySelectorAll('a.nav-link[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const headerOffset = 56;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
                const navbarCollapse = document.getElementById('navbarNavMain');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    new bootstrap.Collapse(navbarCollapse).hide();
                }
            }
        });
    });

    updateCartDisplay();
});