document.addEventListener('DOMContentLoaded', () => {
    const applyBtn = document.getElementById('apply-voucher');
    const codeInput = document.getElementById('voucher-code');
    const totalEl = document.getElementById('checkout-total');
    const discountEl = document.getElementById('discount-amount');
    const msgEl = document.getElementById('voucher-msg');
    const errorEl = document.getElementById('voucher-error');

    if (!applyBtn) return;

    applyBtn.addEventListener('click', async () => {
        const code = codeInput.value.trim();
        if (!code) {
            alert('Vui lòng nhập mã giảm giá!');
            return;
        }

        try {
            console.log('🎫 Gửi yêu cầu check voucher:', code);
            const res = await fetch(`${BASE_URL}checkout/validateVoucher?code=${encodeURIComponent(code)}&ajax=1`);
            const data = await res.json();
            console.log('🎫 Voucher check response:', data);

            if (data.valid) {
                msgEl.classList.remove('d-none');
                errorEl.classList.add('d-none');
                discountEl.textContent = data.discount_formatted;
                totalEl.textContent = data.new_total_formatted;
            } else {
                msgEl.classList.add('d-none');
                errorEl.classList.remove('d-none');
            }
        } catch (err) {
            console.error('❌ Voucher fetch error:', err);
        }
    });
});
