@extends('backend.layouts.layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yeniləmək</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Forms Elements</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">


                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#az" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">AZ</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#en" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">EN</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#ru" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">RU</span>
                                    </a>
                                </li>
                            </ul>

                            <form class="needs-validation" method="POST" action="{{ route('backend.contact.update', 1) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                    (Az)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="title_az" type="text"
                                                        value="{{ $contact?->title_az }}" id="example-text-input">
                                                    @error('title_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt Başlıq
                                                    (Az)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="sub_title_az" type="text"
                                                        value="{{ $contact?->sub_title_az }}" id="example-text-input">
                                                    @error('sub_title_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Ünvan
                                                    (Az)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="address_title_az" type="text"
                                                        value="{{ $contact?->address_title_az }}" id="example-text-input">
                                                    @error('address_title_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Vöen
                                                    (Az)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="voen_title_az" type="text"
                                                        value="{{ $contact?->voen_title_az }}" id="example-text-input">
                                                    @error('voen_title_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="en">
                                        <div class="row mb-3">
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                    (En)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="title_en" type="text"
                                                        value="{{ $contact?->title_en }}" id="example-text-input">
                                                    @error('title_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt
                                                    Başlıq (En)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="sub_title_en" type="text"
                                                        value="{{ $contact?->sub_title_en }}" id="example-text-input">
                                                    @error('sub_title_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Ünvan
                                                    (En)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="address_title_en" type="text"
                                                        value="{{ $contact?->address_title_en }}"
                                                        id="example-text-input">
                                                    @error('address_title_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Vöen
                                                    (En)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="voen_title_en" type="text"
                                                        value="{{ $contact?->voen_title_en }}" id="example-text-input">
                                                    @error('voen_title_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="ru">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_ru" type="text"
                                                    value="{{ $contact?->title_ru }}" id="example-text-input">
                                                @error('title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Alt
                                                Başlıq (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="sub_title_ru" type="text"
                                                    value="{{ $contact?->sub_title_ru }}" id="example-text-input">
                                                @error('sub_title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Ünvan
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="address_title_ru" type="text"
                                                    value="{{ $contact?->address_title_ru }}" id="example-text-input">
                                                @error('address_title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Vöen
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="voen_title_ru" type="text"
                                                    value="{{ $contact?->voen_title_ru }}" id="example-text-input">
                                                @error('voen_title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="email_title" type="text"
                                            value="{{ $contact?->email_title }}" id="example-text-input">
                                        @error('email_title')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nömrə</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="phone_title" type="text"
                                            value="{{ $contact?->phone_title }}" id="example-text-input">
                                        @error('phone_title')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Address
                                            icon</label>
                                        <div class="col-sm-10">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Faylı seç</label>
                                                <input type="file" name="address_icon" id="image-upload" />
                                                <img style="width:200px" src="{{ $contact?->address_icon }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Preview Container (Initially Hidden) -->
                                    <div id="image-container" style="display: none;">
                                        <img id="image-preview-img" src="" alt="Image Preview"
                                            style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Vöen
                                            icon</label>
                                        <div class="col-sm-10">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Faylı seç</label>
                                                <input type="file" name="voen_icon" id="image-upload" />
                                                <img style="width:200px" src="{{ $contact?->voen_icon }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Preview Container (Initially Hidden) -->
                                    <div id="image-container" style="display: none;">
                                        <img id="image-preview-img" src="" alt="Image Preview"
                                            style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Email
                                            icon</label>
                                        <div class="col-sm-10">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Faylı seç</label>
                                                <input type="file" name="email_icon" id="image-upload" />
                                                <img style="width:200px" src="{{ $contact?->email_icon }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Preview Container (Initially Hidden) -->
                                    <div id="image-container" style="display: none;">
                                        <img id="image-preview-img" src="" alt="Image Preview"
                                            style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Phone
                                            icon</label>
                                        <div class="col-sm-10">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Faylı seç</label>
                                                <input type="file" name="phone_icon" id="image-upload" />
                                                <img style="width:200px" src="{{ $contact?->phone_icon }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Preview Container (Initially Hidden) -->
                                    <div id="image-container" style="display: none;">
                                        <img id="image-preview-img" src="" alt="Image Preview"
                                            style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Xəritə</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="map" type="text"
                                            value="{{ $contact?->map }}" id="example-text-input">
                                    </div>
                                </div>

                                <div class="row mb-3 px-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
                </form>

            </div> <!-- container-fluid -->
        </div>
    @endsection
    @push('js')
        <script>
            function setupImagePreview(inputId, previewId, containerId) {
                const input = document.getElementById(inputId);
                const previewImg = document.getElementById(previewId);
                const container = document.getElementById(containerId);

                if (input && previewImg && container) {
                    input.addEventListener('change', function(event) {
                        const file = event.target.files[0];
                        if (file) {
                            const imageUrl = URL.createObjectURL(file);
                            previewImg.src = imageUrl;
                            container.style.display = 'flex';
                        }
                    });
                }
            }

            // Initialize previews for each field
            setupImagePreview('image-upload-address', 'image-preview-address', 'image-container-address');
            setupImagePreview('image-upload-voen', 'image-preview-voen', 'image-container-voen');
            setupImagePreview('image-upload-email', 'image-preview-email', 'image-container-email');
            setupImagePreview('image-upload-phone', 'image-preview-phone', 'image-container-phone');
        </script>
    @endpush
