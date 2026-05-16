<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About — News.io</title>
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
            position: relative;
            overflow: hidden;
        }
        .page-hero::before {
            content: '';
            position: absolute; inset: 0;
            background: radial-gradient(ellipse 60% 80% at 50% 110%, rgba(194,85,42,.35), transparent);
        }
        .page-hero::after {
            content: '';
            position: absolute; inset: 0;
            background-image:
                radial-gradient(circle at 15% 25%, rgba(194,85,42,.08) 0%, transparent 50%),
                radial-gradient(circle at 85% 75%, rgba(194,85,42,.06) 0%, transparent 50%);
        }
        .page-hero-inner { max-width: 640px; margin: 0 auto; position: relative; z-index: 1; }
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
        .page-hero p {
            color: rgba(255,255,255,.6);
            font-size: 1.05rem;
        }

        /* ── MAIN WRAPPER ── */
        .site-body { max-width: var(--max); margin: 0 auto; padding: 4rem 1.5rem 6rem; }

        /* ── MISSION STRIP ── */
        .mission {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 3rem 3.5rem;
            margin-bottom: 4rem;
            position: relative;
            overflow: hidden;
        }
        .mission::before {
            content: '"';
            font-family: var(--font-d);
            font-size: 14rem;
            color: var(--accent);
            opacity: .06;
            position: absolute;
            top: -2rem; left: 1.5rem;
            line-height: 1;
            pointer-events: none;
        }
        .mission-label {
            font-size: .7rem; letter-spacing: .12em; text-transform: uppercase;
            color: var(--accent); font-weight: 500; margin-bottom: 1rem;
        }
        .mission blockquote {
            font-family: var(--font-d);
            font-size: clamp(1.3rem, 2.5vw, 1.8rem);
            font-weight: 600; line-height: 1.4;
            color: var(--text); max-width: 780px;
        }
        .mission blockquote em { color: var(--accent); font-style: italic; }

        /* ── TWO-COL STORY ── */
        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 4rem;
            align-items: start;
        }
        .story-text h2 {
            font-family: var(--font-d);
            font-size: 1.8rem; font-weight: 600;
            line-height: 1.25; margin-bottom: 1.25rem;
        }
        .story-text p {
            font-size: .925rem; color: var(--muted);
            line-height: 1.8; margin-bottom: 1rem;
        }
        .story-text p:last-child { margin-bottom: 0; }

        .story-aside {
            display: flex; flex-direction: column; gap: 1rem;
        }
        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem 1.75rem;
            transition: transform .2s, box-shadow .2s;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,.07);
        }
        .stat-num {
            font-family: var(--font-d);
            font-size: 2.4rem; font-weight: 700;
            color: var(--accent); line-height: 1;
            margin-bottom: .35rem;
        }
        .stat-label { font-size: .82rem; color: var(--muted); }

        /* ── VALUES ── */
        .values-section { margin-bottom: 4rem; }
        .section-head {
            display: flex; align-items: baseline; gap: 1rem;
            margin-bottom: 2rem;
        }
        .section-head h2 {
            font-family: var(--font-d); font-size: 1.6rem; font-weight: 600;
        }
        .section-head .line {
            flex: 1; height: 1px; background: var(--border);
        }
        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
        }
        .value-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.75rem;
            transition: transform .2s, box-shadow .2s;
        }
        .value-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 28px rgba(0,0,0,.07);
        }
        .value-icon {
            width: 44px; height: 44px;
            background: var(--accent-lt);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: var(--accent); font-size: 1.1rem;
            margin-bottom: 1.1rem;
        }
        .value-card h3 {
            font-family: var(--font-d);
            font-size: 1rem; font-weight: 600;
            margin-bottom: .5rem;
        }
        .value-card p { font-size: .85rem; color: var(--muted); line-height: 1.7; }

        /* ── TEAM ── */
        .team-section { margin-bottom: 4rem; }
        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.25rem;
        }
        .team-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            text-align: center;
            transition: transform .2s, box-shadow .2s;
        }
        .team-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 28px rgba(0,0,0,.08);
        }
        .team-avatar {
            width: 100%; aspect-ratio: 1/1;
            background: var(--tag-bg);
            display: flex; align-items: center; justify-content: center;
            font-size: 2.5rem; color: var(--muted);
            position: relative; overflow: hidden;
        }
        .team-avatar-initials {
            font-family: var(--font-d);
            font-size: 2rem; font-weight: 700;
            color: var(--accent); opacity: .5;
        }
        .team-info { padding: 1.1rem 1rem 1.4rem; }
        .team-name {
            font-family: var(--font-d);
            font-size: .975rem; font-weight: 600;
            margin-bottom: .25rem;
        }
        .team-role { font-size: .78rem; color: var(--accent); margin-bottom: .6rem; }
        .team-bio { font-size: .8rem; color: var(--muted); line-height: 1.6; }

        /* ── CONTACT CTA ── */
        .cta-strip {
            background: var(--text);
            border-radius: var(--radius);
            padding: 3rem 3.5rem;
            display: flex; align-items: center; justify-content: space-between; gap: 2rem;
            position: relative; overflow: hidden;
        }
        .cta-strip::before {
            content: '';
            position: absolute; inset: 0;
            background: radial-gradient(ellipse 50% 120% at 100% 50%, rgba(194,85,42,.25), transparent);
        }
        .cta-text { position: relative; }
        .cta-text h2 {
            font-family: var(--font-d);
            font-size: 1.6rem; font-weight: 700;
            color: #fff; margin-bottom: .4rem;
        }
        .cta-text p { font-size: .9rem; color: rgba(255,255,255,.55); }
        .cta-actions { display: flex; gap: .75rem; flex-shrink: 0; position: relative; }
        .btn-primary {
            background: var(--accent); color: #fff;
            padding: .7rem 1.6rem; border-radius: 8px;
            font-size: .875rem; font-weight: 500;
            transition: opacity .2s; white-space: nowrap;
        }
        .btn-primary:hover { opacity: .85; }
        .btn-outline {
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.2);
            color: #fff;
            padding: .7rem 1.6rem; border-radius: 8px;
            font-size: .875rem; font-weight: 500;
            transition: background .2s; white-space: nowrap;
        }
        .btn-outline:hover { background: rgba(255,255,255,.15); }

        /* ── FOOTER ── */
        footer { background: var(--text); color: #C8C6C0; padding: 3.5rem 1.5rem 2rem; margin-top: 6rem; }
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

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { opacity: 0; animation: fadeUp .6s ease forwards; }
        .fade-up:nth-child(1) { animation-delay: .05s; }
        .fade-up:nth-child(2) { animation-delay: .15s; }
        .fade-up:nth-child(3) { animation-delay: .25s; }
        .fade-up:nth-child(4) { animation-delay: .35s; }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .story-grid { grid-template-columns: 1fr; }
            .values-grid { grid-template-columns: 1fr 1fr; }
            .team-grid { grid-template-columns: 1fr 1fr; }
            .cta-strip { flex-direction: column; text-align: center; }
            .cta-actions { justify-content: center; }
            .footer-inner { grid-template-columns: 1fr; gap: 2rem; }
            .mission { padding: 2rem; }
            .cta-strip { padding: 2.5rem 2rem; }
        }
        @media (max-width: 600px) {
            .values-grid { grid-template-columns: 1fr; }
            .team-grid { grid-template-columns: 1fr 1fr; }
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
                <a href="/about" class="active">About</a>
                <a href="/contact">Contact</a>
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
            <span class="page-label">Tentang Kami</span>
            <h1>Media yang Lahir dari Rasa Ingin Tahu</h1>
            <p>News.io hadir untuk menjembatani informasi dan pembaca — dengan bahasa yang jujur, konteks yang lengkap, dan sudut pandang yang segar.</p>
        </div>
    </section>

    <!-- Main -->
    <div class="site-body">

        <!-- Mission -->
        <div class="mission fade-up">
            <p class="mission-label">Misi Kami</p>
            <blockquote>
                Kami percaya bahwa informasi yang baik bukan hanya soal kecepatan —
                melainkan soal <em>kedalaman, kejujuran, dan relevansi</em> bagi kehidupan nyata.
            </blockquote>
        </div>

        <!-- CTA -->
        <div class="cta-strip">
            <div class="cta-text">
                <h2>Ada Pertanyaan atau Ide Liputan?</h2>
                <p>Kami terbuka untuk masukan, koreksi, kolaborasi, dan tips berita dari pembaca.</p>
            </div>
            <div class="cta-actions">
                <a href="/contact" class="btn-primary">Hubungi Kami</a>
                <a href="{{ route('blog') }}" class="btn-outline">Baca Artikel</a>
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

</body>
</html>