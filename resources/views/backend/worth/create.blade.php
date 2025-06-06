@extends('backend.layouts.layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yeni Vakansiya tipi</h4>

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

                            <form class="needs-validation" method="POST" action="{{ route('backend.worth.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_az" type="text"
                                                    value="{{ $worth?->title_az }}" id="example-text-input">
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
                                                    value="{{ $worth?->sub_title_az }}" id="example-text-input">
                                                @error('sub_title_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                    <div class="tab-pane" id="en">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_en" type="text"
                                                    value="{{ $worth?->title_en }}" id="example-text-input">
                                                @error('title_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Alt Başlıq
                                                (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="sub_title_en" type="text"
                                                    value="{{ $worth?->sub_title_en }}" id="example-text-input">
                                                @error('sub_title_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                    <div class="tab-pane" id="ru">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_ru" type="text"
                                                    value="{{ $worth?->title_ru }}" id="example-text-input">
                                                @error('title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Alt Başlıq
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="sub_title_ru" type="text"
                                                    value="{{ $worth?->sub_title_ru }}" id="example-text-input">
                                                @error('sub_title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">İcon</label>
                                        <div class="col-sm-10">
                                            <div class="image-preview" id="icon-preview">
                                                <label for="image-upload-icon" id="image-label">Faylı seç</label>
                                                <input type="file" name="icon" id="image-upload-icon" />
                                            </div>
                                            <div id="icon-container" style="display: none;">
                                                <img id="icon-img" src="" alt="Icon Preview"
                                                    style="object-fit:cover; border-radius: 20px; width: 100px; height: 100px;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 px-3">
                                        <label for="example-price-input" class="col-sm-2 col-form-label">Sıra nömrəsi</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="w_number" type="number" step="0.01" value="{{ $worth?->w_number }}" id="example-w_number-input">
                                            @error('w_number')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3 px-3">

                                    <div class="mt-4 d-flex justify-content-end">
                                      <button class="btn btn-primary">Yarat</button>
                                    </div>
                                  </div>
                            </form>

                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    @endsection

 @push('css')
    <style>
        .cke_notifications_area {
            display: none;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description_az');

        CKEDITOR.replace('description_en');

        CKEDITOR.replace('description_ru');
    </script>
@endpush

@push('js')


    <script>
        // Handle image file selection and preview

        document.getElementById('image-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Create an object URL for the selected image and set as the image source
                const imageUrl = URL.createObjectURL(file);
                const imagePreviewImg = document.getElementById('image-preview-img');
                imagePreviewImg.src = imageUrl;

                const imgContainer = document.getElementById('image-container');
                imgContainer.style.display = 'flex'; // Show the preview
                imgContainer.style.justifyContent = 'center'; // Center the content horizontally
                imgContainer.style.alignItems = 'center';
            }
        });
    </script>
@endpush
