<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Katalog Buku</title>
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
            --badge-bg: rgba(99, 102, 241, 0.15);
            --badge-text: #818cf8;
            --table-hover: rgba(255, 255, 255, 0.03);
            --success-bg: rgba(34, 197, 94, 0.15);
            --success-border: rgba(34, 197, 94, 0.3);
            --success-text: #4ade80;
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
            max-width: 960px;
        }

        .header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .header-title h1 {
            font-size: 2.25rem;
            font-weight: 800;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.025em;
        }

        .header-title p {
            color: var(--text-muted);
            margin-top: 0.35rem;
            font-size: 0.95rem;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-add {
            background: var(--accent-gradient);
            color: #ffffff;
            padding: 0.65rem 1.25rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 4px 14px 0 rgba(99, 102, 241, 0.39);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px 0 rgba(99, 102, 241, 0.5);
        }

        .stats-badge {
            background: var(--badge-bg);
            color: var(--badge-text);
            border: 1px solid rgba(99, 102, 241, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .alert-success {
            background: var(--success-bg);
            border: 1px solid var(--success-border);
            color: var(--success-text);
            padding: 0.85rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card {
            background: var(--bg-card);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 8px 10px -6px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.95rem;
        }

        th {
            background-color: rgba(15, 23, 42, 0.5);
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        td {
            padding: 1.1rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-main);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: var(--table-hover);
        }

        .book-id {
            font-family: monospace;
            color: var(--text-muted);
            font-weight: 600;
        }

        .book-title {
            font-weight: 600;
            color: #ffffff;
        }

        .year-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 0.25rem 0.65rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #e2e8f0;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.4rem 0.75rem;
            border-radius: 6px;
            font-size: 0.825rem;
            font-weight: 600;
            text-decoration: none;
            transition: opacity 0.2s ease, transform 0.1s ease;
            border: none;
            cursor: pointer;
        }

        .btn-action:hover {
            opacity: 0.85;
            transform: translateY(-1px);
        }

        .btn-detail {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .btn-edit {
            background: rgba(245, 158, 11, 0.15);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .empty-state {
            padding: 3rem 1.5rem;
            text-align: center;
            color: var(--text-muted);
        }

        .footer-note {
            margin-top: 1.5rem;
            text-align: center;
            color: var(--text-muted);
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="header-title">
                <h1>Daftar Buku</h1>
                <p>Koleksi & Manajamen Katalog Buku (Modul 4 CRUD)</p>
            </div>
            <div class="header-actions">
                <div class="stats-badge">
                    <span>📚 Total: {{ $books->count() }} Buku</span>
                </div>
                <a href="{{ route('books.create') }}" class="btn-add">+ Tambah Buku</a>
            </div>
        </header>

        @if(session('success'))
            <div class="alert-success">
                <span>✓</span> {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 70px;">ID</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th style="width: 100px; text-align: center;">Tahun</th>
                            <th style="width: 200px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td class="book-id">#{{ $book->id }}</td>
                                <td class="book-title">{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td style="text-align: center;">
                                    <span class="year-badge">{{ $book->year }}</span>
                                </td>
                                <td>
                                    <div class="action-buttons" style="justify-content: center;">
                                        <a href="{{ route('books.show', $book->id) }}" class="btn-action btn-detail">Detail</a>
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn-action btn-edit">Edit</a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <p>Belum ada data buku di database.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="footer-note">
            <p>Pengembangan Aplikasi Web Lanjut &bull; Modul 4 CRUD</p>
        </div>
    </div>
</body>
</html>
