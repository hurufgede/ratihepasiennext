<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Register</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            900: '#064e3b',
                            accent: '#0d9488',
                            secondary: '#0284c7'
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans antialiased text-slate-700 bg-slate-50 min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-8">

    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden grid grid-cols-1 lg:grid-cols-12 min-h-[640px]">
        
        <div class="lg:col-span-5 bg-gradient-to-br from-slate-900 via-slate-800 to-brand-900 text-white p-8 lg:p-12 flex flex-col justify-between relative overflow-hidden hidden lg:flex">
            <div class="absolute -top-24 -left-24 w-60 h-60 bg-brand-500/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-24 w-60 h-60 bg-teal-500/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-8">
                    <span class="text-xl font-bold tracking-tight text-white">Ratih ePASIEN</span>
                </div>

                <div class="space-y-4">
                    <h1 class="text-3xl font-bold text-white leading-tight">Akses Rekam Medis & Janji Temu Mudah.</h1>
                    <p class="text-sm text-slate-300 font-normal leading-relaxed">
                        Kelola riwayat kesehatan Anda, verifikasi kepesertaan BPJS, serta terhubung dengan dokter ahli secara praktis dalam satu portal.
                    </p>
                </div>
            </div>

            <div class="relative z-10 pt-8 border-t border-white/10 space-y-3">
                <div class="flex items-center gap-3 text-xs text-slate-300">
                    <i class="ph-bold ph-shield-check text-brand-400 text-lg"></i>
                    <span>Terkoneksi Aman dengan SIMRS & Dukcapil</span>
                </div>
                <div class="flex items-center gap-3 text-xs text-slate-300">
                    <i class="ph-bold ph-fingerprint text-brand-400 text-lg"></i>
                    <span>Dukungan Biometrik & OTP WhatsApp</span>
                </div>
            </div>
        </div>

        <div class="lg:col-span-7 p-6 sm:p-10 lg:p-12 flex flex-col justify-center bg-white">
            
            <div class="flex items-center gap-3 mb-6 lg:hidden">
                <span class="text-lg font-bold text-slate-900">Ratih ePASIEN</span>
            </div>

            <div class="mb-8">
                <h2 id="header-brand-text" class="text-2xl font-bold text-slate-900 tracking-tight mb-2">Selamat Datang</h2>
                <p class="text-xs sm:text-sm text-slate-500">Silakan pilih metode masuk atau daftarkan akun baru Anda.</p>

                <div id="tab-switcher-wrapper" class="relative mt-6 p-1 bg-slate-100/80 rounded-xl flex items-center border border-slate-200/60">
                    <div id="tab-pill" class="absolute top-1 bottom-1 left-1 w-[calc(50%-4px)] bg-white rounded-lg shadow-sm border border-slate-200/60 transition-all duration-300 ease-out"></div>
                    
                    <button type="button" onclick="switchTab('login')" class="relative z-10 w-1/2 py-2 text-xs font-bold text-slate-900 transition-colors text-center">
                        Masuk Akun
                    </button>
                    <button id="btn-tab-register" type="button" onclick="switchTab('register')" class="relative z-10 w-1/2 py-2 text-xs font-semibold text-slate-500 transition-colors text-center">
                        Daftar Pasien Baru
                    </button>
                </div>
            </div>

            <div id="login-panel" class="space-y-5">
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Email / Nomor NIK</label>
                        <div class="relative">
                            <i class="ph-bold ph-user text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 text-lg"></i>
                            <input type="text" id="login-identifier" name="login" required placeholder="Contoh: user@email.com atau 3171..." 
                                class="w-full pl-10 pr-4 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-600 focus:bg-white focus:ring-2 focus:ring-brand-600/10 transition">
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Kata Sandi</label>
                            <button type="button" onclick="triggerForgotPassword()" class="text-xs text-brand-600 font-semibold hover:underline">Lupa Sandi?</button>
                        </div>
                        <div class="relative">
                            <i class="ph-bold ph-lock-key text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 text-lg"></i>
                            <input type="password" id="login-password" name="password" required placeholder="••••••••" 
                                class="w-full pl-10 pr-10 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-600 focus:bg-white focus:ring-2 focus:ring-brand-600/10 transition">
                            <button type="button" onclick="togglePasswordVisibility('login-password', this)" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                <i class="ph ph-eye text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full py-3 px-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-brand-600/20 transition duration-200 flex items-center justify-center gap-2">
                            <span>Masuk ke Portal</span>
                            <i class="ph-bold ph-arrow-right text-base"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div id="register-panel" class="space-y-4 hidden">
                <form action="{{ route('register.process') }}" method="POST" class="space-y-3.5">
                    @csrf
                    
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Nomor Induk Kependudukan (NIK)</label>
                        <div class="relative flex items-center">
                            <i class="ph-bold ph-identification-card text-slate-400 absolute left-3.5 text-lg"></i>
                            <input type="text" id="reg-nik" name="nik" maxlength="16" oninput="validateNIKFormat()" required placeholder="16 Digit NIK Sesuai KTP" value="{{ old('nik') }}"
                                class="w-full pl-10 pr-24 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-600 focus:bg-white focus:ring-2 focus:ring-brand-600/10 transition">
                            
                            <div id="nik-loading" class="absolute right-3 hidden">
                                <i class="ph-bold ph-spinner animate-spin text-brand-600 text-lg"></i>
                            </div>
                        </div>
                        <span id="nik-status" class="text-[11px] text-emerald-600 font-medium hidden mt-1 flex items-center gap-1">
                            <i class="ph-bold ph-check-circle"></i> Data NIK terverifikasi secara otomatis
                        </span>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Nama Lengkap Pasien</label>
                        <div class="relative">
                            <i class="ph-bold ph-user-circle text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 text-lg"></i>
                            <input type="text" id="reg-name" name="name" required placeholder="Sesuai Kartu Identitas" value="{{ old('name') }}"
                                class="w-full pl-10 pr-4 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-600 focus:bg-white focus:ring-2 focus:ring-brand-600/10 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Nomor WhatsApp Aktif</label>
                        <div class="relative flex items-center">
                            <i class="ph-bold ph-whatsapp-logo text-slate-400 absolute left-3.5 text-lg"></i>
                            <input type="tel" id="reg-whatsapp" name="whatsapp" required placeholder="08xxxxxxxxxx" value="{{ old('whatsapp') }}"
                                class="w-full pl-10 pr-24 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-600 focus:bg-white focus:ring-2 focus:ring-brand-600/10 transition">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Email</label>
                            <input type="email" id="reg-email" name="email" required placeholder="nama@email.com" value="{{ old('email') }}"
                                class="w-full px-3.5 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-600 focus:bg-white focus:ring-2 focus:ring-brand-600/10 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Kata Sandi</label>
                            <div class="relative">
                                <input type="password" id="reg-password" name="password" onkeyup="checkPasswordStrength()" required placeholder="••••••••"
                                    class="w-full pl-3.5 pr-8 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-600 focus:bg-white focus:ring-2 focus:ring-brand-600/10 transition">
                                <button type="button" onclick="togglePasswordVisibility('reg-password', this)" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                    <i class="ph ph-eye text-base"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <div class="flex h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div id="strength-bar-1" class="w-1/3 h-full bg-slate-200 transition-colors"></div>
                            <div id="strength-bar-2" class="w-1/3 h-full bg-slate-200 transition-colors border-l border-white"></div>
                            <div id="strength-bar-3" class="w-1/3 h-full bg-slate-200 transition-colors border-l border-white"></div>
                        </div>
                        <div class="flex justify-between items-center text-[11px] text-slate-400">
                            <span>Kekuatan Kata Sandi:</span>
                            <span id="strength-label" class="font-medium text-slate-500">Belum Ada Input</span>
                        </div>
                    </div>

                    <div class="pt-1">
                        <button type="submit" class="w-full py-3 px-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-brand-600/20 transition duration-200 flex items-center justify-center gap-2">
                            <span>Selesaikan Pendaftaran</span>
                            <i class="ph-bold ph-check text-base"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="toast-notif" class="fixed bottom-6 right-6 z-[120] transform translate-y-10 opacity-0 pointer-events-none transition-all duration-300 p-4 rounded-xl bg-slate-900 text-white text-xs font-medium flex items-center gap-3 shadow-xl border border-slate-800 max-w-sm">
        <div id="toast-icon-container" class="w-7 h-7 rounded-lg bg-white/10 text-brand-400 flex items-center justify-center text-base shrink-0">
            <i class="ph-bold ph-bell"></i>
        </div>
        <div class="text-left flex-1">
            <span class="block text-[9px] text-slate-400 uppercase font-bold tracking-wider leading-none mb-1">Pemberitahuan Sistem</span>
            <span id="toast-text" class="text-slate-200">Memproses...</span>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            const pill = document.getElementById('tab-pill');
            const loginPanel = document.getElementById('login-panel');
            const registerPanel = document.getElementById('register-panel');
            const regTabBtn = document.getElementById('btn-tab-register');
            const loginTabBtn = regTabBtn.previousElementSibling;

            if (tab === 'login') {
                pill.style.left = '4px';
                loginPanel.classList.remove('hidden');
                registerPanel.classList.add('hidden');

                loginTabBtn.classList.add('text-slate-900', 'font-bold');
                loginTabBtn.classList.remove('text-slate-500', 'font-semibold');
                regTabBtn.classList.remove('text-slate-900', 'font-bold');
                regTabBtn.classList.add('text-slate-500', 'font-semibold');
            } else {
                pill.style.left = 'calc(50% - 0px)';
                loginPanel.classList.add('hidden');
                registerPanel.classList.remove('hidden');

                regTabBtn.classList.add('text-slate-900', 'font-bold');
                regTabBtn.classList.remove('text-slate-500', 'font-semibold');
                loginTabBtn.classList.remove('text-slate-900', 'font-bold');
                loginTabBtn.classList.add('text-slate-500', 'font-semibold');
            }
            showToast("Beralih ke form " + (tab === 'login' ? "Masuk" : "Registrasi"));
        }

        function showToast(message, variant = 'info') {
            const toast = document.getElementById('toast-notif');
            const text = document.getElementById('toast-text');
            const iconWrapper = document.getElementById('toast-icon-container');

            text.innerText = message;

            if (variant === 'success') {
                iconWrapper.className = "w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-base shrink-0";
                iconWrapper.innerHTML = `<i class="ph-bold ph-check-circle"></i>`;
            } else if (variant === 'error') {
                iconWrapper.className = "w-7 h-7 rounded-lg bg-rose-500/20 text-rose-400 flex items-center justify-center text-base shrink-0";
                iconWrapper.innerHTML = `<i class="ph-bold ph-warning-circle"></i>`;
            } else {
                iconWrapper.className = "w-7 h-7 rounded-lg bg-sky-500/20 text-sky-400 flex items-center justify-center text-base shrink-0";
                iconWrapper.innerHTML = `<i class="ph-bold ph-info"></i>`;
            }

            toast.classList.remove('translate-y-10', 'opacity-0', 'pointer-events-none');
            setTimeout(() => {
                toast.classList.add('translate-y-10', 'opacity-0', 'pointer-events-none');
            }, 3500);
        }

        function togglePasswordVisibility(fieldId, btn) {
            const field = document.getElementById(fieldId);
            const icon = btn.querySelector('i');

            if (field.type === 'password') {
                field.type = 'text';
                icon.className = "ph ph-eye-slash text-base text-brand-600";
            } else {
                field.type = 'password';
                icon.className = "ph ph-eye text-base text-slate-400";
            }
        }

        function checkPasswordStrength() {
            const pw = document.getElementById('reg-password').value;
            const label = document.getElementById('strength-label');
            const bar1 = document.getElementById('strength-bar-1');
            const bar2 = document.getElementById('strength-bar-2');
            const bar3 = document.getElementById('strength-bar-3');

            bar1.className = "w-1/3 h-full bg-slate-200 transition-colors";
            bar2.className = "w-1/3 h-full bg-slate-200 transition-colors border-l border-white";
            bar3.className = "w-1/3 h-full bg-slate-200 transition-colors border-l border-white";

            if (pw.length === 0) {
                label.innerText = "Belum Ada Input";
                label.className = "font-medium text-slate-400";
                return;
            }

            let score = 0;
            if (pw.length >= 8) score++;
            if (/[A-Z]/.test(pw) && /[0-9]/.test(pw)) score++;
            if (/[^A-Za-z0-9]/.test(pw)) score++;

            if (score === 1) {
                label.innerText = "Lemah";
                label.className = "text-rose-500 font-semibold";
                bar1.classList.add('!bg-rose-500');
            } else if (score === 2) {
                label.innerText = "Sedang";
                label.className = "text-amber-500 font-semibold";
                bar1.classList.add('!bg-amber-500');
                bar2.classList.add('!bg-amber-500');
            } else if (score === 3) {
                label.innerText = "Sangat Kuat";
                label.className = "text-emerald-600 font-semibold";
                bar1.classList.add('!bg-emerald-500');
                bar2.classList.add('!bg-emerald-500');
                bar3.classList.add('!bg-emerald-500');
            }
        }

        function validateNIKFormat() {
            const input = document.getElementById('reg-nik');
            input.value = input.value.replace(/\D/g, '');

            if (input.value.length < 16) {
                document.getElementById('nik-status').classList.add('hidden');
            }
        }

    </script>
</body>

</html>