@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Edit Data Wali
						<div class="panel-title pull-right">
							<a href="{{route('walis.index')}}">Kembali</a>
						</div>
					</div>
					<div class="panel-body">
						<form action="{{ route('walis.update', $walis->id) }}" method="post">
							<input type="hidden" name="_method" value="PATCH">
							{{ csrf_field() }}

							<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
								<label class="control-label">Nama</label>
								<input type="text" name="nama" class="form-control" value="{{ $walis->nama }}" required>
								@if ($errors->has('nama'))
									<span class="help-block">
										<strong>{{ $errors->first('nama') }}</strong>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('id_siswa') ? 'has-error' : '' }}">
								<label class="control-label">id_siswa</label>
								<select class="form-control" name="id_siswa" required>
									@foreach($siswas as $data)
										<option value="{{ $data->id }}" {{ $selected == $data->id ? 'selected="selected"' : '' }}>
											{{ $data->nama }}
										</option>
									@endforeach
								</select>
								@if ($errors->has('id_siswa'))
									<span class="help-block">
										<strong>{{ $errors->first('id_siswa') }}</strong>
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