@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                @if(Auth::check())
                <div class="row">
                    
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="{{route('dodano_2019')}}">Dodane 2019</a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="{{route('dodano_2020')}}">Dodane 2020</a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="{{route('zaplacone')}}">Zapłacone</a>
                    </div>
                </div>
                @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(Auth::check())

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Imie</th>
                                <th>Nazwisko</th>
                                <th>E-mail</th>
                                <th>Status zapłaty</th> -->
                            </tr>
                        </thead>
                       
                        <tbody>
                        @foreach($data as $val)
                            <tr ondblclick="window.location.href='/dane/person/{{$val->id}}'">
                                <td>{{$val->imie}}</td>
                                <td>{{$val->nazwisko}}</td>
                                <td>{{$val->email}}</td>
                                <td><?=($val->zaplata==0)? "niezapłacono":"zapłacono"?></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @else
                    You are not logged in!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection