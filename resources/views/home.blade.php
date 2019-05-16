@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center"><h1 >List of Questions</h1>

                <form style="text-align: right;" action="{{url('/add')}}" method="post" >
                {{ csrf_field() }}
    <input style="color: #87a4de;border-radius: 15px;border-color: #87a4de;" type="submit" value="Add Qst!" />
</form>
<br>
<form style="text-align:right;" action="{{url('/show')}}" method="get" >
{{ csrf_field() }}
    <input  style="color: #87a4de;border-radius: 15px;border-color: #87a4de;" type="submit" value="show  Qst!" />
</form>
<br>
<form style="text-align:right;" action="{{url('/show_rslt')}}" method="get" >
{{ csrf_field() }}
    <input  style="color: #87a4de;border-radius: 15px;border-color: #87a4de;" type="submit" value="show  rslt!" />
</form>
<br>
                </div>
              
               
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                  
                    <table style="width:1000px">
  <tr>
  <th>#Id</th>
    <th>Question</th>
    <th >Date</th>
  </tr>
  @foreach($qsts as $qst)
  <tr>
  <td>{{$qst->id}}</td>
    <td>{{$qst->quetion}}</td>
    <td>{{$qst->date}}</td>
    
  </tr>
  @endforeach
</table> 
                   

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
