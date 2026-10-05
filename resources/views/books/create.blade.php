<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru - Katalog Buku</title>
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
            --error-text: #f87171;
            --error-bg: rgba(239, 68, 68, 0.1);
            --error-border: rgba(239, 68, 68, 0.3);
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

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #e2e8f0;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: #ffffff;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25);
        }

        .is-invalid {
            border-color: var(--error-border);
            background: var(--error-bg);
        }

        .invalid-feedback {
            color: var(--error-text);
            font-size: 0.825rem;
            margin-top: 0.4rem;
            display: block;
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 1.75rem;
        }

        .btn-submit {
            background: var(--accent-gradient);
            color: #ffffff;
            padding: 0.7rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 14px 0 rgba(99, 102, 241, 0.39);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px 0 rgba(99, 102, 241, 0.5);
        }

        .btn-cancel {
            color: var(--text-muted);
            text-decoration: none;
            padding: 0.7rem 1.25rem;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .btn-cancel:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Tambah Buku Baru</h1>
            <p>Isi formulir di bawah ini untuk menambahkan data buku ke katalog.</p>
        </div>

        <div class="card">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Judul Buku</label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title') }}" 
                           placeholder="Contoh: Pemrograman Web Lanjut">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="author">Penulis</label>
                    <input type="text" 
                           id="author" 
                           name="author" 
                           class="form-control @error('author') is-invalid @enderror" 
                           value="{{ old('author') }}" 
                           placeholder="Contoh: Budi Raharjo">
                    @error('author')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="year">Tahun Terbit</label>
                    <input type="number" 
                           id="year" 
                           name="year" 
                           class="form-control @error('year') is-invalid @enderror" 
                           value="{{ old('year') }}" 
                           placeholder="Contoh: 2024">
                    @error('year')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('books.index') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit">Simpan Buku</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
