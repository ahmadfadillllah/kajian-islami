@include('dashboard.layout.head', ['title' => 'Masjid'])
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="page-body">
    <br>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="email-wrap bookmark-wrap">
            <div class="row">
                <div class="col-xl-12 col-md-12 box-col-12">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body radius-left">
                            <div class="ps-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                                        aria-labelledby="pills-created-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex mb-0 card-no-border">
                                                <h3 class="mb-0">Daftar Masjid</h3>
                                                <ul>
                                                    @if (Auth::user()->role == 'Admin')
                                                    <li>
                                                        <a class="grid-bookmark-view active" href="#" data-bs-toggle="modal" data-bs-target="#insertMasjid">
                                                            <i class="fi fi-rr-add" style="font-size: 20px;"></i>
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @include('masjid.modal.insert')
                                                    <li>
                                                        <a class="grid-bookmark-view active" href="javascript:void(0)">
                                                            <i data-feather="grid"></i>
                                                    </a>
                                                    </li>
                                                    <li><a class="list-layout-view" href="javascript:void(0)"><i
                                                                data-feather="list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body pb-0">
                                                <div class="details-bookmark text-center">
                                                    <div class="row" id="bookmarkData">
                                                        @foreach ($dataMasjid as $dm)
                                                        <div class="col-xxl-3 col-md-4 col-ed-4 col-sm-6">
                                                            <div
                                                                class="card card-with-border bookmark-card overflow-hidden">
                                                                <div class="details-website"><img class="img-fluid"
                                                                        src="{{ asset('storage/' . $dm->gambar) }}"
                                                                        alt="" />
                                                                    <div class="favourite-icon favourite_0"
                                                                        onclick="setFavourite(0)"><a href="#"><i class="fi fi-rr-star"></i></a>
                                                                    </div>
                                                                    <div class="desciption-data">
                                                                        <div class="title-bookmark">
                                                                            <h5 class="title_0">{{ $dm->nama }}</h5>
                                                                            <p class="weburl_0">
                                                                                Pengurus: {{ $dm->nama_pengurus }}
                                                                            </p>
                                                                            <p class="weburl_0">
                                                                                {{ $dm->alamat }}
                                                                            </p>
                                                                            @if (Auth::user()->role == 'Admin')
                                                                                <div class="hover-block">
                                                                                    <ul>
                                                                                        <li><a href="#"><i data-feather="edit-2" data-bs-toggle="modal" data-bs-target="#editMasjid{{ $dm->uuid }}"></i></a>
                                                                                        </li>
                                                                                        <li><a href="#"><i data-feather="trash-2" data-bs-toggle="modal" data-bs-target="#deleteMasjid{{ $dm->uuid }}"></i></a>
                                                                                        </li>
                                                                                        <li><a href="#"><i data-feather="edit-3" data-bs-toggle="modal" data-bs-target="#editGambarMasjid{{ $dm->uuid }}"></i></a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            @endif
                                                                            <div class="content-general">
                                                                                <p class="desc_0">Pengurus: {{ $dm->nama_pengurus }}</p>
                                                                                <span class="collection_0">Imam Masjid: {{ $dm->imam }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @include('masjid.modal.edit')
                                                        @include('masjid.modal.delete')
                                                        @include('masjid.modal.editGambar')
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fade tab-pane" id="pills-favourites" role="tabpanel"
                                        aria-labelledby="pills-favourites-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex mb-0 card-no-border">
                                                <h3 class="mb-0">Favourites</h3>
                                                <ul>
                                                    <li><a class="grid-bookmark-view" href="#"><i
                                                                data-feather="grid"></i></a></li>
                                                    <li><a class="list-layout-view" href="#"><i
                                                                data-feather="list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="details-bookmark text-center">
                                                    <div class="row" id="favouriteData"></div>
                                                    <div class="no-favourite"><span>No Bookmarks
                                                            Found.</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fade tab-pane" id="pills-shared" role="tabpanel"
                                        aria-labelledby="pills-shared-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex mb-0 card-no-border">
                                                <h3 class="mb-0">Shared with me</h3>
                                                <ul>
                                                    <li><a class="grid-bookmark-view" href="#"><i
                                                                data-feather="grid"></i></a></li>
                                                    <li><a class="list-layout-view" href="#"><i
                                                                data-feather="list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="details-bookmark text-center"><span>No Bookmarks
                                                        Found.</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fade tab-pane" id="pills-bookmark" role="tabpanel"
                                        aria-labelledby="pills-bookmark-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex mb-0 card-no-border">
                                                <h3 class="mb-0">My bookmark</h3>
                                                <ul>
                                                    <li><a class="grid-bookmark-view" href="#"><i
                                                                data-feather="grid"></i></a></li>
                                                    <li><a class="list-layout-view" href="#"><i
                                                                data-feather="list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="details-bookmark text-center">
                                                    <div class="row" id="bookmarkData1">
                                                        <div class="col-xxl-3 col-md-4 col-ed-4 col-sm-6">
                                                            <div
                                                                class="card card-with-border bookmark-card overflow-hidden">
                                                                <div class="details-website"><img class="img-fluid"
                                                                        src="{{ asset('dashboard') }}/assets/images/lightgallry/07.jpg"
                                                                        alt="" />
                                                                    <div class="favourite-icon favourite_0"
                                                                        onclick="setFavourite(0)"><a href="#"><i
                                                                                class="fa-solid fa-star"></i></a>
                                                                    </div>
                                                                    <div class="desciption-data">
                                                                        <div class="title-bookmark">
                                                                            <h5 class="title_0">Admin
                                                                                Template</h5>
                                                                            <p class="weburl_0">
                                                                                http://admin.pixelstrap.com/Admiro/ltr/landing-page.html
                                                                            </p>
                                                                            <div class="hover-block">
                                                                                <ul>
                                                                                    <li><a href="#"
                                                                                            onclick="editBookmark(0)"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#edit-bookmark"><i
                                                                                                data-feather="edit-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="link"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="share-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="trash-2"></i></a>
                                                                                    </li>
                                                                                    <li class="pull-right text-end">
                                                                                        <a href="#"><i
                                                                                                data-feather="tag"></i></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="content-general">
                                                                                <p class="desc_0">Admiro is
                                                                                    beautifully crafted,
                                                                                    clean and modern
                                                                                    designed admin theme
                                                                                    with 6 different demos
                                                                                    and light - dark
                                                                                    versions.</p><span
                                                                                    class="collection_0">General</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-3 col-md-4 col-ed-4 col-sm-6">
                                                            <div
                                                                class="card card-with-border bookmark-card overflow-hidden">
                                                                <div class="details-website"><img class="img-fluid"
                                                                        src="{{ asset('dashboard') }}/assets/images/lightgallry/07.jpg"
                                                                        alt="" />
                                                                    <div class="favourite-icon favourite_1"
                                                                        onclick="setFavourite(1)"><a href="#"><i
                                                                                class="fa-solid fa-star"></i></a>
                                                                    </div>
                                                                    <div class="desciption-data">
                                                                        <div class="title-bookmark">
                                                                            <h5 class="title_1">Universal
                                                                                Template</h5>
                                                                            <p class="weburl_1">
                                                                                https://angular.pixelstrap.com/universal/landing
                                                                            </p>
                                                                            <div class="hover-block">
                                                                                <ul>
                                                                                    <li><a href="#"
                                                                                            onclick="editBookmark(1)"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#edit-bookmark"><i
                                                                                                data-feather="edit-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="link"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="share-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="trash-2"></i></a>
                                                                                    </li>
                                                                                    <li class="pull-right text-end">
                                                                                        <a href="#"><i
                                                                                                data-feather="tag"></i></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="content-general">
                                                                                <p class="desc_1">Universal
                                                                                    is beautifully crafted,
                                                                                    clean and modern
                                                                                    designed admin theme</p>
                                                                                <span
                                                                                    class="collection_1">General</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-3 col-md-4 col-ed-4 col-sm-6">
                                                            <div
                                                                class="card card-with-border bookmark-card overflow-hidden">
                                                                <div class="details-website"><img class="img-fluid"
                                                                        src="{{ asset('dashboard') }}/assets/images/lightgallry/07.jpg"
                                                                        alt="" />
                                                                    <div class="favourite-icon favourite_2"
                                                                        onclick="setFavourite(2)"><a href="#"><i
                                                                                class="fa-solid fa-star"></i></a>
                                                                    </div>
                                                                    <div class="desciption-data">
                                                                        <div class="title-bookmark">
                                                                            <h5 class="title_2">Angular
                                                                                Theme</h5>
                                                                            <p class="weburl_2">
                                                                                https://angular.pixelstrap.com/Admiro/landing
                                                                            </p>
                                                                            <div class="hover-block">
                                                                                <ul>
                                                                                    <li><a href="#"
                                                                                            onclick="editBookmark(2)"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#edit-bookmark"><i
                                                                                                data-feather="edit-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="link"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="share-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="trash-2"></i></a>
                                                                                    </li>
                                                                                    <li class="pull-right text-end">
                                                                                        <a href="#"><i
                                                                                                data-feather="tag"></i></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="content-general">
                                                                                <p class="desc_2">Admiro is
                                                                                    beautifully crafted,
                                                                                    clean and modern
                                                                                    designed admin theme</p>
                                                                                <span class="collection_2">Fs</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-3 col-md-4 col-ed-4 col-sm-6">
                                                            <div
                                                                class="card card-with-border bookmark-card overflow-hidden">
                                                                <div class="details-website"><img class="img-fluid"
                                                                        src="{{ asset('dashboard') }}/assets/images/lightgallry/07.jpg"
                                                                        alt="" />
                                                                    <div class="favourite-icon favourite_3"
                                                                        onclick="setFavourite(3)"><a href="#"><i
                                                                                class="fa-solid fa-star"></i></a>
                                                                    </div>
                                                                    <div class="desciption-data">
                                                                        <div class="title-bookmark">
                                                                            <h5 class="title_3">Multikart
                                                                                Admin</h5>
                                                                            <p class="weburl_3">
                                                                                http://themes.pixelstrap.com/multikart/back-end/index.html
                                                                            </p>
                                                                            <div class="hover-block">
                                                                                <ul>
                                                                                    <li><a href="#"
                                                                                            onclick="editBookmark(3)"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#edit-bookmark"><i
                                                                                                data-feather="edit-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="link"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="share-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="trash-2"></i></a>
                                                                                    </li>
                                                                                    <li class="pull-right text-end">
                                                                                        <a href="#"><i
                                                                                                data-feather="tag"></i></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="content-general">
                                                                                <p class="desc_3">Multikart
                                                                                    Admin is modern designed
                                                                                    admin theme</p><span
                                                                                    class="collection_3">General</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-3 col-md-4 col-ed-4 col-sm-6">
                                                            <div
                                                                class="card card-with-border bookmark-card overflow-hidden">
                                                                <div class="details-website"><img class="img-fluid"
                                                                        src="{{ asset('dashboard') }}/assets/images/lightgallry/07.jpg"
                                                                        alt="" />
                                                                    <div class="favourite-icon favourite_4"
                                                                        onclick="setFavourite(4)"><a href="#"><i
                                                                                class="fa-solid fa-star"></i></a>
                                                                    </div>
                                                                    <div class="desciption-data">
                                                                        <div class="title-bookmark">
                                                                            <h5 class="title_4">Ecommerece
                                                                                theme</h5>
                                                                            <p class="weburl_4">
                                                                                http://themes.pixelstrap.com/multikart
                                                                            </p>
                                                                            <div class="hover-block">
                                                                                <ul>
                                                                                    <li><a href="#"
                                                                                            onclick="editBookmark(4)"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#edit-bookmark"><i
                                                                                                data-feather="edit-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="link"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="share-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="trash-2"></i></a>
                                                                                    </li>
                                                                                    <li class="pull-right text-end">
                                                                                        <a href="#"><i
                                                                                                data-feather="tag"></i></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="content-general">
                                                                                <p class="desc_4">Multikart
                                                                                    HTML template is an
                                                                                    apparently simple but
                                                                                    highly functional
                                                                                    tempalate designed for
                                                                                    creating a flourisahing
                                                                                    online business.</p>
                                                                                <span class="collection_4">General
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-3 col-md-4 col-ed-4 col-sm-6">
                                                            <div
                                                                class="card card-with-border bookmark-card overflow-hidden">
                                                                <div class="details-website"><img class="img-fluid"
                                                                        src="{{ asset('dashboard') }}/assets/images/lightgallry/07.jpg"
                                                                        alt="" />
                                                                    <div class="favourite-icon favourite_5"
                                                                        onclick="setFavourite(5)"><a href="#"><i
                                                                                class="fa-solid fa-star"></i></a>
                                                                    </div>
                                                                    <div class="desciption-data">
                                                                        <div class="title-bookmark">
                                                                            <h5 class="title_5">Tovo app
                                                                                landing page</h5>
                                                                            <p class="weburl_5">
                                                                                http://vue.pixelstrap.com/tovo/home-one
                                                                            </p>
                                                                            <div class="hover-block">
                                                                                <ul>
                                                                                    <li><a href="#"
                                                                                            onclick="editBookmark(5)"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#edit-bookmark"><i
                                                                                                data-feather="edit-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="link"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="share-2"></i></a>
                                                                                    </li>
                                                                                    <li><a href="#"><i
                                                                                                data-feather="trash-2"></i></a>
                                                                                    </li>
                                                                                    <li class="pull-right text-end">
                                                                                        <a href="#"><i
                                                                                                data-feather="tag"></i></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="content-general">
                                                                                <p class="desc_5">Amazing
                                                                                    Landing Page With Easy
                                                                                    Customization</p><span
                                                                                    class="collection_5">Fs
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fade tab-pane" id="pills-notification" role="tabpanel"
                                        aria-labelledby="pills-notification-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex mb-0 card-no-border">
                                                <h3 class="mb-0">notification</h3>
                                                <ul>
                                                    <li><a class="grid-bookmark-view" href="#"><i
                                                                data-feather="grid"></i></a></li>
                                                    <li><a class="list-layout-view" href="#"><i
                                                                data-feather="list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="details-bookmark text-center"><span>No Bookmarks
                                                        Found.</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fade tab-pane" id="pills-newsletter" role="tabpanel"
                                        aria-labelledby="pills-newsletter-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex mb-0 card-no-border">
                                                <h3 class="mb-0">Newsletter</h3>
                                                <ul>
                                                    <li><a class="grid-bookmark-view" href="#"><i
                                                                data-feather="grid"></i></a></li>
                                                    <li><a class="list-layout-view" href="#"><i
                                                                data-feather="list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="details-bookmark text-center"><span>No Bookmarks
                                                        Found.</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fade tab-pane" id="pills-business" role="tabpanel"
                                        aria-labelledby="pills-business-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex mb-0 card-no-border">
                                                <h3 class="mb-0">Business</h3>
                                                <ul>
                                                    <li><a class="grid-bookmark-view" href="#"><i
                                                                data-feather="grid"></i></a></li>
                                                    <li><a class="list-layout-view" href="#"><i
                                                                data-feather="list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="details-bookmark text-center"><span>No Bookmarks
                                                        Found.</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fade tab-pane" id="pills-holidays" role="tabpanel"
                                        aria-labelledby="pills-holidays-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex mb-0 card-no-border">
                                                <h3 class="mb-0">Holidays</h3>
                                                <ul>
                                                    <li><a class="grid-bookmark-view" href="#"><i
                                                                data-feather="grid"></i></a></li>
                                                    <li><a class="list-layout-view" href="#"><i
                                                                data-feather="list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="details-bookmark text-center"><span>No Bookmarks
                                                        Found.</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fade tab-pane" id="pills-important" role="tabpanel"
                                        aria-labelledby="pills-important-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex mb-0 card-no-border">
                                                <h3 class="mb-0">Important</h3>
                                                <ul>
                                                    <li><a class="grid-bookmark-view" href="#"><i
                                                                data-feather="grid"></i></a></li>
                                                    <li><a class="list-layout-view" href="#"><i
                                                                data-feather="list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="details-bookmark text-center"><span>No Bookmarks
                                                        Found.</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fade tab-pane" id="pills-orgenization" role="tabpanel"
                                        aria-labelledby="pills-orgenization-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex mb-0 card-no-border">
                                                <h3 class="mb-0">Orgenization</h3>
                                                <ul>
                                                    <li><a class="grid-bookmark-view" href="#"><i
                                                                data-feather="grid"></i></a></li>
                                                    <li><a class="list-layout-view" href="#"><i
                                                                data-feather="list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="details-bookmark text-center"><span>No Bookmarks
                                                        Found.</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade modal-bookmark" id="edit-bookmark" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Edit Bookmark</h3>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-bookmark needs-validation" novalidate="">
                                                        <div class="row g-2">
                                                            <div class="mb-3 mt-0 col-md-12">
                                                                <label>Web Url</label>
                                                                <input class="form-control" id="editurl" type="text"
                                                                    required="" autocomplete="off"
                                                                    value="http://admin.pixelstrap.com/Admiro/ltr/landing-page.html" />
                                                            </div>
                                                            <div class="mb-3 mt-0 col-md-12">
                                                                <label>Title</label>
                                                                <input class="form-control" id="edittitle" type="text"
                                                                    required="" autocomplete="off"
                                                                    value="Admin Template" />
                                                            </div>
                                                            <div class="mb-3 mt-0 col-md-12">
                                                                <label>Description</label>
                                                                <textarea class="form-control" id="editdesc" required=""
                                                                    autocomplete="off">Admiro is beautifully crafted, clean and modern designed admin theme with 6 different demos and light - dark versions.</textarea>
                                                            </div>
                                                            <div class="mb-3 mt-0 col-md-6">
                                                                <label>Group</label>
                                                                <select class="js-example-basic-single">
                                                                    <option value="AL">My Bookmarks</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 mt-0 col-md-6">
                                                                <label>Collection</label>
                                                                <select class="js-example-disabled-results">
                                                                    <option value="general">General</option>
                                                                    <option value="fs">fs</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-secondary" type="button">Save</button>
                                                        <button class="btn btn-primary" type="button"
                                                            data-bs-dismiss="modal">Cancel </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade modal-bookmark" id="createtag" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Create Tag</h3>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-bookmark needs-validation" novalidate="">
                                                        <div class="row g-2">
                                                            <div class="mb-3 mt-0 col-md-12">
                                                                <label>Tag Name</label>
                                                                <input class="form-control" type="text" required=""
                                                                    autocomplete="off" />
                                                            </div>
                                                            <div class="mb-3 mt-0 col-md-12">
                                                                <label>Tag color</label>
                                                                <input class="form-color d-block" type="color"
                                                                    value="#308e87" />
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-secondary" type="button">Save</button>
                                                        <button class="btn btn-primary" type="button"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade modal-bookmark" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Add
                                                        Bookmark</h3>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-bookmark needs-validation" id="bookmark-form"
                                                        novalidate="">
                                                        <div class="row g-2">
                                                            <div class="mb-3 mt-0 col-md-12">
                                                                <label for="bm-weburl">Web Url</label>
                                                                <input class="form-control" id="bm-weburl" type="text"
                                                                    required="" autocomplete="off" />
                                                            </div>
                                                            <div class="mb-3 mt-0 col-md-12">
                                                                <label for="bm-title">Title</label>
                                                                <input class="form-control" id="bm-title" type="text"
                                                                    required="" autocomplete="off" />
                                                            </div>
                                                            <div class="mb-3 mt-0 col-md-12">
                                                                <label>Description</label>
                                                                <textarea class="form-control" id="bm-desc" required=""
                                                                    autocomplete="off"></textarea>
                                                            </div>
                                                            <div class="mb-3 mt-0 col-md-6">
                                                                <label>Group</label>
                                                                <select class="js-example-basic-single" id="bm-group">
                                                                    <option value="bookmark">My Bookmarks
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 mt-0 col-md-6">
                                                                <label>Collection</label>
                                                                <select class="js-example-disabled-results"
                                                                    id="bm-collection">
                                                                    <option value="general">General</option>
                                                                    <option value="fs">fs</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input id="index_var" type="hidden" value="6" />
                                                        <button class="btn btn-secondary" id="Bookmark"
                                                            onclick="submitBookMark()" type="submit">Save</button>
                                                        <button class="btn btn-primary" type="button"
                                                            data-bs-dismiss="modal">Cancel </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.layout.footer')
