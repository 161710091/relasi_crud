@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Edit Data Dosen
						<div class="panel-title pull-right">
							<a href="{{route('dosens.index')}}">Kembali</a>
						</div>
					</div>
					<div class="panel-body">
						<form action="{{ route('dosens.update', $dosens->id) }}" method="post">
							<input type="hidden" name="_method" value="PATCH">
							{{ csrf_field() }}

							<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
								<label class="control-label">Nama</label>
								<input type="text" name="nama" class="form-control" value="{{ $dosens->nama }}" required>
								@if ($errors->has('nama'))
									<span class="help-block">
										<strong>{{ $errors->first('nama') }}</strong>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('nipd') ? 'has-error' : '' }}">
								<label class="control-label">NIPD</label>
								<input type="number" name="nipd" class="form-control" value="{{ $dosens->nipd }}" required>
								@if ($errors->has('nipd'))
									<span class="help-block">
										<strong>{{ $errors->first('nipd') }}</strong>
									</span>
								@endif
							</div>

							<div>
								<button type="submit" class="btn btn-primary">Edit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection