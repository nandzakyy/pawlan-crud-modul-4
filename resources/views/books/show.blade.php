<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku - Katalog Buku</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #0f172a;
            --bg-card: rgba(30, 41, 59, 0.7);
            --border-color: rgba(255, 255, 255, 0.1);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --accent-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: var(--bg-primary);
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(236, 72, 153, 0.15) 0px, transparent 50%);
            background-attachment: fixed;
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 2.5rem 1rem;
        }

        .container {
            width: 100%;
            max-width: 600px;
        }

        .header {
            margin-bottom: 1.5rem;
        }

        .header h1 {
            font-size: 1.85rem;
            font-weight: 800;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.025em;
        }

        .header p {
            color: var(--text-muted);
            margin-top: 0.35rem;
            font-size: 0.95rem;
        }

        .card {
            background: var(--bg-card);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 8px 10px -6px rgba(0, 0, 0, 0.3);
        }

        .detail-group {
            margin-bottom: 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .detail-group:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .detail-label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            margin-bottom: 0.35rem;
        }

        .detail-value {
            font-size: 1.1rem;
            font-weight: 600;
            color: #ffffff;
        }

        .year-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            color: #e2e8f0;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 1.75rem;
        }

        .btn-edit {
            background: rgba(245, 158, 11, 0.2);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.4);
            padding: 0.7rem 1.25rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: opacity 0.2s ease;
        }

        .btn-edit:hover {
            opacity: 0.85;
        }

        .btn-back {
            color: var(--text-muted);
            text-decoration: none;
            padding: 0.7rem 1.25rem;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .btn-back:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Detail Buku</h1>
            <p>Informasi rinci buku #{{ $book->id }} dari database.</p>
        </div>

        <div class="card">
            <div class="detail-group">
                <div class="detail-label">ID Buku</div>
                <div class="detail-value" style="font-family: monospace;">#{{ $book->id }}</div>
            </div>

            <div class="detail-group">
                <div class="detail-label">Judul Buku</div>
                <div class="detail-value">{{ $book->title }}</div>
            </div>

            <div class="detail-group">
                <div class="detail-label">Penulis</div>
                <div class="detail-value">{{ $book->author }}</div>
            </div>

            <div class="detail-group">
                <div class="detail-label">Tahun Terbit</div>
                <div class="detail-value">
                    <span class="year-badge">{{ $book->year }}</span>
                </div>
            </div>

            <div class="detail-group">
                <div class="detail-label">Waktu Dibuat</div>
                <div class="detail-value" style="font-size: 0.95rem; font-weight: 400; color: var(--text-muted);">
                    {{ $book->created_at ? $book->created_at->format('d M Y, H:i') : '-' }}
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('books.index') }}" class="btn-back">Kembali ke Daftar</a>
                <a href="{{ route('books.edit', $book->id) }}" class="btn-edit">Edit Buku</a>
            </div>
        </div>
    </div>
</body>
</html>
