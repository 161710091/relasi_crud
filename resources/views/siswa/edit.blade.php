@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Edit Data Siswa
						<div class="panel-title pull-right">
							<a href="{{route('siswas.index')}}">Kembali</a>
						</div>
					</div>
					<div class="panel-body">
						<form action="{{ route('siswas.update', $siswas->id) }}" method="post">
							<input type="hidden" name="_method" value="PATCH">
							{{ csrf_field() }}

							<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
								<label class="control-label">Nama</label>
								<input type="text" name="nama" class="form-control" value="{{ $siswas->nama }}" required>
								@if ($errors->has('nama'))
									<span class="help-block">
										<strong>{{ $errors->first('nama') }}</strong>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('nis') ? 'has-error' : '' }}">
								<label class="control-label">NIS</label>
								<input type="number" name="nis" class="form-control" value="{{ $siswas->nis }}" required>
								@if ($errors->has('nis'))
									<span class="help-block">
										<strong>{{ $errors->first('nis') }}</strong>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('id_dosen') ? 'has-error' : '' }}">
								<label class="control-label">Nama Dosen</label>
								<select name="id_dosen" class="form-control" required>
									@foreach($dosens as $data)
										<option value="{{ $data->id }}" {{ $selected == $data->id ? 'selected="selected"' : '' }}>
											{{ $data->nama }}
										</option>
									@endforeach
								</select>
								@if($errors->has('id_dosen'))
									<span class="help-block">
										<strong>{{ $errors->first('id_dosen') }}</strong>
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