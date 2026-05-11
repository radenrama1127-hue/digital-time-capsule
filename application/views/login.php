<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — DigitalCapsule</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;1,400&family=Outfit:wght@300;400;500&display=swap" rel="stylesheet">
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
            --danger:    #9f1239;
            --danger-lt: #fff1f2;
            --danger-bd: #fecdd3;
        }

        body {
            min-height: 100vh;
            background: var(--stone);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Outfit', sans-serif;
            color: var(--ink);
            padding: 40px 20px;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(var(--stone3) 0.5px, transparent 0.5px),
                linear-gradient(90deg, var(--stone3) 0.5px, transparent 0.5px);
            background-size: 32px 32px;
            opacity: .45;
            pointer-events: none;
        }

        .wrap {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 400px;
        }

        .brand {
            text-align: center;
            margin-bottom: 32px;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 15px;
            background: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            box-shadow: 0 4px 20px rgba(30,77,140,.22);
        }

        .brand-icon svg {
            width: 24px;
            height: 24px;
            fill: none;
            stroke: #fff;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 400;
            color: var(--ink);
        }

        .brand-name span { color: var(--blue); }

        .brand-sub {
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--ink4);
            margin-top: 5px;
        }

        .card {
            background: #ffffff;
            border: 0.5px solid var(--stone3);
            border-radius: 20px;
            padding: 34px 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,.04), 0 12px 32px rgba(0,0,0,.07);
        }

        .card-title {
            font-size: 13px;
            font-weight: 400;
            color: var(--ink3);
            margin-bottom: 22px;
            padding-bottom: 18px;
            border-bottom: 0.5px solid var(--stone2);
        }

        .alert {
            background: var(--danger-lt);
            border: 0.5px solid var(--danger-bd);
            color: var(--danger);
            border-radius: 10px;
            padding: 11px 14px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .field { margin-bottom: 18px; }

        .field label {
            display: block;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 1.6px;
            text-transform: uppercase;
            color: var(--ink4);
            margin-bottom: 7px;
        }

        .field input {
            width: 100%;
            background: var(--stone);
            border: 0.5px solid var(--stone3);
            border-radius: 10px;
            padding: 12px 14px;
            color: var(--ink);
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color .18s, background .18s, box-shadow .18s;
        }

        .field input:focus {
            border-color: var(--blue);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(30,77,140,.09);
        }

        .field input::placeholder { color: var(--stone4); }

        .btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 10px;
            background: var(--blue);
            color: #fff;
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            letter-spacing: .3px;
            transition: background .18s, transform .14s, box-shadow .18s;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn svg {
            width: 15px; height: 15px;
            fill: none; stroke: #fff;
            stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
        }

        .btn:hover {
            background: var(--blue-dk);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(30,77,140,.28);
        }

        .btn:active { transform: translateY(0); box-shadow: none; }

        .footer-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: var(--ink4);
        }

        .footer-link a {
            color: var(--blue);
            text-decoration: none;
            font-weight: 500;
        }

        .footer-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="wrap">

    <div class="brand">
        <div class="brand-icon">
            <svg viewBox="0 0 24 24">
                <path d="M3 8l9-5 9 5v8l-9 5-9-5V8z"/>
                <path d="M12 3v18M3 8l9 5 9-5"/>
            </svg>
        </div>
        <div class="brand-name">Digital<span>Capsule</span></div>
        <div class="brand-sub">Time Capsule Platform</div>
    </div>

    <div class="card">

        <p class="card-title">Sign in to your account</p>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form action="<?= base_url('index.php/home/proses_login'); ?>" method="post">

            <div class="field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn">
                <svg viewBox="0 0 24 24"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                Sign In
            </button>

        </form>

    </div>

    <div class="footer-link">
        Don't have an account?
        <a href="<?= base_url('index.php/home/register'); ?>">Create one</a>
    </div>

</div>

</body>
</html>