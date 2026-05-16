@php
    $categories = [
        'politik', 'ekonomi', 'teknologi', 'pendidikan',
        'olahraga', 'otomotif', 'hiburan', 'kesehatan',
        'internasional', 'nasional'
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News.io — Laravel Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
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

        /* ── NAV SEARCH ── */
        .nav-search-btn {
            background: none; border: none; cursor: pointer;
            color: var(--muted); font-size: 1rem;
            width: 36px; height: 36px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 50%; transition: background .2s, color .2s;
        }
        .nav-search-btn:hover { background: var(--tag-bg); color: var(--text); }

        /* Search Overlay */
        .search-overlay {
            position: fixed; inset: 0; z-index: 200;
            background: rgba(26,26,24,.55);
            backdrop-filter: blur(4px);
            display: flex; align-items: flex-start; justify-content: center;
            padding-top: 120px;
            opacity: 0; pointer-events: none;
            transition: opacity .25s;
        }
        .search-overlay.open { opacity: 1; pointer-events: all; }
        .search-box {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            width: min(600px, 92vw);
            box-shadow: 0 24px 60px rgba(0,0,0,.18);
            transform: translateY(-12px);
            transition: transform .25s;
        }
        .search-overlay.open .search-box { transform: translateY(0); }
        .search-box-label {
            font-size: .7rem; letter-spacing: .1em; text-transform: uppercase;
            color: var(--muted); margin-bottom: .75rem;
        }
        .search-input-wrap {
            display: flex; align-items: center;
            border: 1.5px solid var(--border); border-radius: 10px;
            overflow: hidden; transition: border-color .2s;
        }
        .search-input-wrap:focus-within { border-color: var(--accent); }
        .search-input-wrap i {
            padding: 0 1rem; color: var(--muted); font-size: .95rem; flex-shrink: 0;
        }
        .search-input-wrap input {
            flex: 1; border: none; outline: none;
            padding: .85rem 0; font-size: 1rem;
            font-family: var(--font-b); background: transparent;
            color: var(--text);
        }
        .search-input-wrap input::placeholder { color: #B0AFA9; }
        .search-submit {
            background: var(--accent); border: none; cursor: pointer;
            color: #fff; padding: 0 1.25rem; height: 48px;
            font-size: .8rem; font-weight: 500; font-family: var(--font-b);
            transition: opacity .2s; white-space: nowrap;
        }
        .search-submit:hover { opacity: .85; }
        .search-hint {
            margin-top: .85rem;
            font-size: .78rem; color: var(--muted);
        }
        .search-hint kbd {
            background: var(--tag-bg); border: 1px solid var(--border);
            border-radius: 4px; padding: .1rem .4rem;
            font-family: monospace; font-size: .75rem;
        }

        /* ── HERO ── */
        .hero {
            background: var(--text);
            padding: 5rem 1.5rem 4.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute; inset: 0;
            background: radial-gradient(ellipse 60% 80% at 50% 110%, rgba(194,85,42,.35), transparent);
        }
        .hero-inner { max-width: 680px; margin: 0 auto; position: relative; }
        .hero-label {
            display: inline-block;
            background: var(--accent-lt); color: var(--accent);
            font-size: .7rem; font-weight: 500; letter-spacing: .1em; text-transform: uppercase;
            padding: .3rem .9rem; border-radius: 20px; margin-bottom: 1.25rem;
        }
        .hero h1 {
            font-family: var(--font-d);
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 700; color: #fff; line-height: 1.2;
            letter-spacing: -.5px; margin-bottom: 1rem;
        }
        .hero p { color: rgba(255,255,255,.6); font-size: 1.05rem; margin-bottom: 2rem; }

        /* ── HERO SEARCH ── */
        .hero-search {
            display: flex; align-items: center;
            background: var(--surface); border-radius: 10px;
            overflow: hidden; max-width: 520px; margin: 0 auto;
            box-shadow: 0 8px 32px rgba(0,0,0,.2);
        }
        .hero-search i {
            padding: 0 1.1rem; color: var(--muted); font-size: .95rem; flex-shrink: 0;
        }
        .hero-search input {
            flex: 1; border: none; outline: none;
            padding: .9rem 0; font-size: .95rem;
            font-family: var(--font-b); background: transparent;
            color: var(--text);
        }
        .hero-search input::placeholder { color: #B0AFA9; }
        .hero-search button {
            background: var(--accent); border: none; cursor: pointer;
            color: #fff; padding: 0 1.4rem; height: 50px;
            font-size: .85rem; font-weight: 500; font-family: var(--font-b);
            transition: opacity .2s; white-space: nowrap;
        }
        .hero-search button:hover { opacity: .85; }

        /* ── LAYOUT ── */
        .site-body { max-width: var(--max); margin: 0 auto; padding: 3.5rem 1.5rem 5rem; }

        /* ── SEARCH RESULTS NOTICE ── */
        .search-notice {
            background: var(--accent-lt);
            border: 1px solid #E8C8BA;
            border-radius: 10px;
            padding: .85rem 1.25rem;
            font-size: .875rem; color: var(--accent);
            margin-bottom: 1.75rem;
            display: flex; align-items: center; gap: .6rem;
        }
        .search-notice a {
            margin-left: auto; font-size: .8rem;
            color: var(--accent); text-decoration: underline;
        }

        /* ── SECTION LABEL ── */
        .section-head {
            display: flex; align-items: baseline; justify-content: space-between;
            margin-bottom: 1.75rem;
        }
        .section-head h2 {
            font-family: var(--font-d); font-size: 1.6rem; font-weight: 600;
        }
        .section-head a { font-size: .8rem; color: var(--accent); }
        .section-head a:hover { text-decoration: underline; }

        /* ── POST GRID ── */
        .post-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 4rem;
        }

        .post-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            display: flex; flex-direction: column;
            transition: transform .2s, box-shadow .2s;
        }
        .post-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 28px rgba(0,0,0,.08);
        }

        .post-thumb {
            aspect-ratio: 16/9;
            overflow: hidden;
            background: var(--tag-bg);
        }
        .post-thumb img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform .35s;
        }
        .post-card:hover .post-thumb img { transform: scale(1.04); }

        .post-body {
            padding: 1.25rem 1.35rem 1.5rem;
            display: flex; flex-direction: column; flex: 1;
        }

        .post-date {
            font-size: .75rem; color: var(--muted);
            margin-bottom: .6rem;
        }

        .post-title {
            font-family: var(--font-d);
            font-size: 1.1rem; font-weight: 600;
            line-height: 1.35; margin-bottom: .65rem;
        }

        .post-excerpt {
            font-size: .875rem; color: var(--muted);
            line-height: 1.65; flex: 1;
            margin-bottom: 1.1rem;
        }

        .read-more {
            display: inline-flex; align-items: center; gap: .35rem;
            font-size: .8rem; font-weight: 500; color: var(--accent);
            transition: gap .2s;
        }
        .read-more:hover { gap: .6rem; }

        /* ── DIVIDER ── */
        .divider { border: none; border-top: 1px solid var(--border); margin: 1rem 0 3rem; }

        /* ── CATEGORIES ── */
        .cat-section { margin-bottom: 4rem; }
        .cat-search-wrap {
            margin-bottom: 1.25rem;
        }
        .cat-search-form {
            display: flex; align-items: center;
            border: 1.5px solid var(--border); border-radius: 10px;
            overflow: hidden; background: var(--surface);
            max-width: 480px;
            transition: border-color .2s, box-shadow .2s;
        }
        .cat-search-form:focus-within {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(194,85,42,.1);
        }
        .cat-search-form i {
            padding: 0 1rem; color: var(--muted); font-size: .9rem; flex-shrink: 0;
        }
        .cat-search-form input {
            flex: 1; border: none; outline: none;
            padding: .75rem 0; font-size: .9rem;
            font-family: var(--font-b); background: transparent; color: var(--text);
        }
        .cat-search-form input::placeholder { color: #B0AFA9; }
        .cat-search-form button {
            background: var(--accent); border: none; cursor: pointer;
            color: #fff; padding: 0 1.2rem; height: 44px;
            font-size: .8rem; font-weight: 500; font-family: var(--font-b);
            transition: opacity .2s;
        }
        .cat-search-form button:hover { opacity: .85; }

        .tags { display: flex; flex-wrap: wrap; gap: .6rem; margin-top: 1.25rem; }
        .tag {
            background: var(--surface);
            border: 1px solid var(--border);
            padding: .45rem 1.1rem; border-radius: 20px;
            font-size: .82rem; color: var(--muted);
            transition: background .2s, color .2s, border-color .2s;
        }
        .tag:hover, .tag-active { background: var(--text); color: #fff; border-color: var(--text); }

        /* ── FOOTER ── */
        footer {
            background: var(--text); color: #C8C6C0;
            padding: 3.5rem 1.5rem 2rem;
        }
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
            font-size: .8rem; color: #C8C6C0;
            transition: background .2s, border-color .2s;
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

        @media (max-width: 720px) {
            .footer-inner { grid-template-columns: 1fr; gap: 2rem; }
            .post-grid { grid-template-columns: 1fr; }
            .nav-links { gap: 1.25rem; }
            .hero-search { flex-wrap: nowrap; }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="nav-inner">
            <a href="/" class="logo">News<span>.</span>io</a>
            <nav class="nav-links">
                <a href="{{ route('home') }}" class="active">Home</a>
                <a href="{{ route('blog') }}">Blog</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('contact') }}">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-dash">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                @endif
                <!-- Tombol Search di Navbar -->
                <button class="nav-search-btn" id="navSearchBtn" aria-label="Buka pencarian">
                    <i class="fas fa-search"></i>
                </button>
            </nav>
        </div>
    </header>

    <!-- Search Overlay (dipicu tombol navbar) -->
    <div class="search-overlay" id="searchOverlay" role="dialog" aria-modal="true" aria-label="Pencarian artikel">
        <div class="search-box">
            <p class="search-box-label">Cari Artikel</p>
            <form action="{{ route('search') }}" method="GET">
                <div class="search-input-wrap">
                    <i class="fas fa-search"></i>
                    <input
                        type="text"
                        name="q"
                        id="overlaySearchInput"
                        placeholder="Ketik kata kunci artikel..."
                        value="{{ request('q') }}"
                        autocomplete="off"
                    >
                    <button type="submit" class="search-submit">Cari</button>
                </div>
            </form>
            <p class="search-hint">Tekan <kbd>Esc</kbd> untuk menutup &nbsp;·&nbsp; <kbd>/</kbd> untuk membuka pencarian</p>
        </div>
    </div>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-inner">
            <span class="hero-label">Selamat Datang di News.io</span>
            <h1>Maknai Hari dengan Bacaan Berkualitas</h1>
            <p>Pusat informasi harian yang merangkum berita terpopuler dan edukatif dalam satu genggaman.</p>

            <!-- Search Bar di Hero -->
            <form action="{{ route('search') }}" method="GET" class="hero-search">
                <i class="fas fa-search"></i>
                <input
                    type="text"
                    name="q"
                    placeholder="Cari artikel, topik, atau kategori..."
                    value="{{ request('q') }}"
                    autocomplete="off"
                >
                <button type="submit">Cari Artikel</button>
            </form>
        </div>
    </section>

    <!-- Main Content -->
    <div class="site-body">

        {{-- Notifikasi hasil pencarian --}}
        @if(request('q'))
        <div class="search-notice">
            <i class="fas fa-search"></i>
            Menampilkan hasil untuk: <strong>"{{ request('q') }}"</strong>
            ({{ $post->count() }} artikel ditemukan)
            <a href="{{ route('home') }}">Hapus pencarian ×</a>
        </div>
        @endif

        <!-- Featured Posts -->
        <div class="section-head">
            <h2>{{ request('q') ? 'Hasil Pencarian' : 'Postingan Unggulan' }}</h2>
            @if(!request('q'))
                <a href="/blog">Lihat Semua →</a>
            @endif
        </div>

        <div class="post-grid">
            @forelse ($post as $posts)
            <article class="post-card">
                <div class="post-thumb">
                    <img src="img/{{ $posts->image }}" alt="{{ $posts->title }}">
                </div>
                <div class="post-body">
                    <p class="post-date">{{ $posts->created_at->format('F j, Y') }}</p>
                    <h3 class="post-title">{{ $posts->title }}</h3>
                    <p class="post-excerpt">{{ Str::limit(strip_tags($posts->description), 110) }}</p>
                    <a href="{{ route('fullpost', $posts->id) }}" class="read-more">
                        Baca Selengkapnya <i class="fas fa-arrow-right" style="font-size:.7rem;"></i>
                    </a>
                </div>
            </article>
            @empty
            <p style="color:var(--muted); font-size:.9rem; grid-column:1/-1;">
                Tidak ada artikel yang cocok dengan pencarian Anda.
            </p>
            @endforelse
        </div>

        <hr class="divider">

        <!-- Categories -->
        <div class="cat-section">
            <div class="section-head">
                <h2>Cari Artikel</h2>
            </div>


            <div class="tags">
                @foreach ($categories as $cat)
                    <a href="{{ route('category', $cat) }}"
                       class="tag {{ request()->segment(2) === $cat ? 'tag-active' : '' }}">
                        {{ ucfirst($cat) }}
                    </a>
                @endforeach
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-inner">
            <div>
                <span class="f-logo">News<span>.</span>io</span>
                <p class="f-desc">Jendela informasi dunia yang merangkum peristiwa penting dan tren terbaru secara mendalam, akurat, dan terpercaya.</p>
                <div class="social">
                    <a href="https://x.com/xaikooraa" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://github.com/" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/siti-fatimah-nur-azzahra-10135b40b/" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
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
                    <li><a href="{{ route('category', 'pendidikan') }}">Pendidikan</a></li>
                    <li><a href="{{ route('category', 'olahraga') }}">Olahraga</a></li>
                    <li><a href="{{ route('category', 'otomotif') }}">Otomotif</a></li>
                    <li><a href="{{ route('category', 'hiburan') }}">Hiburan</a></li>
                    <li><a href="{{ route('category', 'kesehatan') }}">Kesehatan</a></li>
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
        const overlay = document.getElementById('searchOverlay');
        const navBtn  = document.getElementById('navSearchBtn');
        const input   = document.getElementById('overlaySearchInput');

        function openSearch() {
            overlay.classList.add('open');
            setTimeout(() => input.focus(), 50);
        }
        function closeSearch() {
            overlay.classList.remove('open');
        }

        navBtn.addEventListener('click', openSearch);

        // Tutup overlay saat klik di luar search-box
        overlay.addEventListener('click', e => {
            if (!e.target.closest('.search-box')) closeSearch();
        });

        // Keyboard shortcut: "/" untuk buka, Esc untuk tutup
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeSearch();
            if (e.key === '/' && document.activeElement.tagName !== 'INPUT') {
                e.preventDefault();
                openSearch();
            }
        });
    </script>

</body>
</html>