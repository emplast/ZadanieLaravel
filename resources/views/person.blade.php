@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(Auth::check())
                <div class="card-header">

                    <div class="row">

                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="">Zapłacono:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="checkbox" id="zaplata" name="zaplata" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">

                            </div>

                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="row">
                                <div class="col-sm-8">
                                    <a href="#" class="btn btn-primary" id="btn_zaplata">Zaktualizuj</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif




                    <div class="container">
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Imie:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="imie" name="imie"
                                                placeholder="Imie" value="{{$data->imie}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Nazwisko:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nazwisko" name="nazwisko"
                                                placeholder="Nazwisko" value="{{$data->nazwisko}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Wiek:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="wiek" name="wiek"
                                                placeholder="Wiek" value="{{$data->wiek}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">E-mail:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="E-mail" value="{{$data->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Płeć męszczyzna:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="checkbox" id="plec" name="plec">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Dodane:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="dodano" name="dodano">
                                                <option value="2019" id="{{$data->dodano}}">2019</option>
                                                <option value="2020" id="{{$data->dodano}}">2020</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Komentarz:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <textarea name="komentarz" id="komentarz" cols="32" rows="5"
                                                placeholder="Komentarz"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>




                </div>
                @else
                You are not logged in!
                @endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {

    $('#btn_zaplata').on('click', function() {
        var value=(document.getElementById('zaplata').checked)?1:0;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/dane/ajax",
            type: "POST",
            data: {
                "zaplata": value,
                "id": '{{$data->id}}'
            },
            dataType: "text",
            success: function(msg) {
                console.log('Poprawnie edytowano dane użytkownika o id '+ msg +' !!!');
            },
            error: function() {
                console.log('error ajax zaplata');
            }
        });
    });
   
    
    $('#dodano').val({{$data->dodano}}).change();
    ({{$data->zaplata}}===1)?$('#zaplata').prop('checked',true):$('#zaplata').prop('checked',false);
    ({{$data->plec}}===1)?$('#plec').prop('checked',true):$('#plec').prop('checked',false);
});
</script>
@endsection