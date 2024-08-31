<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ URL::asset('/sneat/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ URL::asset('/sneat/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ URL::asset('/sneat/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ URL::asset('/sneat/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ URL::asset('/sneat/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ URL::asset('/sneat/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ URL::asset('/sneat/assets/js/dashboards-analytics.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@stack('js')
<script>
    function logout(form_id) {
        Swal.fire({
            title: 'Yakin?',
            text: "Keluar dari aplikasi ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Yakin!',
            cancelButtonText: 'Batal'

        }).then((result) => {
            if (result.isConfirmed) {
                $(form_id).submit()

            }
        })
    }






    $('.myTable').addClass('w-100')
    let table = new DataTable('.myTable', {
        scrollX: true
    });



    function send_form(form_id) {
        let form = $(form_id)
        let btn = form.find('#submit_btn')
        let icon_btn = btn.find('i')

        let action = form.attr('action')
        let method = form.attr('method')
        let data = new FormData(form[0])

        $.ajax({
            url: action,
            data: data,
            method: method,
            contentType: false,
            processData: false,
            beforeSend: function() {
                icon_btn.replaceWith(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                );
                form.find('input, select, textarea').removeClass('is-invalid')
                form.find('.error_alert').text('')
            },
            success: function(response) {
                window.location.href = response.data
            },
            error: function(response) {
                let res = response.responseJSON
                $.each(res.data, function(index, value) {
                    value = value[0]
                    form.find('[name="' + index + '"]').addClass('is-invalid')
                    form.find('#' + index + '_error_alert').text(value)
                });
            },
            complete: function() {
                btn.find('span').replaceWith(icon_btn)
            }
        })
    }
</script>


<script>
    function cekspec(produk) {
        // Get the container element for Tanggal Produksi CoA
        var container = document.getElementById('tanggal_produksi_coa_container');

        // Define the list of product IDs that should display the input
        var targetProductIds = ['68', '3']; // Add more IDs as needed

        // Cek apakah produk tidak dipilih
        if (!produk) {
            $('.form-control').show().attr('placeholder', '');
            $('.row.mb-3').show(); // Tampilkan semua elemen dan reset placeholder
            container.style.display = 'none'; // Sembunyikan container jika produk tidak dipilih
            return; // Keluar dari fungsi jika produk kosong
        }

        // Show or hide the container based on the selected product ID
        if (targetProductIds.includes(produk)) {
            container.style.display = 'flex';
        } else {
            container.style.display = 'none';
        }

        // Jika produk terpilih, lakukan pengambilan spesifikasi dengan Ajax
        $.ajax({
            url: "{{ route('get-produk-json') }}",
            data: {
                produk_id: produk
            },
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(produk) {
                let spec = produk.spec;
                $.each(spec, function(key, value) {
                    $('#' + key).attr('placeholder', value ? value : 'Masukkan nilai ' + key +
                        ' di sini');

                    if (!value) {
                        $('#' + key).closest('.row')
                            .hide(); // Sembunyikan baris jika tidak ada nilai
                    } else {
                        $('#' + key).closest('.row').show();
                        if (key !== 'ym' && key !== 'entero' && key !== 'tpc' && key !==
                            'salmonella') {
                            $('#' + key).prop('required', true);
                        } // Tampilkan baris jika ada nilai
                    }
                });
            },
            error: function(response) {
                alert('Terjadi masalah');
            }
        });
    }
</script>



<script>
    function namaprd(produk) {
        $('.form-control').prop('disabled', false).attr('placeholder', '')
        $.ajax({
            url: "{{ route('get-nama-produk-json') }}",
            data: {
                nama_produk_id: produk
            },
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(produk) {
                let supplier = produk.supplier;
                $('#note').val(supplier.nama_produsen);
            },
            error: function(response) {
                alert('terjadi masalah')
            }
        })
    }
</script>
{{-- <script>
    function cektemp(template) {
        $('.form-control').prop('disabled', false).attr('placeholder', '')
        $.ajax({
            url: "{{ route('get-template-json') }}",
            data: {
                template_id: template
            },
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(template) {
                let prd = template.produk
                $.each(prd, function(key, value) {

                    if (!value) {
                        $('#' + key).prop('disabled', true)
                    }


                })
                //     $.each(produk, function(key, value) {
                //         $('#' + key).attr('placeholder', value)
                //         if (!value) {
                //             $('#' + key).prop('disabled', true)
                //         }
                // })


            },
            error: function(response) {
                alert('terjadi masalah')
            }
        })
    }
</script> --}}

@if ($errors->any() || isset($pengujian))
    <script>
        $('#produk_id').trigger('change')
    </script>
@endif


<style>
    .warna {
        transition: background-color 2s ease;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // jQuery script to show/hide textarea based on radio button selection
    $(document).ready(function() {
        $('input[name="asing"]').change(function() {
            if ($(this).attr('id') === 'ada') {
                $('#sebutkanTextArea').show();
            } else {
                $('#sebutkanTextArea').hide();
                $('#sebutkan').val(''); // Reset nilai textarea saat disembunyikan
            }
        });
    });

    $('#submitBtn').click(function() {
        var radioAda = $('#ada').prop('checked');
        var nilaiSebutkan = $('#sebutkan').val();

        if (radioAda && nilaiSebutkan === '') {
            alert('Mohon isi textarea karena Anda memilih "Ada".');
        } else {
            // Lakukan tindakan lain sesuai kebutuhan
            alert('Form berhasil disubmit.');
        }
    });

    $(document).ready(function() {
        function updateWarna() {
            if ($('#status').val() === 'Passed') {
                $('.warna').css({
                    'background-color': 'green',
                    'color': 'black',
                });
            } else if ($('#status').val() === 'Reject') {
                $('.warna').css({
                    'background-color': 'red',
                    'color': 'black',
                });
            } else if ($('#status').val() === 'Hold') {
                $('.warna').css({
                    'background-color': 'yellow',
                    'color': 'black',
                });
            } else {
                $('.warna').css('background-color', 'white');
            }
        }

        // Call updateWarna on page load
        updateWarna();

        // Call updateWarna on change
        $('#status').change(function() {
            updateWarna();
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Ketika dropdown bahan baku berubah
        $('#nama_produk_supplier_id').change(function() {
            // Ambil nilai masa halal dan nama produsen dari atribut data
            var masaHalal = $(this).find(':selected').data('masa-halal');

            var supplierId = $(this).find(':selected').data('nama-produsen');

            // Set nilai input masa berlaku halal dan nama produsen
            $('#halal').val(masaHalal);
            $('#supplier_id').val(supplierId);


        });
    });

    $('#form-create').submit(function(event) {
        event.preventDefault(); // Mencegah pengiriman formulir otomatis

        // Menggunakan Sweet Alert
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menyimpan data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, lanjutkan pengiriman formulir
                $('#form-create')[0].submit();
            }
        });
    });
    $('#form-edit').submit(function(event) {
        event.preventDefault(); // Mencegah pengiriman formulir otomatis

        // Menggunakan Sweet Alert
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin merubah data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, lanjutkan pengiriman formulir
                $('#form-edit')[0].submit();
            }
        });
    });
</script>
<script>
    function hapus_data(form_id) {
        event.preventDefault(); // Tambahkan ini untuk mencegah aksi default
        Swal.fire({
            title: 'Yakin?',
            text: "Hapus Data Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Data!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Tambahkan console.log untuk memeriksa apakah fungsi dijalankan saat tombol Hapus diklik
                console.log('Button Hapus clicked');

                // Eksekusi submit formulir
                $(form_id).submit();

                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
            }
        });
    }
</script>
