@extends('template')

@push('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='/css/dash.css' type='text/css' rel='stylesheet'>
    <link href='/dropzone/dist/basic.css' type='text/css' rel='stylesheet'>
    <link href='/dropzone/dist/dropzone.css' type='text/css' rel='stylesheet'>
    <link  href="/cropperjs/dist/cropper.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/9q2wmbwknlog4vltrb8u9ldfc2ws9l1d6pou2ilfbxg8l3vk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/dropzone/dist/dropzone.js"></script>
    <script src="/cropperjs/dist/cropper.js"></script>
    <script>
        var user = {!! auth()->user()->toJson() !!}["id"];
    </script>
    <script src="js/acc.js"></script>
@endpush

@section('data')
    @if(Auth::check())
        <div class="modal-backdrop" aria-hidden="true"></div>
        <div class="card">
            <div class="card-header">
                <h2>{{ __('Dashboard') }}</h2>
            </div>
            <div class="card-body bs-docs-section">
                    <h3>{{ __('Welcome ')  }}{{Auth::user()["name"]}}{{ __('!')  }}</h3>
                    <div class ="row">


                        <div class="col-lg-4">
                            <br>
                            <a href="#" id="upload-file-but">
                                <image id="profilepic" class="profilepic" src='/profiles/{{Auth::user()["profilefile"]}}'></image>
                            </a>
                            <br>
                            <br>
                        </div>

                        <div class="modal js-upload-file">
                            <div class="modal-dialog" role="dialog" aria-hidden="true">
                                <div class="modal-content" id="modal1">
                                    <div class="modal-header">

                                        <h3 class="modal-title">upload a new profile picture</h3>
                                    </div>
                                    <div class="modal-body">

                                        <form id="myDropzone" action="/account/profileimgsave" class="dropzone" method="post" enctype="multipart/form-data">
                                            @csrf <!-- {{ csrf_field() }} -->
                                            <input id="user" name="user" type="hidden"/>
                                            <div class="fallback">
                                                <input name="profilefile" type="file" />
                                            </div>
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button id="saveprofilefile" class="btn btn-primary">
                                        exit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal js-crop-file">
                            <div class="modal-dialog" role="dialog" aria-hidden="true">
                                <div class="modal-content" id="modal2">
                                    <div class="modal-header">

                                        <h3 class="modal-title">crop your profile picture</h3>
                                    </div>
                                    <div class="modal-body" id="cropdiv0">
                                        <div id="cropdiv">
                                            <img id="cropimage" src="/profiles/default.jpeg">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="cropprofilefile" class="btn btn-primary">
                                        save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" id="profilebut" href="#profile">profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" id="settingsbut" href="#settings">account settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#">posts</a>
                                </li>
                            </ul>


                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade active show" id="profile">
                                    <br>
                                    @if(strlen(strip_tags(Auth::user()["about"]))>14)
                                        <h4>about</h4>
                                        <div class="form-group">
                                            <textarea id="editor2">{!! Auth::user()["about"] !!}</textarea>
                                        </div>
                                    @endif
                                    @if(strlen(Auth::user()["location"])>0)
                                        <br>
                                        <div class ="row">
                                            <div class="col-lg-1">
                                                <i class="fas fa-map-marker-alt" style="font-size:30px;"></i></a><span>
                                            </div>
                                            <div class="col-lg-7">
                                                <h5>
                                                {{Auth::user()["location"]}}
                                                </h5>
                                            </div>
                                        </div>
                                        <br>
                                    @endif
                                    @if(strlen(strip_tags(Auth::user()["about"]))<=14 and strlen(Auth::user()["location"])==0)
                                        <h4>Your profile is looking a little empty right now. Add some facts so others can learn about you!</h4>
                                    @endif

                                </div>

                                <!--EDITING-->
                                <div class="tab-pane" id="profileedit">
                                    <form method="post" action="{{url('account/profilesave')}}" enctype="multipart/form-data"
                                          id="profileform">
                                    @csrf <!-- {{ csrf_field() }} -->
                                        <br>
                                        <input type="hidden" id='abouti' name='abouti'/>
                                        <input type="hidden" name="showmail"  id='showmaili'>
                                        <input type="hidden" name="showloc" id='showloci'>
                                        <label><h4>about</h4></label>
                                        <div class="form-group">
                                            <textarea id="editor" maxlength=1000>{!! Auth::user()["about"] !!}</textarea>
                                        </div>
                                        <br>
                                        <div class ="row">
                                            <div class="col-lg-1">
                                                <i class="fas fa-map-marker-alt" style="font-size:35px;"></i></a><span>
                                            </div>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="locationin" type="text" value="{{Auth::user()["location"]}}" name="locationin" />
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="showloca">
                                                    {{ ('show others my location?') }}
                                                </label>
                                            </div>
                                            <div class="col-lg-1">
                                                @if(Auth::user()["showloc"]==0)
                                                    <input class="checky" type="checkbox" id="showloca"/>
                                                @else
                                                    <input class="checky" type="checkbox" id="showloca" checked/>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="showmail">
                                                    {{ ('show others my email?') }}
                                                </label>
                                            </div>
                                            <div class="col-lg-1">
                                                @if(Auth::user()["showemail"]==0)
                                                    <input class="checky" type="checkbox" id="showmail"/>
                                                @else
                                                    <input class="checky" type="checkbox" id="showmail" checked/>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>



                                <div class="tab-pane fade" id="settings">
                                    <br>
                                    <div class="form-group">

                                        <fieldset disabled="">
                                            <div class ="row">
                                                <div class="col-lg-8">
                                                <label class="form-label" for="disabledInput">Name</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="{{Auth::user()["name"]}}" disabled="">
                                                </div>
                                            </div>
                                            <br>
                                            <div class ="row">
                                                <div class="col-lg-1">
                                                    <i class="far fa-envelope" style="font-size:35px;"></i></a><span>
                                                </div>
                                                <div class="col-lg-7">
                                                    <input class="form-control" id="disabledEmail" type="text" placeholder="{{Auth::user()["email"]}}" disabled="">
                                                </div>
                                            </div>
                                                <br>
                                                <div class ="row">
                                                    <div class="col-lg-1">
                                                        <i class="fas fa-key" style="font-size:35px;"></i></a><span>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input class="form-control" type="password" placeholder="••••••••" disabled="">
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="tab-pane" id="settingsedit">
                                    <br>
                                    <div class ="row">
                                        <div class="col-lg-8">
                                            <label class="form-label" for="nameInput">Name</label>
                                            <input class="form-control" id="nameInput" type="text" value="{{Auth::user()["name"]}}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class ="row">
                                        <div class="col-lg-1">
                                            <i class="far fa-envelope" style="font-size:35px;"></i></a><span>
                                        </div>
                                        <div class="col-lg-7">
                                            <input class="form-control" id="inputEmail" type="text" value="{{Auth::user()["email"]}}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class ="row">
                                        <div class="col-lg-1">
                                            <i class="fas fa-key" style="font-size:35px;"></i></a><span>
                                        </div>
                                        <div class="col-lg-7">
                                            <input class="form-control" type="password" placeholder="">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <br>
                        </div>






                        <div class="col-lg-2">

                            <div id="editprofilediv">
                                <button id="editprofile" class="btn btn-primary">
                                    edit profile
                                </button>
                            </div>
                            <div id="editsettingsdiv">
                                <button id="editsettings" class="btn btn-primary">
                                    edit settings
                                </button>
                            </div>
                            <div id="saveprofilediv">
                                <button id="saveprofile" type="submit" class="btn btn-primary" form="profileform">
                                    save
                                </button>
                            </div>
                            <div id="savesettingsdiv">
                                <button id="savesettings" class="btn btn-primary">
                                    save
                                </button>
                            </div>




                            <br>
                        </div>
                    </div>
            </div>
        </div>
    @else
        <?php
            header("Location: /login");
        die();
        ?>
    @endif
@endsection
