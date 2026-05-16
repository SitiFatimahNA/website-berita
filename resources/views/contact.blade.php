<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact — News.io</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:        #F7F6F2;
            --surface:   #FFFFFF;
            --border:    #E5E3DC;
            --text:      #1A1A18;
            --muted:     #6B6B67;
            --accent:    #C2552A;
            --accent-lt: #F5EDE8;
            --accent-dk: #A8421A;
            --tag-bg:    #EDECE8;
            --font-d:    'Playfair Display', Georgia, serif;
            --font-b:    'DM Sans', sans-serif;
            --radius:    12px;
            --max:       1100px;
        }

        body { background: var(--bg); color: var(--text); font-family: var(--font-b); font-weight: 300; line-height: 1.7; }
        a { color: inherit; text-decoration: none; }
        img { display: block; }

        /* ── NAV ── */
        header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky; top: 0; z-index: 100;
        }
        .nav-inner {
            max-width: var(--max); margin: 0 auto; padding: 0 1.5rem;
            height: 64px; display: flex; align-items: center; justify-content: space-between;
        }
        .logo { font-family: var(--font-d); font-size: 1.5rem; font-weight: 700; }
        .logo span { color: var(--accent); }
        .nav-links { display: flex; align-items: center; gap: 2rem; font-size: 0.875rem; }
        .nav-links a { color: var(--muted); transition: color .2s; }
        .nav-links a:hover, .nav-links a.active { color: var(--text); }
        .btn-dash {
            background: var(--text); color: #fff !important;
            padding: .4rem 1rem; border-radius: 6px; font-size: .8rem; font-weight: 500;
        }

        /* ── PAGE HERO ── */
        .page-hero {
            background: var(--text);
            padding: 5rem 1.5rem 4.5rem;
            text-align: center;
            position: relative; overflow: hidden;
        }
        .page-hero::before {
            content: '';
            position: absolute; inset: 0;
            background: radial-gradient(ellipse 60% 80% at 50% 110%, rgba(194,85,42,.35), transparent);
        }
        .page-hero-inner { max-width: 600px; margin: 0 auto; position: relative; z-index: 1; }
        .page-label {
            display: inline-block;
            background: var(--accent-lt); color: var(--accent);
            font-size: .7rem; font-weight: 500; letter-spacing: .1em; text-transform: uppercase;
            padding: .3rem .9rem; border-radius: 20px; margin-bottom: 1.25rem;
        }
        .page-hero h1 {
            font-family: var(--font-d);
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 700; color: #fff; line-height: 1.2;
            letter-spacing: -.5px; margin-bottom: 1rem;
        }
        .page-hero p { color: rgba(255,255,255,.6); font-size: 1.05rem; }

        /* ── LAYOUT ── */
        .site-body { max-width: var(--max); margin: 0 auto; padding: 4rem 1.5rem 6rem; }

        /* ── CONTACT GRID ── */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 2rem;
            align-items: start;
        }

        /* ── FORM CARD ── */
        .form-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2.5rem;
        }
        .form-card-head { margin-bottom: 2rem; }
        .form-card-head h2 {
            font-family: var(--font-d);
            font-size: 1.5rem; font-weight: 600;
            margin-bottom: .4rem;
        }
        .form-card-head p { font-size: .875rem; color: var(--muted); }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .field { margin-bottom: 1.25rem; }
        .field label {
            display: block;
            font-size: .78rem; font-weight: 500;
            letter-spacing: .04em; text-transform: uppercase;
            color: var(--muted); margin-bottom: .5rem;
        }
        .field input,
        .field select,
        .field textarea {
            width: 100%; border: 1.5px solid var(--border);
            border-radius: 8px; outline: none;
            padding: .75rem 1rem;
            font-size: .9rem; font-family: var(--font-b);
            font-weight: 300; color: var(--text);
            background: var(--bg);
            transition: border-color .2s, box-shadow .2s, background .2s;
            appearance: none;
        }
        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: var(--accent);
            background: var(--surface);
            box-shadow: 0 0 0 3px rgba(194,85,42,.1);
        }
        .field input::placeholder,
        .field textarea::placeholder { color: #B5B4AE; }
        .field textarea { resize: vertical; min-height: 130px; }

        /* Select custom arrow */
        .field-select-wrap { position: relative; }
        .field-select-wrap::after {
            content: '\f078';
            font-family: 'Font Awesome 6 Free'; font-weight: 900;
            font-size: .65rem; color: var(--muted);
            position: absolute; right: 1rem; top: 50%; transform: translateY(-50%);
            pointer-events: none;
        }
        .field-select-wrap select { padding-right: 2.5rem; cursor: pointer; }

        /* Checkbox */
        .field-check { display: flex; align-items: flex-start; gap: .65rem; margin-bottom: 1.5rem; }
        .field-check input[type="checkbox"] {
            width: 16px; height: 16px; flex-shrink: 0;
            margin-top: .2rem; accent-color: var(--accent);
            cursor: pointer;
        }
        .field-check label {
            font-size: .82rem; color: var(--muted);
            line-height: 1.5; cursor: pointer;
            text-transform: none; letter-spacing: 0; font-weight: 300;
        }
        .field-check label a { color: var(--accent); text-decoration: underline; }

        /* Submit */
        .btn-submit {
            width: 100%;
            background: var(--accent); color: #fff; border: none; cursor: pointer;
            padding: .9rem 1.5rem; border-radius: 8px;
            font-size: .9rem; font-weight: 500; font-family: var(--font-b);
            display: flex; align-items: center; justify-content: center; gap: .6rem;
            transition: background .2s, transform .15s;
        }
        .btn-submit:hover { background: var(--accent-dk); transform: translateY(-1px); }
        .btn-submit:active { transform: translateY(0); }

        /* ── SUCCESS / ERROR STATE ── */
        .alert {
            border-radius: 8px; padding: .9rem 1.1rem;
            font-size: .875rem; display: flex; align-items: flex-start; gap: .6rem;
            margin-bottom: 1.5rem;
        }
        .alert-success { background: #EBF6EE; border: 1px solid #B8DEC2; color: #276139; }
        .alert-error   { background: var(--accent-lt); border: 1px solid #E8C5B3; color: var(--accent-dk); }
        .alert i { margin-top: .15rem; flex-shrink: 0; }

        /* ── ASIDE ── */
        .aside { display: flex; flex-direction: column; gap: 1.25rem; }

        /* Info card */
        .info-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.75rem;
        }
        .info-card-title {
            font-family: var(--font-d);
            font-size: 1.05rem; font-weight: 600;
            margin-bottom: 1.25rem;
        }
        .info-item {
            display: flex; gap: 1rem;
            align-items: flex-start;
            padding: .85rem 0;
            border-bottom: 1px solid var(--border);
        }
        .info-item:last-child { border-bottom: none; padding-bottom: 0; }
        .info-icon {
            width: 38px; height: 38px; flex-shrink: 0;
            background: var(--accent-lt); border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            color: var(--accent); font-size: .9rem;
        }
        .info-text { flex: 1; }
        .info-text strong {
            display: block; font-size: .8rem; font-weight: 500;
            color: var(--text); margin-bottom: .15rem;
        }
        .info-text span { font-size: .82rem; color: var(--muted); }
        .info-text a { color: var(--accent); }
        .info-text a:hover { text-decoration: underline; }

        /* Social card */
        .social-card {
            background: var(--text);
            border-radius: var(--radius);
            padding: 1.75rem;
            position: relative; overflow: hidden;
        }
        .social-card::before {
            content: '';
            position: absolute; inset: 0;
            background: radial-gradient(ellipse 80% 80% at 100% 0%, rgba(194,85,42,.2), transparent);
        }
        .social-card-title {
            font-family: var(--font-d);
            font-size: 1.05rem; font-weight: 600;
            color: #fff; margin-bottom: .4rem;
            position: relative;
        }
        .social-card p {
            font-size: .82rem; color: rgba(255,255,255,.5);
            margin-bottom: 1.25rem; position: relative;
        }
        .social-links { display: flex; flex-direction: column; gap: .65rem; position: relative; }
        .social-link {
            display: flex; align-items: center; gap: .8rem;
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 8px; padding: .65rem .9rem;
            font-size: .85rem; color: rgba(255,255,255,.8);
            transition: background .2s, border-color .2s;
        }
        .social-link:hover { background: rgba(255,255,255,.13); border-color: rgba(255,255,255,.2); }
        .social-link i { width: 18px; text-align: center; color: rgba(255,255,255,.5); font-size: .9rem; }
        .social-link span { flex: 1; }
        .social-link small { font-size: .75rem; color: rgba(255,255,255,.35); }

        /* FAQ card */
        .faq-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.75rem;
        }
        .faq-card-title {
            font-family: var(--font-d);
            font-size: 1.05rem; font-weight: 600;
            margin-bottom: 1.25rem;
        }
        .faq-item { border-bottom: 1px solid var(--border); }
        .faq-item:last-child { border-bottom: none; }
        .faq-q {
            width: 100%; background: none; border: none; cursor: pointer;
            text-align: left; padding: .9rem 0;
            font-size: .875rem; font-weight: 500; font-family: var(--font-b);
            color: var(--text);
            display: flex; justify-content: space-between; align-items: center; gap: .5rem;
        }
        .faq-q i { color: var(--muted); font-size: .75rem; transition: transform .25s; flex-shrink: 0; }
        .faq-item.open .faq-q i { transform: rotate(180deg); }
        .faq-a {
            font-size: .845rem; color: var(--muted); line-height: 1.7;
            max-height: 0; overflow: hidden;
            transition: max-height .3s ease, padding-bottom .3s ease;
        }
        .faq-item.open .faq-a { max-height: 200px; padding-bottom: 1rem; }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp .55s ease both; }
        .fade-up-1 { animation-delay: .05s; }
        .fade-up-2 { animation-delay: .15s; }
        .fade-up-3 { animation-delay: .25s; }

        /* ── FOOTER ── */
        footer { background: var(--text); color: #C8C6C0; padding: 3.5rem 1.5rem 2rem; margin-top: 0; }
        .footer-inner {
            max-width: var(--max); margin: 0 auto;
            display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 3rem;
        }
        .f-logo {
            font-family: var(--font-d); font-size: 1.4rem;
            font-weight: 700; color: #fff; margin-bottom: .75rem; display: block;
        }
        .f-logo span { color: var(--accent); }
        .f-desc { font-size: .875rem; opacity: .65; line-height: 1.75; margin-bottom: 1.25rem; }
        .social { display: flex; gap: .65rem; }
        .social a {
            width: 34px; height: 34px;
            border: 1px solid rgba(255,255,255,.15); border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: .8rem; color: #C8C6C0; transition: background .2s, border-color .2s;
        }
        .social a:hover { background: rgba(255,255,255,.1); border-color: rgba(255,255,255,.3); }
        .f-col h4 {
            font-size: .7rem; font-weight: 500;
            letter-spacing: .1em; text-transform: uppercase;
            color: #fff; margin-bottom: 1rem;
        }
        .f-links { list-style: none; display: flex; flex-direction: column; gap: .5rem; }
        .f-links a { font-size: .875rem; opacity: .6; transition: opacity .2s; }
        .f-links a:hover { opacity: 1; }
        .f-bottom {
            max-width: var(--max); margin: 2rem auto 0;
            padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,.08);
            font-size: .78rem; opacity: .4;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .contact-grid { grid-template-columns: 1fr; }
            .aside { order: -1; }
            .footer-inner { grid-template-columns: 1fr; gap: 2rem; }
        }
        @media (max-width: 600px) {
            .form-row { grid-template-columns: 1fr; }
            .form-card { padding: 1.75rem; }
            .nav-links { gap: 1.25rem; }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="nav-inner">
            <a href="/" class="logo">News<span>.</span>io</a>
            <nav class="nav-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('blog') }}">Blog</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('contact') }}" class="active">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-dash">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-inner">
            <span class="page-label">Hubungi Kami</span>
            <h1>Kami Senang Mendengar dari Anda</h1>
            <p>Pertanyaan, saran, koreksi, atau tips berita — semuanya kami sambut dengan tangan terbuka.</p>
        </div>
    </section>

    <!-- Main -->
    <div class="site-body">
        <div class="contact-grid">

            <!-- FORM -->
            <div class="form-card fade-up fade-up-1">
                <div class="form-card-head">
                    <h2>Kirim Pesan</h2>
                    <p>Isi formulir di bawah dan tim kami akan membalas dalam 1–2 hari kerja.</p>
                </div>

                {{-- Alert sukses --}}
                @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                {{-- Alert error --}}
                @if($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-circle-exclamation"></i>
                    <span>Mohon periksa kembali isian formulir Anda.</span>
                </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" novalidate>
                    @csrf

                    <div class="form-row">
                        <div class="field">
                            <label for="nama">Nama Lengkap</label>
                            <input
                                type="text" id="nama" name="nama"
                                placeholder="Budi Santoso"
                                value="{{ old('nama') }}"
                                required
                            >
                            @error('nama')
                                <small style="color:var(--accent);font-size:.78rem;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="email">Alamat Email</label>
                            <input
                                type="email" id="email" name="email"
                                placeholder="budi@email.com"
                                value="{{ old('email') }}"
                                required
                            >
                            @error('email')
                                <small style="color:var(--accent);font-size:.78rem;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label for="subjek">Subjek</label>
                        <div class="field-select-wrap">
                            <select id="subjek" name="subjek" required>
                                <option value="" disabled {{ old('subjek') ? '' : 'selected' }}>Pilih topik pesan…</option>
                                <option value="pertanyaan_umum"   {{ old('subjek') == 'pertanyaan_umum'   ? 'selected' : '' }}>Pertanyaan Umum</option>
                                <option value="tips_berita"       {{ old('subjek') == 'tips_berita'       ? 'selected' : '' }}>Tips / Informasi Berita</option>
                                <option value="koreksi"           {{ old('subjek') == 'koreksi'           ? 'selected' : '' }}>Koreksi Artikel</option>
                                <option value="kerjasama"         {{ old('subjek') == 'kerjasama'         ? 'selected' : '' }}>Kerja Sama & Iklan</option>
                                <option value="saran"             {{ old('subjek') == 'saran'             ? 'selected' : '' }}>Saran & Masukan</option>
                                <option value="lainnya"           {{ old('subjek') == 'lainnya'           ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                        @error('subjek')
                            <small style="color:var(--accent);font-size:.78rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="pesan">Pesan</label>
                        <textarea
                            id="pesan" name="pesan"
                            placeholder="Tulis pesan Anda di sini…"
                            required
                        >{{ old('pesan') }}</textarea>
                        @error('pesan')
                            <small style="color:var(--accent);font-size:.78rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="field-check">
                        <input type="checkbox" id="setuju" name="setuju" value="1" required {{ old('setuju') ? 'checked' : '' }}>
                        <label for="setuju">
                            Saya menyetujui <a href="/privacy">kebijakan privasi</a> News.io dan bersedia
                            dihubungi melalui email yang tercantum di atas.
                        </label>
                    </div>
                    @error('setuju')
                        <small style="color:var(--accent);font-size:.78rem;display:block;margin-bottom:.75rem;">{{ $message }}</small>
                    @enderror

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- ASIDE -->
            <div class="aside">

                <!-- Info Kontak -->
                <div class="info-card fade-up fade-up-2">
                    <p class="info-card-title">Informasi Kontak</p>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="info-text">
                            <strong>Email Redaksi</strong>
                            <span><a href="mailto:sitiazzahrasmp@gmail.com">sitiazzahrasmp@gmail.com</a></span>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-clock"></i></div>
                        <div class="info-text">
                            <strong>Jam Operasional</strong>
                            <span>Senin – Jumat, 08.00 – 17.00 WIB</span>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-reply"></i></div>
                        <div class="info-text">
                            <strong>Waktu Respons</strong>
                            <span>1–2 hari kerja untuk semua pertanyaan</span>
                        </div>
                    </div>
                </div>

                <!-- FAQ -->
                <div class="faq-card fade-up fade-up-3">
                    <p class="faq-card-title">Pertanyaan Umum</p>

                    <div class="faq-item">
                        <button class="faq-q">
                            Bagaimana cara mengirim tips berita?
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-a">
                            Pilih "Tips / Informasi Berita" pada formulir di samping, lalu ceritakan
                            temuan Anda secara singkat. Tim redaksi akan menindaklanjuti jika informasi
                            relevan dan dapat diverifikasi.
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-q">
                            Bagaimana meminta koreksi artikel?
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-a">
                            Pilih subjek "Koreksi Artikel" dan sertakan judul artikel, bagian yang
                            salah, serta sumber yang mendukung koreksi. Kami berkomitmen memproses
                            koreksi dalam 24 jam kerja.
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-q">
                            Apakah News.io menerima kontributor tulisan?
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-a">
                            Ya! Kami terbuka untuk penulis tamu dan kontributor tetap. Kirim email
                            ke redaksi@newsio.id dengan subjek "Kontributor" beserta portofolio
                            dan topik yang ingin Anda liput.
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-q">
                            Bagaimana cara beriklan di News.io?
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-a">
                            Hubungi kami melalui email partner@newsio.id atau pilih subjek
                            "Kerja Sama & Iklan" di formulir. Tim kami akan mengirimkan
                            media kit dan paket iklan yang tersedia.
                        </div>
                    </div>
                </div>

            </div><!-- /aside -->
        </div><!-- /contact-grid -->
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-inner">
            <div>
                <span class="f-logo">News<span>.</span>io</span>
                <p class="f-desc">Jendela informasi dunia yang merangkum peristiwa penting dan tren terbaru secara mendalam, akurat, dan terpercaya.</p>
                <div class="social">
                    <a href="https://twitter.com/newsio" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://github.com/newsio" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="https://linkedin.com/company/newsio" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="f-col">
                <h4>Navigasi</h4>
                <ul class="f-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
            <div class="f-col">
                <h4>Kategori</h4>
                <ul class="f-links" style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 8px 30px; list-style: none; padding: 0;">
                    <li><a href="{{ route('category', 'politik') }}">Politik</a></li>
                    <li><a href="{{ route('category', 'ekonomi') }}">Ekonomi</a></li>
                    <li><a href="{{ route('category', 'teknologi') }}">Teknologi</a></li>
                    <li><a href="{{ route('category', 'kesehatan') }}">Kesehatan</a></li>
                    <li><a href="{{ route('category', 'pendidikan') }}">Pendidikan</a></li>
                    <li><a href="{{ route('category', 'olahraga') }}">Olahraga</a></li>
                    <li><a href="{{ route('category', 'otomotif') }}">Otomotif</a></li>
                    <li><a href="{{ route('category', 'hiburan') }}">Hiburan</a></li>
                    <li><a href="{{ route('category', 'internasional') }}">Internasional</a></li>
                    <li><a href="{{ route('category', 'nasional') }}">Nasional</a></li>
                </ul>
            </div>
        </div>
        <div class="f-bottom">
            <p>&copy; 2026 News.io — All rights reserved. Built with Laravel.</p>
        </div>
    </footer>

    <script>
        // FAQ accordion
        document.querySelectorAll('.faq-q').forEach(btn => {
            btn.addEventListener('click', () => {
                const item = btn.closest('.faq-item');
                const isOpen = item.classList.contains('open');
                document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
                if (!isOpen) item.classList.add('open');
            });
        });
    </script>

</body>
</html>