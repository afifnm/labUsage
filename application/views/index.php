<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penggunaan Lab Komputer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">PENGGUNAAN LAB. KOMPUTER RPL</h1>
        <button id="openModal" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">TAMBAH PENGGUNAAN</button>
		<div class="overflow-x-auto mt-6">
			<table id="labTable" class="min-w-full bg-white border border-gray-300">
				<thead class="bg-gray-100">
					<tr class="text-left">
						<th class="py-2 px-4 border-b">No</th>
						<th class="py-2 px-4 border-b">Nama Lab</th>
						<th class="py-2 px-4 border-b">Nama Guru</th>
						<th class="py-2 px-4 border-b">Mata Pelajaran</th>
						<th class="py-2 px-4 border-b">Tanggal</th>
						<th class="py-2 px-4 border-b">Jam Mulai</th>
						<th class="py-2 px-4 border-b">Jam Selesai</th>
						<th class="py-2 px-4 border-b">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($penggunaan_lab as $key => $row): ?>
						<tr>
							<td class="py-2 px-4 border-b"><?= $key + 1; ?></td>
							<td class="py-2 px-4 border-b"><?= $row['lab_name']; ?></td>
							<td class="py-2 px-4 border-b"><?= $row['guru_name']; ?></td>
							<td class="py-2 px-4 border-b"><?= $row['nama_pelajaran']; ?></td>
							<td class="py-2 px-4 border-b"><?= date('l, d F Y', strtotime($row['start_time'])); ?></td>
							<td class="py-2 px-4 border-b"><?= date('H:i', strtotime($row['start_time'])); ?></td>
							<td class="py-2 px-4 border-b"><?= date('H:i', strtotime($row['end_time'])); ?></td>
							<td class="py-2 px-4 border-b">
								<a href="<?= base_url('home/detail/'.$row['penggunaan_id']); ?>" class="text-blue-500 hover:underline">Detail</a>
								<button 
									class="ml-1 text-red-500 hover:underline"
									onclick="confirmDelete('<?= $row['penggunaan_id']; ?>')">
									Hapus
								</button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
        </div>
    </div>
    <div id="inputModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h2 class="text-2xl font-bold mb-4">Tambah Penggunaan Lab</h2>
                <form id="labForm" class="space-y-4" action="<?= base_url('home/simpan') ?>" method="post">
                    <div>
                        <label for="lab" class="block text-sm font-medium text-gray-700">Pilih Lab</label>
                        <select id="lab_id" name="lab_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
							<?php foreach ($labs as $lab): ?>
								<option value="<?= $lab['lab_id']; ?>"><?= $lab['lab_name']; ?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="guru" class="block text-sm font-medium text-gray-700">Pilih Guru</label>
                        <select id="guru" name="guru_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
							<?php foreach ($guru as $row): ?>
								<option value="<?= $row['guru_id']; ?>"><?= $row['name']; ?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="mata_pelajaran" class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
                        <select id="mata_pelajaran" name="pelajaran_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
						<?php foreach ($mata_pelajaran as $row): ?>
								<option value="<?= $row['pelajaran_id']; ?>"><?= $row['nama_pelajaran']; ?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="start_time" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                        <input type="datetime-local" id="start_time" name="start_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="end_time" class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                        <input type="datetime-local" id="end_time" name="end_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="activity" class="block text-sm font-medium text-gray-700">Aktivitas</label>
                        <textarea rows=5 name="activity" id="activity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="w-full py-2 px-4 bg-green-600 text-white rounded-md hover:bg-green-700">Simpan</button>
                    </div>
                </form>
                <button id="closeModal"  class="mt-4 w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700">Tutup</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#labTable').DataTable();
            $('#openModal').click(function () {
                $('#inputModal').removeClass('hidden');
            });
            $('#closeModal').click(function () {
                $('#inputModal').addClass('hidden');
            });
			// Menampilkan flashdata dengan SweetAlert
			<?php if ($this->session->flashdata('success')): ?>
                Swal.fire({
                    title: 'Berhasil!',
                    text: '<?= $this->session->flashdata('success'); ?>',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                Swal.fire({
                    title: 'Gagal!',
                    text: '<?= $this->session->flashdata('error'); ?>',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            <?php endif; ?>
        });
    </script>
<script>
function confirmDelete(penggunaanId) {
    Swal.fire({
        title: 'Masukkan Kode PIN',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        preConfirm: (pin) => {
            if (pin === '8080') {
                // Redirect ke URL untuk menghapus penggunaan lab
                window.location.href = '<?= base_url('home/delete/'); ?>' + penggunaanId; // Ganti controller_name dengan nama controller yang sesuai
            } else {
                Swal.showValidationMessage('Kode PIN salah!');
            }
        }
    });
}
</script>
<!-- Modal Activity -->
<div id="activityModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h2 class="text-2xl font-bold mb-4">Keterangan</h2>
                <pre id="activityText" class="whitespace-pre-line"></pre> <!-- Tempat untuk aktivitas -->
                <div class="mt-4">
                    <button id="closeActivityModal" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showActivity(activity) {
            document.getElementById('activityText').innerText = activity; // Menyimpan aktivitas ke dalam elemen
            document.getElementById('activityModal').classList.remove('hidden'); // Menampilkan modal
        }

        document.getElementById('closeActivityModal').addEventListener('click', function() {
            document.getElementById('activityModal').classList.add('hidden'); // Menyembunyikan modal
        });

        $(document).ready(function () {
            $('#labTable').DataTable();
            $('#openModal').click(function () {
                $('#inputModal').removeClass('hidden');
            });
        });
    </script>
</body>
</html>