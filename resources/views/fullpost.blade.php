<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} — News.io</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --clr-bg: #F7F6F2;
            --clr-surface: #FFFFFF;
            --clr-border: #E5E3DC;
            --clr-text: #1A1A18;
            --clr-muted: #6B6B67;
            --clr-accent: #C2552A;
            --clr-accent-light: #F5EDE8;
            --clr-tag-bg: #EDECE8;
            --font-display: 'Playfair Display', Georgia, serif;
            --font-body: 'DM Sans', sans-serif;
            --radius: 10px;
            --shadow: 0 2px 20px rgba(0,0,0,0.06);
        }

        body {
            background: var(--clr-bg);
            color: var(--clr-text);
            font-family: var(--font-body);
            font-weight: 300;
            line-height: 1.75;
        }

        a { color: inherit; text-decoration: none; }

        /* ── HEADER ── */
        header {
            background: var(--clr-surface);
            border-bottom: 1px solid var(--clr-border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 1.5rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            color: var(--clr-text);
        }

        .logo span { color: var(--clr-accent); }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
            font-size: 0.875rem;
            font-weight: 400;
        }

        .nav-links a {
            color: var(--clr-muted);
            transition: color 0.2s;
        }

        .nav-links a:hover,
        .nav-links a.active { color: var(--clr-text); }

        .btn-dashboard {
            background: var(--clr-text);
            color: #fff !important;
            padding: 0.45rem 1.1rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* ── BREADCRUMB ── */
        .breadcrumb {
            max-width: 780px;
            margin: 2rem auto 0;
            padding: 0 1.5rem;
            font-size: 0.8rem;
            color: var(--clr-muted);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .breadcrumb a { color: var(--clr-muted); transition: color 0.2s; }
        .breadcrumb a:hover { color: var(--clr-text); }
        .breadcrumb .sep { opacity: 0.4; }

        /* ── ARTICLE ── */
        .article-wrap {
            max-width: 780px;
            margin: 1.5rem auto 4rem;
            padding: 0 1.5rem;
        }

        .article-header { margin-bottom: 2rem; }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-bottom: 1rem;
            font-size: 0.8rem;
            color: var(--clr-muted);
        }

        .meta-dot { opacity: 0.35; }

        .meta-category {
            background: var(--clr-accent-light);
            color: var(--clr-accent);
            padding: 0.2rem 0.65rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .article-title {
            font-family: var(--font-display);
            font-size: clamp(1.75rem, 4vw, 2.6rem);
            font-weight: 700;
            line-height: 1.25;
            letter-spacing: -0.5px;
            margin-bottom: 0;
        }

        /* ── FEATURED IMAGE ── */
        .article-image {
            border-radius: var(--radius);
            overflow: hidden;
            margin-bottom: 2.5rem;
            aspect-ratio: 16/9;
            background: var(--clr-border);
        }

        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* ── PROSE ── */
        .prose {
            font-size: 1.05rem;
            line-height: 1.85;
            color: #2D2D2B;
        }

        .prose p { margin-bottom: 1.5rem; }

        .prose h2, .prose h3 {
            font-family: var(--font-display);
            font-weight: 600;
            margin: 2.5rem 0 1rem;
            line-height: 1.3;
        }

        .prose h2 { font-size: 1.5rem; }
        .prose h3 { font-size: 1.2rem; }

        .prose a { color: var(--clr-accent); text-decoration: underline; text-underline-offset: 3px; }

        .prose blockquote {
            border-left: 3px solid var(--clr-accent);
            padding: 0.75rem 1.25rem;
            margin: 2rem 0;
            color: var(--clr-muted);
            font-style: italic;
            background: var(--clr-accent-light);
            border-radius: 0 var(--radius) var(--radius) 0;
        }

        .prose code {
            font-size: 0.875em;
            background: var(--clr-tag-bg);
            padding: 0.15em 0.45em;
            border-radius: 4px;
        }

        .prose pre {
            background: #1A1A18;
            color: #E8E6DF;
            padding: 1.25rem 1.5rem;
            border-radius: var(--radius);
            overflow-x: auto;
            margin: 2rem 0;
            font-size: 0.875rem;
        }

        .prose pre code { background: none; padding: 0; color: inherit; }

        /* ── DIVIDER ── */
        .article-divider {
            border: none;
            border-top: 1px solid var(--clr-border);
            margin: 3rem 0;
        }

        /* ── CATEGORIES ── */
        .section-label {
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--clr-muted);
            margin-bottom: 1rem;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 3rem;
        }

        .tag {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 400;
            color: var(--clr-muted);
            transition: background 0.2s, color 0.2s, border-color 0.2s;
        }

        .tag:hover {
            background: var(--clr-text);
            color: #fff;
            border-color: var(--clr-text);
        }

        /* ── COMMENTS ── */
.comments-section { margin-top: 1rem; }

.comments-head {
    display: flex; align-items: center; gap: .75rem;
    margin-bottom: 1.25rem;
}
.comments-title {
    font-family: var(--font-display);
    font-size: 1.3rem; font-weight: 600;
}
.comments-badge {
    background: var(--clr-accent-light);
    color: var(--clr-accent);
    font-size: .7rem; font-weight: 500;
    letter-spacing: .08em; text-transform: uppercase;
    padding: .25rem .75rem; border-radius: 20px;
}
.comments-box {
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius);
    padding: 2rem;
    box-shadow: var(--shadow);
}

