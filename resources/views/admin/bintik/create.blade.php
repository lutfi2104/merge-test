@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('bintik_hitam.store') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
            </div>

            @error('tanggal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="jam">Jam:</label>
                <input type="time" id="jam" name="jam" class="form-control @error('jam') is-invalid @enderror">
            </div>

            @error('jam')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            @for ($i = 1; $i <= 4; $i++)
                <div class="mb-3 card">
                    <div class="card-header">
                        <h3>Data DD{{ $i }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="produk_id_{{ $i }}" style="display: block">Produk</label>
                            <select id="produk_id_{{ $i }}"
                                class="selectpicker @error('produk_id_' . $i) is-invalid @enderror" data-live-search="true"
                                data-size="5" name="produk_id_{{ $i }}"
                                onchange="checkProdukValue({{ $i }})">
                                <option value="" selected>Pilih Produk</option>
                                @foreach ($namaproduks as $produk)
                                    <option value="{{ $produk->id }}"
                                        {{ old('produk_id_' . $i) == $produk->id ? 'selected' : '' }}>
                                        {{ $produk->nama_prd }}
                                    </option>
                                @endforeach

                            </select>
                            @error('produk_id_ ' . $i)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" id="bintik_hitam_group_{{ $i }}" style="margin-top: 20px;">
                            <label>Bintik Hitam DD{{ $i }}:</label>
                            <div class="form-check">
                                <input type="radio" id="bintik_hitam_dd{{ $i }}"
                                    name="bintik_hitam_dd{{ $i }}" value="Ada"
                                    {{ old('bintik_hitam_dd' . $i) == 'Ada' ? 'checked' : '' }}
                                    class="form-check-input @error('bintik_hitam_dd' . $i) is-invalid @enderror">
                                <label class="form-check-label" for="bintik_hitam_dd{{ $i }}_ada">Ada</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="bintik_hitam_dd{{ $i }}"
                                    name="bintik_hitam_dd{{ $i }}" value="Tidak Ada"
                                    {{ old('bintik_hitam_dd' . $i) == 'Tidak Ada' ? 'checked' : '' }}
                                    class="form-check-input @error('bintik_hitam_dd' . $i) is-invalid @enderror">
                                <label class="form-check-label" for="bintik_hitam_dd{{ $i }}_tidak_ada">Tidak
                                    Ada</label>
                            </div>
                            @error('bintik_hitam_dd' . $i)
                                <div class="alert alert-danger" role="alert">
                                    <strong>test</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 form-group" id="dd_group_{{ $i }}" style="margin-top: 20px;">
                                <label for="dd{{ $i }}">Suhu Burner DD {{ $i }}</label>
                                <input id="dd{{ $i }}" type="number" step="any"
                                    class="form-control @error('dd{{ $i }}') is-invalid @enderror"
                                    name="dd{{ $i }}"
                                    placeholder="Masukkan Jumlah Gumpalan DD {{ $i }}"
                                    value="{{ old('dd' . $i) }}">

                                @error('dd' . $i)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Partikel Hitam -->
                            <div class="form-group" id="partikel_hitam_group_{{ $i }}"
                                style="margin-top: 20px;">
                                <label>Partikel Hitam DD{{ $i }}:</label>
                                <div class="form-check">
                                    <input type="radio" id="partikel_hitam_dd{{ $i }}"
                                        name="partikel_hitam_dd{{ $i }}" value="Ada"
                                        {{ old('partikel_hitam_dd' . $i) == 'Ada' ? 'checked' : '' }}
                                        class="form-check-input @error('partikel_hitam_dd' . $i) is-invalid @enderror">
                                    <label class="form-check-label"
                                        for="partikel_hitam_dd{{ $i }}_ada">Ada</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="partikel_hitam_dd{{ $i }}"
                                        name="partikel_hitam_dd{{ $i }}" value="Tidak Ada"
                                        {{ old('partikel_hitam_dd' . $i) == 'Tidak Ada' ? 'checked' : '' }}
                                        class="form-check-input">
                                    <label class="form-check-label"
                                        for="partikel_hitam_dd{{ $i }}_tidak_ada">Tidak Ada</label>
                                </div>
                            </div>
                            @error('partikel_hitam_dd' . $i)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- Benda Asing -->
                            <div class="form-group" id="benda_asing_group_{{ $i }}" style="margin-top: 20px;">
                                <label>Benda Asing DD{{ $i }}:</label>
                                <div class="form-check">
                                    <input type="radio" id="benda_asing_dd{{ $i }}_ada"
                                        name="benda_asing_dd{{ $i }}" value="Ada"
                                        {{ old('benda_asing_dd' . $i) == 'Ada' ? 'checked' : '' }}
                                        class="form-check-input @error('benda_asing_dd' . $i) is-invalid @enderror">
                                    <label class="form-check-label" for="benda_asing_dd{{ $i }}">Ada</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="benda_asing_dd{{ $i }}"
                                        name="benda_asing_dd{{ $i }}" value="Tidak Ada"
                                        {{ old('benda_asing_dd' . $i) == 'Tidak Ada' ? 'checked' : '' }}
                                        class="form-check-input @error('benda_asing_dd' . $i) is-invalid @enderror">
                                    <label class="form-check-label"
                                        for="benda_asing_dd{{ $i }}_tidak_ada">Tidak Ada</label>
                                </div>
                            </div>
                            @error('benda_asing_dd' . $i)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="mb-3 form-group" id="gumpalan_dd_group_{{ $i }}"
                                style="margin-top: 20px;">
                                <label for="gumpalan_dd{{ $i }}">Jumlah Gumpalan DD
                                    {{ $i }}</label>
                                <input id="gumpalan_dd{{ $i }}" type="number" step="any"
                                    class="form-control @error('gumpalan_dd{{ $i }}') is-invalid @enderror"
                                    name="gumpalan_dd{{ $i }}"
                                    placeholder="Masukkan Jumlah Gumpalan DD {{ $i }}"
                                    value="{{ old('gumpalan_dd' . $i) }}">

                                @error('gumpalan_dd' . $i)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-top: 20px;">
                                <label>Catatan DD {{ $i }}:</label>
                                <textarea id="catatan_dd{{ $i }}"
                                    class="form-control @error('catatan_dd{{ $i }}') is-invalid @enderror"
                                    name="catatan_dd{{ $i }}" rows="4" placeholder="Masukkan catatan DD {{ $i }}">{{ old('catatan_dd' . $i) }}</textarea>
                                @error('catatan_dd' . $i)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
            @endfor

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set the current date and time in the form fields
            var currentDate = new Date().toISOString().split('T')[0];
            document.getElementById('tanggal').value = currentDate;

            var currentTime = new Date().toTimeString().split(' ')[0].slice(0, 5);
            document.getElementById('jam').value = currentTime;

            // Check initial product values
            for (let i = 1; i <= 4; i++) {
                checkProdukValue(i);
            }
        });

        function checkProdukValue(index) {
            var produkDropdown = document.getElementById('produk_id_' + index);
            var selectedValue = produkDropdown.value;

            // Elements to hide/show
            var bintikHitamGroup = document.getElementById('bintik_hitam_group_' + index);
            var partikelHitamGroup = document.getElementById('partikel_hitam_group_' + index);
            var bendaAsingGroup = document.getElementById('benda_asing_group_' + index);
            var suhuDDGroup = document.getElementById('dd_group_' + index);
            var gumpalanDDGroup = document.getElementById('gumpalan_dd_group_' + index);

            var gumpalanDDInput = document.getElementById('gumpalan_dd' + index);
            var gumpalanDDErrorMessage = document.getElementById('gumpalan_dd_error_message_' + index);



            if (selectedValue == '1') {
                bintikHitamGroup.style.display = 'none';
                partikelHitamGroup.style.display = 'none';
                bendaAsingGroup.style.display = 'none';
                suhuDDGroup.style.display = 'none';
                gumpalanDDGroup.style.display = 'none';
                // Set required attribute to false for all inputs in hidden groups
                setRequiredAttribute(false, [
                    document.getElementById('dd' + index),
                    document.getElementById('gumpalan_dd' + index),
                    document.getElementById('bintik_hitam_dd' + index),
                    document.getElementById('benda_asing_dd' + index),
                    document.getElementById('partikel_hitam_dd' + index)
                ]);
            } else {
                bintikHitamGroup.style.display = 'block';
                partikelHitamGroup.style.display = 'block';
                bendaAsingGroup.style.display = 'block';
                suhuDDGroup.style.display = 'block';
                gumpalanDDGroup.style.display = 'block';
                // Set required attribute to true for all inputs in visible groups
                setRequiredAttribute(true, [
                    document.getElementById('dd' + index),
                    document.getElementById('gumpalan_dd' + index),
                    document.getElementById('bintik_hitam_dd' + index),
                    document.getElementById('benda_asing_dd' + index),
                    document.getElementById('partikel_hitam_dd' + index)

                ]);
            }
        }

        function setRequiredAttribute(required, elements) {
            elements.forEach(function(element) {
                element.required = required;
            });
        }
    </script>
@endpush
