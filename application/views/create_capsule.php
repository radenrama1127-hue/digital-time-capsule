<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Capsule — DigitalCapsule</title>
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
        }

        body {
            min-height: 100vh;
            background: var(--stone);
            display: flex;
            align-items: flex-start;
            justify-content: center;
            font-family: 'Outfit', sans-serif;
            color: var(--ink);
            padding: 60px 20px 80px;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(var(--stone3) 0.5px, transparent 0.5px),
                linear-gradient(90deg, var(--stone3) 0.5px, transparent 0.5px);
            background-size: 32px 32px;
            opacity: .4;
            pointer-events: none;
        }

        .wrap {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 540px;
        }

        /* Back link */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 13px;
            color: var(--ink4);
            text-decoration: none;
            margin-bottom: 24px;
            transition: color .18s;
        }

        .back-link:hover { color: var(--ink); }

        /* Card */
        .card {
            background: #fff;
            border: 0.5px solid var(--stone3);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,.04), 0 12px 32px rgba(0,0,0,.07);
        }

        /* Card Header */
        .card-header {
            background: var(--stone);
            border-bottom: 0.5px solid var(--stone3);
            padding: 26px 30px;
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .card-header-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            background: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .card-header-icon i { color: #fff; font-size: 16px; }

        .card-header-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 400;
            color: var(--ink);
        }

        .card-header-text p {
            font-size: 13px;
            color: var(--ink3);
            margin-top: 3px;
        }

        /* Card Body */
        .card-body {
            padding: 28px 30px;
        }

        /* Field */
        .field { margin-bottom: 22px; }

        .field label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 1.6px;
            text-transform: uppercase;
            color: var(--ink4);
            margin-bottom: 8px;
        }

        .field label i { font-size: 11px; }

        .field input,
        .field textarea,
        .field .file-wrapper {
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

        .field input:focus,
        .field textarea:focus {
            border-color: var(--blue);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(30,77,140,.09);
        }

        .field input::placeholder,
        .field textarea::placeholder { color: var(--stone4); }

        .field textarea { resize: vertical; min-height: 120px; line-height: 1.6; }

        /* File input custom */
        .file-wrapper {
            position: relative;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--ink4);
        }

        .file-wrapper input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            padding: 0;
            border: none;
            border-radius: 10px;
            background: transparent;
            box-shadow: none;
        }

        .file-wrapper:hover {
            border-color: var(--stone4);
            background: #fff;
        }

        .file-label-text { font-size: 14px; }

        /* Date */
        .field input[type="date"] {
            color: var(--ink);
        }

        /* Divider */
        .divider {
            height: 0.5px;
            background: var(--stone2);
            margin: 4px 0 24px;
        }

        /* Submit */
        .btn-submit {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: var(--blue);
            color: #fff;
            font-family: 'Outfit', sans-serif;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            letter-spacing: .4px;
            transition: background .18s, transform .14s, box-shadow .18s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit:hover {
            background: var(--blue-dk);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(30,77,140,.28);
        }

        .btn-submit:active { transform: translateY(0); box-shadow: none; }

        /* Hint */
        .field-hint {
            font-size: 11px;
            color: var(--ink4);
            margin-top: 6px;
        }
    </style>
</head>
<body>

<div class="wrap">

    <a href="<?= base_url('index.php/home'); ?>" class="back-link">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>

    <div class="card">

        <div class="card-header">
            <div class="card-header-icon">
                <i class="fas fa-box"></i>
            </div>
            <div class="card-header-text">
                <h1>New Capsule</h1>
                <p>Seal a memory for the future.</p>
            </div>
        </div>

        <div class="card-body">

            <form action="<?= base_url('index.php/home/store'); ?>" method="post" enctype="multipart/form-data">

                <div class="field">
                    <label>
                        <i class="fas fa-tag"></i> Title
                    </label>
                    <input type="text" name="title" placeholder="Give your capsule a name" required>
                </div>

                <div class="field">
                    <label>
                        <i class="fas fa-align-left"></i> Description
                    </label>
                    <textarea name="description" placeholder="Write what's inside this capsule — your thoughts, memories, or messages..." required></textarea>
                </div>

                <div class="field">
                    <label>
                        <i class="fas fa-image"></i> Photo <span style="font-size:9px; color:var(--ink4); text-transform:none; letter-spacing:0; margin-left:4px;">(optional)</span>
                    </label>
                    <div class="file-wrapper">
                        <i class="fas fa-paperclip"></i>
                        <span class="file-label-text" id="fileLabel">Choose an image...</span>
                        <input type="file" name="image" accept="image/*" id="fileInput">
                    </div>
                </div>

                <div class="divider"></div>

                <div class="field">
                    <label>
                        <i class="fas fa-calendar-alt"></i> Open Date
                    </label>
                    <input type="date" name="open_date" required>
                    <p class="field-hint">The capsule will unlock on this date.</p>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-lock"></i> Seal Capsule
                </button>

            </form>

        </div>

    </div>

</div>

<script>
    document.getElementById('fileInput').addEventListener('change', function() {
        const label = document.getElementById('fileLabel');
        label.textContent = this.files.length > 0 ? this.files[0].name : 'Choose an image...';
    });
</script>

</body>
</html>