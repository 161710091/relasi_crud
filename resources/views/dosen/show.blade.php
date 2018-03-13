@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Show Data Dosen
						<div class="panel-title pull-right">
							<a href="{{route('dosens.index')}}">Kembali</a>
						</div>
					</div>
					<div class="panel-body">

						<div class="form-group">
							<label class="control-label">Nama</label>
							<input type="text" name="nama" class="form-control" value="{{ $dosens->nama }}" readonly>
						</div>

						<div class="form-group">
							<label class="control-label">NIPD</label>
							<input type="text" name="nipd" class="form-control" value="{{ $dosens->nipd }}" readonly>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection