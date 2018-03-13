@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Data Wali
						<div class="panel-title pull-right">
							<a href="{{route('walis.create')}}">Tambah</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Nama Siswa</th>
										<th colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
									@php
										$no = 1;
									@endphp
									@foreach ($walis as $data)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $data->nama }}</td>
										<td>{{ $data->siswa->nama }}</td>
										<td>
											<a href="{{ route('walis.edit', $data->id) }}" class="btn btn-warning">Edit</a>
										</td>
										<td>
											<a href="{{ route('walis.show', $data->id) }}" class="btn btn-success">Show</a>
										</td>
										<td>
											<form action="{{ route('walis.destroy', $data->id) }}" method="post">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="_method" value="DELETE">
												<button type="submit" class="btn btn-danger">Delete</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection