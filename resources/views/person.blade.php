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
                                        <input type="checkbox" id="check_zaplata" value="1">
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
                                    <a href="#" class="btn btn-primary" id="btn_zaplata">Edytuj</a>
                                    <a href="#" class="btn btn-danger" id="btn_usun">Usuń</a>
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
                                            <input type="text" class="form-control" id="f_imie" name="imie"
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
                                            <input type="text" class="form-control" id="f_nazwisko" name="nazwisko"
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
                                            <input type="text" class="form-control" id="f_wiek" name="wiek"
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
                                            <input type="email" class="form-control" id="f_email" name="email"
                                                placeholder="E-mail" value="{{$data->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Płeć:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label for="kobieta">Kobieta
                                                <input type="checkbox" id="f_kobieta" >
                                            </label>
                                            <label for="meszczyzna">Męszczyzna
                                                <input type="checkbox" id="f_meszczyzna">
                                            </label>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Dodane:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="f_dodano" name="dodano">
                                                <option value="2019" >2019</option>
                                                <option value="2020" >2020</option>
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
                                            <textarea name="komentarz" id="f_komentarz" cols="32" rows="5"
                                                placeholder="Komentarz">{{$data->komentarz}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="f_plec" id="f_plec">
                                
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

    ({{$data->zaplata}}===1)?$('#check_zaplata').prop('checked',true):$('#check_zaplata').prop('checked',false);
    $('#f_plec').val({{$data->plec}});
    
    $('#f_dodano').val({{$data->dodano}}).change();
    
    if({{$data->plec}}=="0"){
        $('#f_kobieta').prop('checked',true);
        $('#f_meszczyzna').prop('checked',false);
       
    }
    else {
        $('#f_meszczyzna').prop('checked',true);
        $('#f_kobieta').prop('checked',false);
       
    }
    $('#f_meszczyzna').on('change', function() {
            if ($('#f_meszczyzna').prop('checked') == true) {
                $('#f_kobieta').prop('checked', false);
                $('#f_plec').val(1);
            }
        });
    $('#f_kobieta').on('change', function() {
            if ($('#f_kobieta').prop('checked') == true) {
                $('#f_meszczyzna').prop('checked', false);
                $('#f_plec').val(0);
            }
        });
    
   



    $('#btn_zaplata').on('click', function() {

        ($('#check_zaplata').prop('checked') === true) ?
        $('#zaplata').val(1):
            $('#zaplata').val(0);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/dane/ajaxEdytuj",
            type: "POST",
            data: {
                "zaplata": $('#zaplata').val(),
                "id": '{{$data->id}}',
                "imie":$('#f_imie').val(),
                "nazwisko":$('#f_nazwisko').val(),
                "plec":$('#f_plec').val(),
                "wiek":$('#f_wiek').val(),
                "email":$('#f_email').val(),
                "dodano":$("#f_dodano").val(),
                "komentarz":$("#f_komentarz").val()
            },
            dataType: "text",
            success: function(msg) {
                console.log('Poprawnie edytowano dane użytkownika o id ' + msg + ' !!!');
            },
            error: function() {
                console.log('error ajax edit');
            }
        });

       
    });
    $('#btn_usun').on('click',function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/dane/ajaxUsun",
            type: "POST",
            data: {
                "id": '{{$data->id}}',
            },
            dataType: "text",
            success: function(msg) {
                console.log('Poprawnie usunięto dane użytkownika o id ' + msg + ' !!!');
                if($('#f_dodano').val()==2019){
                    window.location.href='/dane/dodano_2019';
                }
                if($('#f_dodano').val()==2020){
                    window.location.href='/dane/dodano_2020';
                }
            },
            error: function() {
                console.log('error ajax zaplat');
            }
        });
    });
    

});
</script>
@endsection