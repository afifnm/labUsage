<div class="col-xxl">
	<div class="card mb-4">
		<div class="card-header d-flex align-items-center justify-content-between">
			<h5 class="mb-0"><?= $title?></h5>
		</div>
		<div class="card-body">
			<form>
            <div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="basic-default-name">Username</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Masukan Username" name='username'>
					</div>
				</div>
                <div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Masukan Nama" name='nama'>
					</div>
				</div>
                <div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="basic-default-name">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" placeholder="Masukan password" name='password'>
					</div>
				</div>
				<div class="row justify-content-end">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Send</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>