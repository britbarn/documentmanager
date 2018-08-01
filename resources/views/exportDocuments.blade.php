@extends('theme.default')
@section('content')

<div class="row">
    <div class="col-lg-12">
           <h1 class="page-header">Document Export</h1>
    </div>
</div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th class="header">Name</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($documents as $document)
            <tr>
              <td>{{$document->name}}</td>
              <td><a class="btn btn-primary" href="/download-document/{{$document->id}}" role="button">Download CSV</a></td>
              <td><a class="btn btn-primary" href="/upload-document/{{$document->id}}" role="button">Upload to Cloud</a></td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
