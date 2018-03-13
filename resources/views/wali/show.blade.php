@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Show Data Wali
						<div class="panel-title pull-right">
							<a href="{{route('walis.index')}}">Kembali</a>
						</div>
					</div>
					<div class="panel-body">

						<div class="form-group">
							<label class="control-label">Nama</label>
							<input type="text" name="nama" class="form-control" value="{{ $walis->nama }}" readonly>
						</div>

						<div class="form-group">
							<label class="control-label">Nama Siswa</label>
							<input type="text" name="id_siswa" class="form-control" value="{{ $walis->siswa->nama }}" readonly>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection