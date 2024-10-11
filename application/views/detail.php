<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Penggunaan Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <?php if ($penggunaan_lab): ?>
            <div class="bg-white rounded-lg shadow-lg p-6 mt-5">
    <h2 class="text-2xl font-bold mb-4 border-b pb-2"><?= $penggunaan_lab['lab_name']; ?></h2>
    <table class="min-w-full">
        <tbody class="divide-y divide-gray-200">
            <tr>
                <td class="py-2 px-4 font-medium text-gray-700">Nama Guru:</td>
                <td class="py-2 px-4"><?= $penggunaan_lab['guru_name']; ?></td>
            </tr>
            <tr>
                <td class="py-2 px-4 font-medium text-gray-700">Mata Pelajaran:</td>
                <td class="py-2 px-4"><?= $penggunaan_lab['nama_pelajaran']; ?></td>
            </tr>
            <tr>
                <td class="py-2 px-4 font-medium text-gray-700">Tanggal:</td>
                <td class="py-2 px-4"><?= date('l, d F Y', strtotime($penggunaan_lab['start_time'])); ?></td>
            </tr>
            <tr>
                <td class="py-2 px-4 font-medium text-gray-700">Jam Mulai:</td>
                <td class="py-2 px-4"><?= date('H:i', strtotime($penggunaan_lab['start_time'])); ?></td>
            </tr>
            <tr>
                <td class="py-2 px-4 font-medium text-gray-700">Jam Selesai:</td>
                <td class="py-2 px-4"><?= date('H:i', strtotime($penggunaan_lab['end_time'])); ?></td>
            </tr>
            <tr>
                <td class="py-2 px-4 font-medium text-gray-700">Keterangan:</td>
                <td class="py-2 px-4">
                    <pre class="whitespace-pre-line bg-gray-100 p-2 rounded-md"><?= $penggunaan_lab['activity']; ?></pre>
                </td>
            </tr>
        </tbody>
    </table>
        <div class="mt-6">
            <a href="<?= base_url('home') ?>" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">Kembali</a>
        </div>
    </div>
        <?php else: ?>
            <p class="text-red-500">Data tidak ditemukan.</p>
            <div class="mt-4">
                <a href="<?= base_url('home') ?>" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Kembali</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
