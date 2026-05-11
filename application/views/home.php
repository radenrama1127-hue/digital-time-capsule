<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — DigitalCapsule</title>
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
            --blue-md:   #3d6cb5;
            --blue-dk:   #153a6a;
            --danger:    #9f1239;
            --danger-lt: #fff1f2;
            --danger-bd: #fecdd3;
            --purple:    #5b21b6;
            --purple-lt: #f5f3ff;
            --purple-bd: #c4b5fd;
        }

        body {
            min-height: 100vh;
            background: var(--stone);
            font-family: 'Outfit', sans-serif;
            color: var(--ink);
            padding-bottom: 100px;
        }

        /* ── NAV ── */
        nav {
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
            height: 60px;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-brand-mark {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .nav-brand-mark svg {
            width: 15px; height: 15px;
            fill: none; stroke: #fff;
            stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
        }

        .nav-brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            font-weight: 400;
            color: var(--ink);
        }

        .nav-brand-name span { color: var(--blue); }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2px;
        }

        .nav-links a {
            color: var(--ink3);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 8px;
            transition: color .18s, background .18s;
        }

        .nav-links a:hover { color: var(--ink); background: var(--stone2); }
        .nav-links a.active { color: var(--blue); background: var(--blue-lt); }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .nav-user {
            font-size: 13px;
            color: var(--ink3);
        }

        .nav-user strong { color: var(--ink); font-weight: 500; }

        .nav-logout {
            font-size: 13px;
            color: var(--ink3);
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 8px;
            border: 0.5px solid var(--stone3);
            transition: border-color .18s, color .18s, background .18s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-logout:hover {
            border-color: var(--danger-bd);
            color: var(--danger);
            background: var(--danger-lt);
        }

        /* ── MAIN ── */
        .main {
            max-width: 1120px;
            margin: 0 auto;
            padding: 48px 24px 0;
        }

        /* ── PAGE HEADER ── */
        .page-header {
            margin-bottom: 36px;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        .page-header-left h1 {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            font-weight: 400;
            color: var(--ink);
        }

        .page-header-left p {
            color: var(--ink3);
            font-size: 13px;
            margin-top: 5px;
        }

        /* ── STATS ── */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 44px;
        }

        @media (max-width: 700px) { .stats { grid-template-columns: repeat(2, 1fr); } }

        .stat {
            background: #fff;
            border: 0.5px solid var(--stone3);
            border-radius: 14px;
            padding: 18px 20px;
            position: relative;
            overflow: hidden;
        }

        .stat::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: var(--blue);
            opacity: 0;
            transition: opacity .2s;
        }

        .stat:hover::before { opacity: 1; }

        .stat-label {
            font-size: 10px;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            color: var(--ink4);
            margin-bottom: 8px;
        }

        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            font-weight: 400;
            color: var(--ink);
        }

        .stat-value.accent { color: var(--blue); }

        /* ── TOOLBAR ── */
        .toolbar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
        }

        .search-wrap {
            position: relative;
            flex: 1;
            max-width: 300px;
        }

        .search-wrap .icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--ink4);
            font-size: 13px;
            pointer-events: none;
        }

        .search-wrap input {
            width: 100%;
            background: #fff;
            border: 0.5px solid var(--stone3);
            border-radius: 10px;
            padding: 9px 14px 9px 36px;
            color: var(--ink);
            font-family: 'Outfit', sans-serif;
            font-size: 13px;
            outline: none;
            transition: border-color .18s, box-shadow .18s;
        }

        .search-wrap input:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(30,77,140,.08);
        }

        .search-wrap input::placeholder { color: var(--stone4); }

        /* ── SECTION LABEL ── */
        .section-label {
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--ink4);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 0.5px;
            background: var(--stone3);
        }

        /* ── CAPSULE GRID ── */
        .capsule-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 14px;
        }

        .capsule-card {
            background: #fff;
            border: 0.5px solid var(--stone3);
            border-radius: 16px;
            overflow: hidden;
            transition: border-color .22s, box-shadow .22s, transform .22s;
        }

        .capsule-card:hover {
            border-color: var(--stone4);
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(0,0,0,.08);
        }

        .capsule-thumb {
            width: 100%;
            height: 170px;
            object-fit: cover;
            display: block;
            border-bottom: 0.5px solid var(--stone3);
        }

        .capsule-thumb-placeholder {
            width: 100%;
            height: 170px;
            background: linear-gradient(135deg, var(--stone2) 0%, var(--stone3) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 0.5px solid var(--stone3);
        }

        .capsule-thumb-placeholder i {
            font-size: 28px;
            color: var(--stone4);
        }

        .capsule-body { padding: 18px 18px 16px; }

        .capsule-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 9px;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            font-weight: 500;
            padding: 3px 10px;
            border-radius: 20px;
            margin-bottom: 12px;
            border: 0.5px solid var(--purple-bd);
            color: var(--purple);
            background: var(--purple-lt);
        }

        .capsule-title {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            font-weight: 400;
            margin-bottom: 8px;
            line-height: 1.35;
            color: var(--ink);
        }

        .capsule-desc {
            font-size: 13px;
            color: var(--ink3);
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 14px;
        }

        .capsule-date {
            font-size: 12px;
            color: var(--ink4);
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 14px;
        }

        .capsule-footer {
            border-top: 0.5px solid var(--stone2);
            padding-top: 12px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .capsule-footer a {
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color .18s;
        }

        .link-delete { color: var(--ink4); }
        .link-delete:hover { color: var(--danger); }

        /* ── EMPTY ── */
        .empty {
            text-align: center;
            padding: 64px 20px;
            color: var(--ink4);
            border: 0.5px dashed var(--stone4);
            border-radius: 16px;
            background: #fff;
        }

        .empty i { font-size: 32px; margin-bottom: 12px; display: block; opacity: .4; }
        .empty h3 { font-size: 16px; color: var(--ink3); font-weight: 500; margin-bottom: 6px; }
        .empty p { font-size: 13px; color: var(--ink4); }

        /* ── FAB ── */
        .fab {
            position: fixed;
            bottom: 32px;
            right: 32px;
            height: 48px;
            padding: 0 22px;
            border-radius: 12px;
            background: var(--blue);
            color: #fff;
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(30,77,140,.3);
            transition: background .18s, transform .18s, box-shadow .18s;
            z-index: 50;
        }

        .fab:hover {
            background: var(--blue-dk);
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(30,77,140,.38);
        }
    </style>
</head>
<body>

<nav>
    <a href="<?= base_url('index.php/home'); ?>" class="nav-brand">
        <div class="nav-brand-mark">
            <svg viewBox="0 0 24 24"><path d="M3 8l9-5 9 5v8l-9 5-9-5V8z"/><path d="M12 3v18M3 8l9 5 9-5"/></svg>
        </div>
        <div class="nav-brand-name">Digital<span>Capsule</span></div>
    </a>

    <div class="nav-links">
        <a href="<?= base_url('index.php/home'); ?>" class="active">Dashboard</a>
        <a href="<?= base_url('index.php/home/history'); ?>">History</a>
    </div>

    <div class="nav-right">
        <span class="nav-user">Welcome, <strong><?= $this->session->userdata('username'); ?></strong></span>
        <a href="<?= base_url('index.php/home/logout'); ?>" class="nav-logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</nav>

<div class="main">

    <div class="page-header">
        <div class="page-header-left">
            <h1>Hello, <?= $this->session->userdata('namalengkap'); ?></h1>
            <p>Here are your time capsules — sealed with time.</p>
        </div>
    </div>

    <div class="stats">
        <div class="stat">
            <div class="stat-label">Active</div>
            <div class="stat-value accent"><?= count($active_capsules); ?></div>
        </div>
        <div class="stat">
            <div class="stat-label">History</div>
            <div class="stat-value"><?= count($history_capsules); ?></div>
        </div>
        <div class="stat">
            <div class="stat-label">Total</div>
            <div class="stat-value"><?= count($active_capsules) + count($history_capsules); ?></div>
        </div>
        <div class="stat">
            <div class="stat-label">Status</div>
            <div class="stat-value" style="font-size:15px; margin-top:6px; color:var(--blue); font-family:'Outfit';">Online</div>
        </div>
    </div>

    <div class="toolbar">
        <div class="search-wrap">
            <span class="icon"><i class="fas fa-search"></i></span>
            <input type="text" id="searchInput" placeholder="Search capsule...">
        </div>
    </div>

    <div class="section-label">Active Capsules</div>

    <?php if(empty($active_capsules)): ?>
        <div class="empty">
            <i class="fas fa-box-open"></i>
            <h3>No active capsules yet</h3>
            <p>Create your first one by tapping the button below.</p>
        </div>
    <?php else: ?>
        <div class="capsule-grid">
            <?php foreach($active_capsules as $c): ?>
                <div class="capsule-card searchable-card">

                    <?php if($c->image != ''): ?>
                        <img src="<?= base_url('uploads/'.$c->image); ?>" class="capsule-thumb" alt="<?= $c->title; ?>">
                    <?php else: ?>
                        <div class="capsule-thumb-placeholder">
                            <i class="fas fa-box"></i>
                        </div>
                    <?php endif; ?>

                    <div class="capsule-body">
                        <div class="capsule-badge">
                            <i class="fas fa-lock" style="font-size:8px;"></i> Locked
                        </div>
                        <h3 class="capsule-title searchable-title"><?= $c->title; ?></h3>
                        <p class="capsule-desc"><?= $c->description; ?></p>
                        <div class="capsule-date">
                            <i class="fas fa-calendar-alt"></i>
                            Opens <?= date('d M Y', strtotime($c->open_date)); ?>
                        </div>
                        <div class="capsule-footer">
                            <a href="<?= base_url('index.php/home/delete/'.$c->id); ?>"
                               onclick="return confirm('Delete this capsule permanently?')"
                               class="link-delete">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<a href="<?= base_url('index.php/home/create'); ?>" class="fab">
    <i class="fas fa-plus"></i> New Capsule
</a>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const kw = this.value.toLowerCase();
        document.querySelectorAll('.searchable-card').forEach(card => {
            const title = card.querySelector('.searchable-title').innerText.toLowerCase();
            card.style.display = title.includes(kw) ? '' : 'none';
        });
    });
</script>

</body>
</html>