@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nim" class="col-md-4 col-form-label text-md-end">{{ __('nim') }}</label>

                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" required autocomplete="nim" autofocus>

                                @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fakultas" class="col-md-4 col-form-label text-md-end">{{ __('Fakultas') }}</label>

                            <div class="col-md-6">
                                <select id="fakultas" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" value="{{ old('fakultas') }}" required autocomplete="fakultas" autofocus>
                                    <option value="">Pilih Fakultas</option>
                                    <option value="ftib">Fakultas Teknologi Informasi dan Bisnis</option>
                                    <option value="fteic">Fakultas Teknologi Elektro dan Industri Cerdas</option>
                                    <!-- Tambahkan pilihan fakultas lainnya di sini -->
                                </select>

                                @error('fakultas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="program_studi" class="col-md-4 col-form-label text-md-end">{{ __('Program Studi') }}</label>

                            <div class="col-md-6">
                                <select id="program_studi" class="form-control @error('program_studi') is-invalid @enderror" name="program_studi" value="{{ old('program_studi') }}" required autocomplete="program_studi" autofocus>
                                    <option value="">Pilih Program Studi</option>
                                </select>

                                @error('program_studi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateProgramStudi() {
        var fakultas = document.getElementById("fakultas").value;
        var programStudiSelect = document.getElementById("program_studi");

        // Bersihkan semua opsi program studi
        programStudiSelect.innerHTML = "";

        if (fakultas === "ftib") {
            // Tampilkan opsi program studi untuk fakultas Teknologi Informasi dan Bisnis
            var tifbOptions = [{
                    value: "ti",
                    label: "Teknik Informatika"
                },
                {
                    value: "si",
                    label: "Sistem Informasi"
                },
                {
                    value: "it",
                    label: "Teknologi Informasi"
                },
                {
                    value: "sd",
                    label: "Sains Data"
                },
                {
                    value: "rpl",
                    label: "Rekayasa Perangkat Lunak"
                },
            ];

            tifbOptions.forEach(function(option) {
                var optionElement = document.createElement("option");
                optionElement.value = option.value;
                optionElement.text = option.label;
                programStudiSelect.appendChild(optionElement);
            });
        } else if (fakultas === "fteic") {
            // Tampilkan opsi program studi untuk fakultas Hukum
            var fhOptions = [{
                    value: "tt",
                    label: "Teknik Telekomunikasi"
                },
                {
                    value: "te",
                    label: "Teknik Elektro"
                },
                {
                    value: "tit",
                    label: "Teknik Industri"
                },
                {
                    value: "tl",
                    label: "Teknik Logistik"
                },
            ];

            fhOptions.forEach(function(option) {
                var optionElement = document.createElement("option");
                optionElement.value = option.value;
                optionElement.text = option.label;
                programStudiSelect.appendChild(optionElement);
            });
        }
    }

    // Panggil fungsi updateProgramStudi saat halaman dimuat dan saat fakultas berubah
    document.addEventListener("DOMContentLoaded", updateProgramStudi);
    document.getElementById("fakultas").addEventListener("change", updateProgramStudi);
</script>
@endsection