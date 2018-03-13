@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Show Data Siswa
						<div class="panel-title pull-right">
							<a href="{{route('siswas.index')}}">Kembali</a>
						</div>
					</div>
					<div class="panel-body">

						<div class="form-group">
							<label class="control-label">Nama</label>
							<input type="text" name="nama" class="form-control" value="{{ $siswas->nama }}" readonly>
						</div>

						<div class="form-group">
							<label class="control-label">NIS</label>
							<input type="text" name="nis" class="form-control" value="{{ $siswas->nis }}" readonly>
						</div>

						<div class="form-group">
							<label class="control-label">Nama Dosen</label>
							<input type="text" name="id_dosen" class="form-control" value="{{ $siswas->dosen->nama }}" readonly>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection