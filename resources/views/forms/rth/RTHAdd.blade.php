@extends('app2')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">             
		<div class="row">
            <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            Ada data yang masih kosong
                        </div>
                    @else
                        
                    @endif
                    
                    <form class="form-horizontal rth" method="post" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="nama_rth" class="col-md-2 control-label">Nama Rth</label>
                            <div class="col-md-8">
                                 <input id="nama_rth" name="nama_rth" class="required form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelompok_rth" class="col-md-2 control-label">Kelompok Rth</label>
                            <div class="col-md-1">
                            
                                <select name="kelompok_rth" class="form-control" id="kelompok_rth">
                                    <option value="0"></option>
                                    <option value="publik">publik</option>
                                    <option value="privat">privat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan" class="col-md-2 control-label">Keluruhan</label>
                            <div class="col-md-2">
                                <select id="kelurahan" name="kelurahan" class="select-full">
                                    <option value="0">--------</option>
                                    @foreach($kelurahan as $key => $k)
                                        <option value="{{ $k->id }}">{{ $k->kelurahan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="luas_m2" class="col-md-2 control-label">Luas</label>
                            <div class="col-md-2">
                                 <input id="luas_m2" name="luas_m2" class="required form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kordinat_x" class="col-md-2 control-label">Kordinat X</label>
                            <div class="col-md-3">
                                 <input id="kordinat_x" name="kordinat_x" class="required form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kordinat_y" class="col-md-2 control-label">Kordinat Y</label>
                            <div class="col-md-3">
                                 <input id="kordinat_y" name="kordinat_y" class="required form-control"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="fungsi_rth" class="col-md-2 control-label">Fungsi Rth</label>
                            <div class="col-md-4">
                                <select id="fungsi_rth" name="fungsi_rth" class="fungsi_rth form-control">
                                    <option value="0">----</option>
                                    @foreach($fungsi as $key => $f)
                                    <option value="{{ $f->id }}">{{ $f->fungsirth }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="klasifikasi_rth" class="col-md-2 control-label">Klasifikasi Rth</label>
                            <div class="col-md-3">
                                <select id="klasifikasi_rth" name="klasifikasi_rth" class="klasifikasi_rth form-control">
                                    <option value="0">----</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vegetasi" class="col-md-2 control-label">Vegetasi</label>
                            <div class="col-md-8">
                                <input id="vegetasi" name="vegetasi" class="required form-control vegetasi" />
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="furniture" class="col-md-2 control-label">Furniture</label>
                            <div class="col-md-8">
                                <input id="furniture" name="furniture" class="required form-control furniture"/>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tahun_survey" class="col-md-2 control-label">Tahun Survey</label>
                            <div class="col-md-2">
                                <input id="tahun_survey" name="tahun_survey" maxlength="4" class="required form-control"/>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kepemilikan" class="col-md-2 control-label">Kepemilikan</label>
                            <div class="col-md-8">
                                <input id="kepemilikan" name="kepemilikan" maxlength="4" class="required form-control"/>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_link" class="col-md-2 control-label">Image</label>
                            <div class="col-md-3">
                                <input id="image_link" type="file" class="styled" name="image_link" />
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    
            </div>
        </div>
    </div>
</div>
@stop