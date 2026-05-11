<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($capsule->title); ?> — DigitalCapsule</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;1,400&family=Outfit:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --stone:     #f7f5f0;
            --stone2:    #eeebe4;
            --stone3:    #e0dcd2;
            --stone4:    #ccc8be;
            --ink:       #1c1917;
            --ink2:      #44403c;
            --ink3:      #78716c;
            --ink4:      #a8a29e;
            --blue:      #1e4d8c;
            --blue-lt:   #e8f0fb;
            --blue-dk:   #153a6a;
            --green:     #14532d;
            --green-lt:  #f0fdf4;
            --green-bd:  #86efac;
        }

        body {
            min-height: 100vh;
            background: var(--stone);
            font-family: 'Outfit', sans-serif;
            color: var(--ink);
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(var(--stone3) 0.5px, transparent 0.5px),
                linear-gradient(90deg, var(--stone3) 0.5px, transparent 0.5px);
            background-size: 32px 32px;
            opacity: .35;
            pointer-events: none;
        }

        /* Top Bar */
        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(247,245,240,.96);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-bottom: 0.5px solid var(--stone3);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            height: 56px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 13px;
            color: var(--ink3);
            text-decoration: none;
            font-weight: 500;
            transition: color .18s;
        }

        .back-link:hover { color: var(--ink); }

        .topbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 15px;
            color: var(--ink3);
        }

        .topbar-brand span { color: var(--blue); }

        /* Hero image */
        .hero {
            width: 100%;
            max-height: 420px;
            object-fit: cover;
            display: block;
            position: relative;
            z-index: 1;
        }

        /* Wrapper */
        .wrap {
            position: relative;
            z-index: 1;
            max-width: 720px;
            margin: 0 auto;
            padding: 48px 24px 80px;
        }

        /* Article */
        .article {
            background: #fff;
            border: 0.5px solid var(--stone3);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,.04), 0 16px 40px rgba(0,0,0,.08);
        }

        /* If hero image, offset card up */
        .has-image .article {
            margin-top: -40px;
        }

        /* Article head */
        .article-head {
            padding: 32px 36px 24px;
            border-bottom: 0.5px solid var(--stone2);
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 10px;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            font-weight: 500;
            padding: 4px 12px;
            border-radius: 20px;
            border: 0.5px solid var(--green-bd);
            color: var(--green);
            background: var(--green-lt);
        }

        .meta-date {
            font-size: 12px;
            color: var(--ink4);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .article-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 400;
            line-height: 1.2;
            color: var(--ink);
            letter-spacing: -.3px;
        }

        /* Article body */
        .article-body {
            padding: 32px 36px;
        }

        .article-desc {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 17px;
            line-height: 1.9;
            color: var(--ink2);
        }

        /* Footer */
        .article-footer {
            padding: 20px 36px;
            border-top: 0.5px solid var(--stone2);
            background: var(--stone);
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .footer-item {
            font-size: 12px;
            color: var(--ink4);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        @media (max-width: 600px) {
            .article-title { font-size: 26px; }
            .article-head, .article-body, .article-footer { padding-left: 22px; padding-right: 22px; }
        }
    </style>
</head>
<body>

<div class="topbar">
    <a href="<?= base_url('index.php/home'); ?>" class="back-link">
        <i class="fas fa-arrow-left"></i> Dashboard
    </a>
    <div class="topbar-brand">Digital<span>Capsule</span></div>
    <a href="<?= base_url('index.php/home/history'); ?>" style="font-size:13px; color:var(--ink4); text-decoration:none;">
        History
    </a>
</div>

<?php if($capsule->image != ''): ?>
    <img src="<?= base_url('uploads/'.$capsule->image); ?>" class="hero" alt="<?= htmlspecialchars($capsule->title); ?>">
<?php endif; ?>

<div class="wrap <?= $capsule->image != '' ? 'has-image' : '' ?>">
    <div class="article">

        <div class="article-head">
            <div class="article-meta">
                <div class="badge">
                    <i class="fas fa-check" style="font-size:9px;"></i> Opened
                </div>
                <div class="meta-date">
                    <i class="fas fa-calendar-check"></i>
                    Opened on <?= date('d F Y', strtotime($capsule->open_date)); ?>
                </div>
            </div>
            <h1 class="article-title"><?= htmlspecialchars($capsule->title); ?></h1>
        </div>

        <div class="article-body">
            <p class="article-desc"><?= nl2br(htmlspecialchars($capsule->description)); ?></p>
        </div>

        <div class="article-footer">
            <div class="footer-item">
                <i class="fas fa-box-open"></i>
                Time capsule memory
            </div>
        </div>

    </div>
</div>

</body>
</html>