/* ── OVERRIDE LIVEWIRE COMMENTS THEME ── */

/* Reset warna gelap bawaan */
.comments-box * {
    font-family: var(--font-body) !important;
}

/* Container utama komentar */
.comments-box > div,
.comments-box [wire\:id] > div {
    background: transparent !important;
    color: var(--clr-text) !important;
}

/* Header "Discussion (N)" */
.comments-box h2,
.comments-box h3,
.comments-box [class*="title"],
.comments-box [class*="header"] h2 {
    font-family: var(--font-display) !important;
    font-size: 1rem !important;
    font-weight: 600 !important;
    color: var(--clr-text) !important;
    background: transparent !important;
}

/* Sort by button */
.comments-box select,
.comments-box [class*="sort"] button,
.comments-box [class*="sort"] select {
    background: var(--clr-bg) !important;
    border: 1.5px solid var(--clr-border) !important;
    border-radius: 8px !important;
    color: var(--clr-muted) !important;
    font-size: .8rem !important;
    padding: .35rem .75rem !important;
    cursor: pointer !important;
    outline: none !important;
}

/* "Log in to comment" teks */
.comments-box [class*="login"],
.comments-box [class*="guest"],
.comments-box a[href*="login"] {
    color: var(--clr-accent) !important;
    font-size: .875rem !important;
    text-decoration: underline !important;
    text-underline-offset: 3px !important;
}

/* Area komentar gelap — paksa jadi terang */
.comments-box [class*="comment"],
.comments-box article,
.comments-box [class*="item"],
.comments-box li {
    background: transparent !important;
    color: var(--clr-text) !important;
    border-color: var(--clr-border) !important;
}

/* Avatar */
.comments-box img[class*="avatar"],
.comments-box [class*="avatar"] img {
    border-radius: 50% !important;
    width: 38px !important;
    height: 38px !important;
    object-fit: cover !important;
    border: 2px solid var(--clr-border) !important;
    background: var(--clr-tag-bg) !important;
}

/* Nama pengguna */
.comments-box [class*="name"],
.comments-box [class*="author"],
.comments-box strong {
    color: var(--clr-text) !important;
    font-weight: 500 !important;
    font-size: .875rem !important;
    background: transparent !important;
}

/* Waktu */
.comments-box time,
.comments-box [class*="date"],
.comments-box [class*="time"],
.comments-box [class*="ago"] {
    color: var(--clr-muted) !important;
    font-size: .75rem !important;
    background: transparent !important;
}

/* Isi teks komentar */
.comments-box p,
.comments-box [class*="body"],
.comments-box [class*="content"] {
    color: #3A3A38 !important;
    font-size: .9rem !important;
    line-height: 1.7 !important;
    background: transparent !important;
}

/* Form textarea & input */
.comments-box textarea,
.comments-box input[type="text"],
.comments-box input[type="email"],
.comments-box input[type="password"] {
    width: 100% !important;
    background: var(--clr-bg) !important;
    border: 1.5px solid var(--clr-border) !important;
    border-radius: 8px !important;
    padding: .7rem 1rem !important;
    font-size: .875rem !important;
    color: var(--clr-text) !important;
    outline: none !important;
    transition: border-color .2s, box-shadow .2s !important;
    box-shadow: none !important;
}
.comments-box textarea:focus,
.comments-box input:focus {
    border-color: var(--clr-accent) !important;
    box-shadow: 0 0 0 3px rgba(194,85,42,.1) !important;
    background: var(--clr-surface) !important;
}
.comments-box textarea {
    resize: vertical !important;
    min-height: 100px !important;
}

/* Semua tombol */
.comments-box button {
    font-family: var(--font-body) !important;
    cursor: pointer !important;
    transition: all .2s !important;
}

/* Tombol Submit / Kirim */
.comments-box button[type="submit"],
.comments-box [class*="submit"],
.comments-box [class*="post"] button {
    background: var(--clr-accent) !important;
    color: #fff !important;
    border: none !important;
    border-radius: 8px !important;
    padding: .65rem 1.4rem !important;
    font-size: .875rem !important;
    font-weight: 500 !important;
}
.comments-box button[type="submit"]:hover {
    opacity: .85 !important;
    transform: translateY(-1px) !important;
}

