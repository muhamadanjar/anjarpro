@extends('app2')
@section('content')
<div class="panel panel-info">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-bubble4"></i> Berita</h6>
    </div>
    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="{{ route('postsaveedit') }}">
    <div class="panel-body">             
        <div class="row">
            <div class="col-md-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="hidden" name="postid" value="{{ $post->postid }}" />
                            <label for="posttitle" class="col-md-2 control-label">Judul</label>
                            <div class="col-md-8">
                                 <input id="posttitle" name="posttitle" class="form-control" value="{{ $post->posttitle }}" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="col-md-2 control-label">Deskripsi</label>
                            <div class="col-md-8">
                                 <textarea id="postcontent" class="tinymce_anjarpro" name="postcontent" class="form-control">{{ $post->postcontent }}</textarea>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="tag" class="col-md-2 control-label">Tag</label>
                            <div class="col-md-2">
                                {!! $tags !!}
                            </div>
                        </div>   
                        <div class="form-group">
                            <label for="image" class="col-md-2 control-label">Image</label>
                            <div class="col-md-4">
                                <input id="image" name="image" type="file" class="styled form-control"/>

                            </div>
                            @if($post->image != null)
                                <div class="col-md-4">
                                    <div><img width="200" src="{{ asset('images/'.$post->image) }}"></div>
                                </div>
                            @endif
                        </div>
                        <input id="postparent" type="hidden" name="postparent" value="0" class="form-control"/>
                        <input id="posttype" type="hidden" name="posttype" value="post" class="form-control"/>

                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                  
                    
            </div>
            
                
            
            <div class="col-md-4">
                <div class="panel panel-primary">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-file"></i> Pengaturan</h6>
                </div>
                <div class="panel-body">
                   
                    <div class="form-group">
                        <label for="kategori" class="col-md-2 control-label">Kategori:</label>
                        <div class="col-md-10">
                            <!--<div class="block-inner">
                                <label class="checkbox-inline checkbox-success">
                                
                                                
                                </label>
                            </div>-->
                            {!! $kategori !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Comment Status: </label>
                        <div class="col-sm-10">
                            <select name="commentstatus" data-placeholder="Comment Status..." class="select-full" tabindex="2">
                                <option value=""></option> 
                                <option value="open">Open</option> 
                                <option value="close">Close</option> 
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Status: </label>
                        <div class="col-sm-10">
                            <select name="poststatus" data-placeholder="Status..." class="select-full" tabindex="2">
                                <option value=""></option> 
                                <option value="publish">Publish</option> 
                                <option value="draft">Drafts</option> 
                            </select>
                        </div>
                    </div>
                </div>
                </div> 
            </div>
            
        </div>
    </div>
    </form>
</div>
@stop