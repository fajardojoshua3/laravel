@extends('layouts.app')

@section('content')


<div class="loaderCon">
    <div class="loader">

    </div>
    <p>Please Wait..</p>
</div>


<div class="container" hidden="hidden">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class='alert alert-success'>
                            {{session('success')}}
                        </div>
                    @endif


                    @if(session('error'))
                        <div class='alert alert-danger'>
                            {{session('error')}}
                        </div>
                    @endif

                    
                    <form action="home" method='POST' enctype="multipart/form-data">
                    {{csrf_field()}}
                     <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Browse  File</span>
                    
                        <input type="file" name="zip" class="form-control-file" >
                    <br><br>
                    </div>
                              
                            <input type='submit' class="btn btn-primary" id='wew' value="Upload File">
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('tb')
<div class='container sc' hidden="hidden">
<div class='row'>
<div class="col-md-8 col-lg-12 col-sm-8">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Data_ID</th>
                <th>File_Path</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dato as $datas)
            <tr>
                <td>{{$datas->id}}</td>
                <td>{{$datas->directory_path}}</td>
                <td><a href="home/{{$datas->id}}/edit">Update</a></td>
            </tr>
        @endforeach
            <!-- <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                
            </tr> -->
         
            
            </tbody>

            </table>
            <p></p>
</div>
</div>

</div>

@endsection