/* Tombol Reply / Like / kecil lainnya */
.comments-box button:not([type="submit"]),
.comments-box [class*="reply"] button,
.comments-box [class*="like"] button,
.comments-box [class*="vote"] button {
    background: var(--clr-bg) !important;
    border: 1px solid var(--clr-border) !important;
    border-radius: 6px !important;
    padding: .28rem .7rem !important;
    font-size: .75rem !important;
    color: var(--clr-muted) !important;
}
.comments-box button:not([type="submit"]):hover {
    background: var(--clr-tag-bg) !important;
    color: var(--clr-text) !important;
    transform: none !important;
    opacity: 1 !important;
}

/* Like count / angka */
.comments-box [class*="count"],
.comments-box [class*="vote"] span,
.comments-box [class*="like"] span {
    color: var(--clr-muted) !important;
    font-size: .75rem !important;
    background: transparent !important;
}

/* Garis pemisah antar komentar */
.comments-box [class*="divider"],
.comments-box hr {
    border-color: var(--clr-border) !important;
    opacity: 1 !important;
}

/* Empty state */
.comments-box [class*="empty"],
.comments-box [class*="no-comment"] {
    text-align: center !important;
    color: var(--clr-muted) !important;
    font-size: .875rem !important;
    padding: 2rem 0 !important;
}

/* Nested reply indent */
.comments-box [class*="reply"] > div,
.comments-box [class*="children"] {
    border-left: 2px solid var(--clr-border) !important;
    margin-left: 1.5rem !important;
    padding-left: 1rem !important;
    background: transparent !important;
}

        /* ── FOOTER ── */
        footer {
            background: var(--clr-text);
            color: #C8C6C0;
            padding: 3.5rem 1.5rem 2rem;
        }

        .footer-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 3rem;
        }

        .footer-logo {
            font-family: var(--font-display);
            font-size: 1.4rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.75rem;
            display: block;
        }

        .footer-logo span { color: var(--clr-accent); }

        .footer-desc {
            font-size: 0.875rem;
            line-height: 1.7;
            margin-bottom: 1.25rem;
            opacity: 0.7;
        }

        .social-links { display: flex; gap: 0.75rem; }

        .social-links a {
            width: 34px;
            height: 34px;
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            color: #C8C6C0;
            transition: background 0.2s, border-color 0.2s;
        }

        .social-links a:hover {
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.3);
        }

        .footer-col h4 {
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #fff;
            margin-bottom: 1rem;
        }

        .footer-links { list-style: none; display: flex; flex-direction: column; gap: 0.5rem; }

        .footer-links a {
            font-size: 0.875rem;
            opacity: 0.65;
            transition: opacity 0.2s;
        }

        .footer-links a:hover { opacity: 1; }

        .footer-bottom {
            max-width: 1100px;
            margin: 2.5rem auto 0;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.08);
            font-size: 0.8rem;
            opacity: 0.4;
        }

        @media (max-width: 720px) {
            .footer-inner { grid-template-columns: 1fr; gap: 2rem; }
            .nav-links { gap: 1.2rem; }
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
                <a href="{{ route('home') }}">Blog</a>
                <a href="/about">About</a>
                <a href="/contact">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-dashboard">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span class="sep">›</span>
        <a href="{{ route('home') }}">Blog</a>
        <span class="sep">›</span>
        <span>{{ Str::limit($post->title, 40) }}</span>
    </div>

    <!-- Article -->
    <main class="article-wrap">

        <header class="article-header">
            <div class="article-meta">
                <span class="meta-category">Artikel</span>
                <span class="meta-dot">•</span>
                <span>{{ $post->created_at->format('F j, Y') }}</span>
            </div>
            <h1 class="article-title">{{ $post->title }}</h1>
        </header>

        @if($post->image)
        <div class="article-image">
            <img src="{{ asset('img/' . $post->image) }}" alt="{{ $post->title }}">
        </div>
        @endif

        <div class="prose">
            {!! $post->description !!}
        </div>

        <hr class="article-divider">

        <!-- Categories -->
        <p class="section-label">Cari Artikel</p>
        <div class="tags">
    @foreach ($categories as $cat)
        <a href="{{ route('category', $cat) }}"
           class="tag {{ request()->segment(2) === $cat ? 'tag-active' : '' }}">
            {{ ucfirst($cat) }}
        </a>
    @endforeach
</div>
   

        <!-- Comments -->
<div class="comments-section">
    <div class="comments-head">
        <h3 class="comments-title">Komentar</h3>
        <span class="comments-badge">Diskusi</span>
    </div>
    <div class="comments-box">
        <livewire:comments :model="$post"/>
    </div>
</div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-inner">
            <div>
                <span class="footer-logo">News<span>.</span>io</span>
                <p class="footer-desc">Jendela informasi dunia yang merangkum peristiwa penting dan tren terbaru secara mendalam, akurat, dan terpercaya.</p>
                <div class="social-links">
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
        <div class="footer-bottom">
            <p>&copy; 2026 News.io — All rights reserved. Built with Laravel.</p>
        </div>
    </footer>

</body>
</html>