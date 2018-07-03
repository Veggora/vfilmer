@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="display-4">Witamy w internetowym serwisie VFilmer</h1>
        <hr>
        <div class="row">
            @guest
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-unlock"></i>
                                </div>
                                <div class="card-footer">
                                    <h3>
                                        <a href="{{route('login')}}" class="btn btn-lg btn-primary btn-block">Zaloguj
                                            się</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <i class="fas fa-sign-in-alt"></i>
                            </div>
                            <div class="card-footer">
                                <h3>
                                    <a href="{{route('register')}}" class="btn btn-lg btn-primary btn-block">Zarejestruj
                                        się</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <i class="fas fa-film"></i>
                            </div>
                            <div class="card-footer">
                                <h3>
                                    <a href="{{route('films.index')}}" class="btn btn-lg btn-primary btn-block">Przeglądaj filmy</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endguest
            <div class="@guest col-md-6 @elseguest col-md-12 @endguest">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non eleifend tortor, quis mollis
                    turpis. Aenean ullamcorper tristique nulla ac congue. Cras vulputate, nisi ac consectetur hendrerit,
                    nibh ex rutrum arcu, sit amet eleifend lorem arcu et velit. Nulla ultricies pulvinar tellus. Duis
                    varius eleifend sagittis. Vestibulum in dignissim sapien, sit amet lobortis leo. Proin eu feugiat
                    purus. Integer accumsan erat eu ex rutrum dignissim. Fusce aliquam ipsum a risus faucibus rutrum.
                    Nulla velit lorem, porttitor a iaculis in, convallis eget arcu. Etiam in magna tempus, pulvinar
                    velit in, molestie neque.

                    Aenean pharetra efficitur nisl, fermentum vestibulum dolor placerat in. Etiam id lorem nec est
                    consectetur pellentesque. Nunc quis lobortis elit. Cras mattis odio sit amet felis placerat, at
                    tempor dui fermentum. Etiam nibh purus, venenatis nec nisi eget, pellentesque lobortis leo. Donec
                    laoreet gravida tortor vel efficitur. Curabitur vitae luctus diam. In vitae augue id nisi hendrerit
                    blandit a eu velit. Sed et sapien libero. Praesent fringilla id turpis et imperdiet. Quisque
                    fermentum consequat eros. Donec pulvinar bibendum ultrices. Duis euismod dapibus tristique.

                    In eleifend diam quis quam luctus, non molestie leo aliquam. Nam suscipit, purus quis fermentum
                    auctor, augue nibh tincidunt nisl, vel luctus ex lorem id metus. Vivamus eu aliquet ipsum. Curabitur
                    congue est at iaculis vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                    posuere cubilia Curae; Pellentesque id accumsan ipsum, non dapibus risus. Aenean eget molestie quam.
                    Quisque tristique neque et neque eleifend blandit. Proin tristique, risus malesuada feugiat
                    hendrerit, dolor odio ultricies elit, ut rutrum ipsum nisi sed quam. Donec scelerisque sapien at
                    tincidunt viverra. Cras eleifend eu diam in porta. Maecenas dapibus vel lectus ut elementum. Sed
                    volutpat erat a massa posuere, ac viverra nisl laoreet.
                </p>
            </div>
        </div>
    </div>
@endsection
