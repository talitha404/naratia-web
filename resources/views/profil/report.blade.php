<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Aktivitas Membaca - Naratia</title>
    <style>
        body { 
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; 
            color: #2d3748; 
            padding: 40px; 
            line-height: 1.6;
            background-color: #ffffff;
        }
        .header { 
            text-align: center; 
            border-bottom: 3px double #4a5568; 
            padding-bottom: 20px; 
            margin-bottom: 30px;
        }
        .brand { 
            font-size: 28px; 
            font-weight: 900; 
            letter-spacing: 2px; 
            color: #4f46e5;
        }
        .subtitle {
            font-size: 12px;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 5px;
        }
        .meta-box {
            background-color: #f7fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 40px;
        }
        .meta-title {
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            color: #4a5568;
            margin-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 5px;
        }
        .meta-item {
            display: flex;
            margin-bottom: 8px;
        }
        .meta-label { width: 150px; font-weight: 600; color: #4a5568; }
        .meta-value { color: #1a202c; }
        
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 15px; 
        }
        th, td { 
            border: 1px solid #cbd5e0; 
            padding: 12px 15px; 
            text-align: left; 
        }
        th { 
            background-color: #edf2f7; 
            color: #2d3748;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 12px;
        }
        td { font-size: 14px; }
        .footer {
            margin-top: 60px;
            text-align: center;
            font-size: 11px;
            color: #a0aec0;
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="brand">NARATIA</div>
        <div class="subtitle">Official Reading Activity Report</div>
    </div>

    <div class="meta-box">
        <div class="meta-title">Informasi Pengguna</div>
        <div class="meta-item">
            <div class="meta-label">Nama Akun</div>
            <div class="meta-value">: {{ is_array($user) ? ($user['username'] ?? 'User') : ($user->username ?? 'User') }}</div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Nama Karakter</div>
            <div class="meta-value">: {{ is_array($user) ? ($user['character_name'] ?? '-') : ($user->character_name ?? '-') }}</div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Tanggal Cetak</div>
            <div class="meta-value">: {{ date('d F Y') }}</div>
        </div>
    </div>

    <h3 style="font-size: 16px; color: #2d3748; margin-bottom: 10px;">Ringkasan Statistik Membaca</h3>
    <table>
        <thead>
            <tr>
                <th style="width: 40%;">Metrik Aktivitas</th>
                <th style="width: 60%;">Keterangan Capaian</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Konsistensi Membaca</strong></td>
                <td>Berhasil menyelesaikan rata-rata 5 bab per hari dalam seminggu terakhir.</td>
            </tr>
            <tr>
                <td><strong>Fokus Genre Terbanyak</strong></td>
                <td>Didominasi oleh genre <strong>Fantasi</strong> dan <strong>Romance</strong>.</td>
            </tr>
            <tr>
                <td><strong>Status Akun</strong></td>
                <td>Pembaca Aktif Naratia</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        Dokumen ini dihasilkan secara otomatis oleh sistem Naratia. <br>
        &copy; {{ date('Y') }} Naratia E-Library. All rights reserved.
    </div>

    <!-- SCRIPT POP-UP PRINT INSTAN -->
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>