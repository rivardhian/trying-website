const signUpBtnLink = document.querySelector('.signUpBtn-link');
const signInBtnLink = document.querySelector('.signInBtn-link');
const wrapper = document.querySelector('.wrapper');

signUpBtnLink.addEventListener('click', () => {
	wrapper.classList.toggle('active');
});

signInBtnLink.addEventListener('click', () => {
	wrapper.classList.toggle('active');
});


function validateForm() {
            var emailInput = document.getElementById('email');
            var phoneNumberInput = document.getElementById('phoneNumber');

            var emailValue = emailInput.value;
            var phoneNumberValue = phoneNumberInput.value;

            var checkbox = document.getElementById('checkbox');
            // Periksa apakah alamat email berakhir dengan '@gmail.com'
            if (!emailValue.endsWith('@gmail.com')) {
                alert('Alamat email harus berakhir dengan @gmail.com');
                return false; // Menghentikan pengiriman formulir
            }

            // Periksa apakah nomor HP sesuai dengan pola
            var phonePattern = /^(\+62|62|0)8[1-9][0-9]{6,9}$/;
            if (!phonePattern.test(phoneNumberValue)) {
                alert('Masukkan nomor HP yang sesuai dengan pola');
                return false; // Menghentikan pengiriman formulir
            }

            // Periksa apakah kotak centang telah dicentang
            if (!checkbox.checked) {
                alert('Jika anda menyetujui mohon kotak syarat dan ketentuan dicentang');
                return false; // Menghentikan pengiriman formulir jika kotak centang tidak dicentang
            }

            return true; // Lanjutkan pengiriman formulir
        }
