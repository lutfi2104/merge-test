<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Baking_eb
 *
 * @property int $id
 * @property string $tanggal
 * @property int $nama_produk_id
 * @property int $no_batch
 * @property string $no_mixer
 * @property float $tambah_air
 * @property string $mixing_in
 * @property string $mixing_out
 * @property string $proofing_in
 * @property string $profing_out
 * @property string $baking_in
 * @property string $baking_out
 * @property int $no_eb
 * @property int $no_gerobak
 * @property float $suhu_produk
 * @property string $bulan
 * @property int $tahun
 * @property string $op
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\NamaProduk $produk
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb query()
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereBakingIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereBakingOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereBulan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereMixingIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereMixingOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereNamaProdukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereNoBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereNoEb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereNoGerobak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereNoMixer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereOp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereProfingOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereProofingIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereSuhuProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereTambahAir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baking_eb whereUpdatedAt($value)
 */
	class Baking_eb extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ccp1fresh
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ccp1fresh newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ccp1fresh newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ccp1fresh query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ccp1fresh whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ccp1fresh whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ccp1fresh whereUpdatedAt($value)
 */
	class Ccp1fresh extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Coa
 *
 * @property int $id
 * @property string $no_batch_coa
 * @property string|null $bulk_density
 * @property string|null $salinity
 * @property string|null $mesh_20
 * @property string|null $mesh_40
 * @property string|null $mesh_4
 * @property string|null $mesh_4_6
 * @property string|null $mesh_5_6
 * @property string|null $mesh_20_max
 * @property string|null $mesh_1_4
 * @property string|null $mesh_1_4_5
 * @property string|null $mesh_6
 * @property string|null $mesh_6_10
 * @property string|null $kadar_air
 * @property string|null $salmonella
 * @property string|null $tpc
 * @property string|null $entero
 * @property string|null $ym
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Coa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereBulkDensity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereEntero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereKadarAir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereMesh14($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereMesh145($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereMesh20($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereMesh20Max($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereMesh4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereMesh40($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereMesh46($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereMesh56($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereMesh6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereMesh610($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereNoBatchCoa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereSalinity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereSalmonella($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereTpc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coa whereYm($value)
 */
	class Coa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $nama_customer
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $province
 * @property string $city
 * @property string $pic
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereNamaCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Data
 *
 * @property int $id
 * @property int $produk_id
 * @property string $tanggal_produksi
 * @property string $tanggal_expired
 * @property int $expired
 * @property float|null $bulk_density
 * @property string $nilai
 * @property float $salinity
 * @property string|null $mesh_20
 * @property string|null $mesh_40
 * @property float $kadar_air
 * @property string|null $salmonella
 * @property string|null $tpc
 * @property string|null $entero
 * @property string|null $ym
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Data newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Data newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Data query()
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereBulkDensity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereEntero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereKadarAir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereMesh20($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereMesh40($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereProdukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSalinity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSalmonella($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereTanggalExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereTanggalProduksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereTpc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereYm($value)
 */
	class Data extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Departement
 *
 * @property int $id
 * @property \App\Models\Sop|null $departement
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Etiket|null $etiket
 * @property-read \App\Models\Usersop|null $kpi
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\Wo|null $wo
 * @method static \Illuminate\Database\Eloquent\Builder|Departement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Departement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departement whereDepartement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departement whereUpdatedAt($value)
 */
	class Departement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Etiket
 *
 * @property int $id
 * @property int $user_id
 * @property string $nama
 * @property string $subject
 * @property int $departement_id
 * @property string $jenis_bantuan
 * @property string $prioritas
 * @property string $content
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Departement $dept
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Wo> $wo_dep
 * @property-read int|null $wo_dep_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Wo> $wo_prio
 * @property-read int|null $wo_prio_count
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket whereDepartementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket whereJenisBantuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket wherePrioritas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiket whereUserId($value)
 */
	class Etiket extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Hold_reject_wip
 *
 * @property int $id
 * @property int $produk_id
 * @property int $mesin_id
 * @property string $tanggal_produksi
 * @property int $shift_id
 * @property string $tanggal_expired
 * @property string $kode_batch
 * @property float $jumlah
 * @property string $status
 * @property string $alasan
 * @property string $rekomendasi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Mesin $mesin
 * @property-read \App\Models\Produk $produk
 * @property-read \App\Models\shift $shift
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereAlasan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereKodeBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereMesinId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereProdukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereRekomendasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereTanggalExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereTanggalProduksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold_reject_wip whereUpdatedAt($value)
 */
	class Hold_reject_wip extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kalibrasi
 *
 * @property int $id
 * @property string $nama_alat
 * @property string|null $merk
 * @property string|null $type
 * @property string|null $nomor_seri
 * @property string $rentang_ukur
 * @property string $resolusi
 * @property string $tempat
 * @property string $tgl_kalibrasi
 * @property string|null $kalibrasi
 * @property string|null $verifikasi
 * @property string|null $kalibrator
 * @property string|null $sertifikat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereKalibrasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereKalibrator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereMerk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereNamaAlat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereNomorSeri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereRentangUkur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereResolusi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereSertifikat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereTempat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereTglKalibrasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kalibrasi whereVerifikasi($value)
 */
	class Kalibrasi extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Komentar
 *
 * @property int $id
 * @property string $komentar
 * @property int $user_id
 * @property int $wo_id
 * @property int $status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereKomentar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereWoId($value)
 */
	class Komentar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kriteria
 *
 * @property int $id
 * @property int $kode
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read Kriteria|null $template
 * @method static \Illuminate\Database\Eloquent\Builder|Kriteria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kriteria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kriteria query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kriteria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kriteria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kriteria whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kriteria whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kriteria whereUpdatedAt($value)
 */
	class Kriteria extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Lkt
 *
 * @property int $id
 * @property string $nama_inisiator
 * @property int $user_id
 * @property int $departement_id
 * @property string $departement
 * @property string $type_lkt
 * @property string $subject
 * @property string $isi
 * @property string $jenis
 * @property string $tanggal
 * @property string|null $nama_produk
 * @property string|null $kode_produk
 * @property string|null $jumlah_produk
 * @property string|null $status
 * @property string|null $data_pelanggan
 * @property string $halal
 * @property string|null $nama_pic
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lktcor|null $lktcor
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereDataPelanggan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereDepartement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereDepartementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereHalal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereIsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereJumlahProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereKodeProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereNamaInisiator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereNamaPic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereNamaProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereTypeLkt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lkt whereUserId($value)
 */
	class Lkt extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Lktcor
 *
 * @property int $id
 * @property string $root_cause
 * @property string $corrective_action
 * @property string $preventive_action
 * @property string $nama_pic
 * @property string $tanggal_isi
 * @property string $due_date
 * @property int $lkt_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lkt $lkt
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor whereCorrectiveAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor whereLktId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor whereNamaPic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor wherePreventiveAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor whereRootCause($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor whereTanggalIsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lktcor whereUpdatedAt($value)
 */
	class Lktcor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mesin
 *
 * @property int $id
 * @property string $nama_mesin
 * @property int $no_mesin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hold_reject_wip> $hold
 * @property-read int|null $hold_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Mesin> $pengujian
 * @property-read int|null $pengujian_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Perintah> $perintah
 * @property-read int|null $perintah_count
 * @method static \Illuminate\Database\Eloquent\Builder|Mesin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mesin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mesin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mesin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mesin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mesin whereNamaMesin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mesin whereNoMesin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mesin whereUpdatedAt($value)
 */
	class Mesin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NamaProduk
 *
 * @property int $id
 * @property string $kode_prd
 * @property string $nama_prd
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\bintikHitam|null $bintik_1
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\bintikHitam> $bintik_2
 * @property-read int|null $bintik_2_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\bintikHitam> $bintik_3
 * @property-read int|null $bintik_3_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\bintikHitam> $bintik_4
 * @property-read int|null $bintik_4_count
 * @property-read \App\Models\dd_ccpdry|null $ccpdry1
 * @property-read \App\Models\dd_ccpdry|null $ccpdry2
 * @property-read \App\Models\dd_ccpdry|null $ccpdry3
 * @property-read \App\Models\dd_ccpdry|null $ccpdry4
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Baking_eb> $eb
 * @property-read int|null $eb_count
 * @method static \Illuminate\Database\Eloquent\Builder|NamaProduk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NamaProduk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NamaProduk query()
 * @method static \Illuminate\Database\Eloquent\Builder|NamaProduk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NamaProduk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NamaProduk whereKodePrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NamaProduk whereNamaPrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NamaProduk whereUpdatedAt($value)
 */
	class NamaProduk extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pengujian
 *
 * @property int $id
 * @property int $produk_id
 * @property int $mesin_id
 * @property string $tanggal_produksi
 * @property int $shift_id
 * @property string $tanggal_expired
 * @property int $sak_awal
 * @property int|null $sak_akhir
 * @property int $jumlah_sak
 * @property string $no_batch
 * @property string $no_batch_coa
 * @property string|null $catatan
 * @property string $visual
 * @property mixed|null $bulk_density
 * @property string|null $salinity
 * @property string|null $mesh_20
 * @property string|null $mesh_40
 * @property string|null $mesh_4
 * @property string|null $mesh_4_6
 * @property string|null $mesh_5_6
 * @property string|null $mesh_20_max
 * @property string|null $mesh_1_4
 * @property string|null $mesh_1_4_5
 * @property string|null $mesh_6
 * @property string|null $mesh_6_10
 * @property string|null $kadar_air
 * @property string|null $salmonella
 * @property string|null $tpc
 * @property string|null $entero
 * @property string|null $ym
 * @property string|null $bulan
 * @property int|null $tahun
 * @property string|null $qc
 * @property string|null $jenis
 * @property string $method_prd
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $spec_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Mesin $mesin
 * @property-read \App\Models\Produk $produk
 * @property-read \App\Models\shift $shift
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereBulan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereBulkDensity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereEntero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereJumlahSak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereKadarAir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMesh14($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMesh145($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMesh20($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMesh20Max($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMesh4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMesh40($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMesh46($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMesh56($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMesh6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMesh610($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMesinId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereMethodPrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereNoBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereNoBatchCoa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereProdukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereQc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereSakAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereSakAwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereSalinity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereSalmonella($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereSpecId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereTanggalExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereTanggalProduksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereTpc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereVisual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengujian whereYm($value)
 */
	class Pengujian extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Perintah
 *
 * @property int $id
 * @property int $produk_id
 * @property int $mesin_id
 * @property string|null $tanggal_produksi_coa
 * @property string|null $tanggal_expired_coa
 * @property string $tanggal_produksi
 * @property string $tanggal_expired
 * @property string|null $komposisi
 * @property string|null $screen
 * @property string|null $bobot
 * @property string|null $appearance
 * @property string|null $packaging
 * @property string|null $catatan
 * @property int $shift_id
 * @property string $no_batch
 * @property int $spec_id
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Mesin $mesin
 * @property-read \App\Models\Produk $produk
 * @property-read \App\Models\shift $shift
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah query()
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereAppearance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereBobot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereKomposisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereMesinId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereNoBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah wherePackaging($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereProdukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereScreen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereSpecId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereTanggalExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereTanggalExpiredCoa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereTanggalProduksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereTanggalProduksiCoa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perintah whereUpdatedAt($value)
 */
	class Perintah extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Produk
 *
 * @property int $id
 * @property string $name
 * @property string $jenis
 * @property string $kode_produk
 * @property int $template_id
 * @property int $expired
 * @property string $color
 * @property string $texture
 * @property string $flavor
 * @property string|null $granule
 * @property string|null $appearance
 * @property string $packaging
 * @property string $taste
 * @property string|null $partical_size
 * @property string|null $screen_mm
 * @property string|null $filth_insect
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Hold_reject_wip|null $hold
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pengujian> $pengujians
 * @property-read int|null $pengujians_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Perintah> $perintah
 * @property-read int|null $perintah_count
 * @property-read \App\Models\shift|null $shift
 * @property-read \App\Models\Spec|null $spec
 * @property-read \App\Models\Template $template
 * @method static \Illuminate\Database\Eloquent\Builder|Produk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk query()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereAppearance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereFilthInsect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereFlavor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereGranule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereKodeProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk wherePackaging($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereParticalSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereScreenMm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereTaste($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereTexture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereUpdatedAt($value)
 */
	class Produk extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Qclineg1
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Qclineg1 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Qclineg1 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Qclineg1 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Qclineg1 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qclineg1 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qclineg1 whereUpdatedAt($value)
 */
	class Qclineg1 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sop
 *
 * @property int $id
 * @property string $judul
 * @property string $kode_dokumen
 * @property string $revisi
 * @property string|null $rincian_revisi
 * @property string $tgl_efektif
 * @property int $pic
 * @property string $jenis
 * @property int $dept
 * @property string|null $file
 * @property string $status
 * @property mixed|null $copy_doc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Departement|null $dep
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Usersop> $dokumen
 * @property-read int|null $dokumen_count
 * @property-read \App\Models\User|null $pics
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SopRevision> $revisions
 * @property-read int|null $revisions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sop query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereCopyDoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereDept($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereKodeDokumen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereRevisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereRincianRevisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereTglEfektif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereUpdatedAt($value)
 */
	class Sop extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SopRevision
 *
 * @property int $id
 * @property string $sop_id
 * @property string $judul
 * @property string $kode_dokumen
 * @property string $rincian_revisi
 * @property string $revisi
 * @property string $tgl_efektif
 * @property int $pic
 * @property string $jenis
 * @property int $dept
 * @property string $file
 * @property string $status
 * @property mixed|null $copy_doc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision query()
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereCopyDoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereDept($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereKodeDokumen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereRevisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereRincianRevisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereSopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereTglEfektif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SopRevision whereUpdatedAt($value)
 */
	class SopRevision extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Spec
 *
 * @property int $id
 * @property int $produk_id
 * @property mixed|null $bulk_density
 * @property string|null $salinity
 * @property string|null $mesh_20
 * @property string|null $mesh_40
 * @property string|null $mesh_4
 * @property string|null $mesh_4_6
 * @property string|null $mesh_5_6
 * @property string|null $mesh_20_max
 * @property string|null $mesh_1_4
 * @property string|null $mesh_1_4_5
 * @property string|null $mesh_6
 * @property string|null $mesh_6_10
 * @property string|null $kadar_air
 * @property string|null $salmonella
 * @property string|null $tpc
 * @property string|null $entero
 * @property string|null $ym
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Produk $produk
 * @method static \Illuminate\Database\Eloquent\Builder|Spec newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spec newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spec query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereBulkDensity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereEntero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereKadarAir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereMesh14($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereMesh145($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereMesh20($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereMesh20Max($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereMesh4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereMesh40($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereMesh46($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereMesh56($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereMesh6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereMesh610($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereProdukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereSalinity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereSalmonella($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereTpc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spec whereYm($value)
 */
	class Spec extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Template
 *
 * @property int $id
 * @property string $name
 * @property mixed $kriteria_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Template> $produk
 * @property-read int|null $produk_count
 * @method static \Illuminate\Database\Eloquent\Builder|Template newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Template newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Template query()
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereKriteriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereUpdatedAt($value)
 */
	class Template extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ujirm
 *
 * @property int $id
 * @property string $tgl_datang
 * @property int $nama_produk_supplier_id
 * @property string|null $supplier_id
 * @property string $no_batch
 * @property string $halal
 * @property string $bersih
 * @property string $kondisi
 * @property string $aroma
 * @property string $bentuk
 * @property string $warna
 * @property string|null $sebutkan
 * @property int $sample
 * @property string $asing
 * @property string|null $coa
 * @property string|null $rasa
 * @property float|null $suhu
 * @property string|null $note
 * @property string $status
 * @property string $qty
 * @property string|null $start_smp
 * @property string|null $end_smp
 * @property string|null $date_smp
 * @property string|null $user_name
 * @property string $comp_doc
 * @property string|null $ash
 * @property string|null $wet_gluten
 * @property string|null $protein
 * @property string|null $f_number
 * @property string|null $lab
 * @property string|null $ka_beras
 * @property string|null $ka_beras_qc
 * @property string $cek_area
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\produkSupplier $jenis
 * @property-read \App\Models\namaProduk_supplier $nama_produk_supplier
 * @property-read \App\Models\supplier|null $produsen_supplier
 * @property-read \App\Models\supplier $supplier
 * @method static \Database\Factories\UjirmFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereAroma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereAsh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereAsing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereBentuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereBersih($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereCekArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereCoa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereCompDoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereDateSmp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereEndSmp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereFNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereHalal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereKaBeras($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereKaBerasQc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereKondisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereLab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereNamaProdukSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereNoBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereProtein($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereRasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereSample($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereSebutkan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereStartSmp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereSuhu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereTglDatang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereWarna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ujirm whereWetGluten($value)
 */
	class Ujirm extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property int $departement_id
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Spatie\Activitylog\Models\Activity|null $causer
 * @property-read \App\Models\Departement $departement
 * @property-read \App\Models\Lkt|null $lkt
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Sop|null $picss
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\Usersop|null $usersop
 * @property-read \App\Models\Usersop|null $usersopp
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDepartementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Usersop
 *
 * @property int $id
 * @property int $user_id
 * @property int $departement_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Departement $departement
 * @property-read \App\Models\Sop $dokumen
 * @property-read \App\Models\User $usersop
 * @property-read \App\Models\User|null $usersopp
 * @method static \Illuminate\Database\Eloquent\Builder|Usersop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usersop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usersop query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usersop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usersop whereDepartementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usersop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usersop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usersop whereUserId($value)
 */
	class Usersop extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Wo
 *
 * @property int $id
 * @property int $user_id
 * @property string $nama
 * @property string $subject
 * @property int $departement_id
 * @property string $prioritas
 * @property string $jenis_bantuan
 * @property string $content
 * @property string $foto
 * @property string $due_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Departement $dept
 * @method static \Illuminate\Database\Eloquent\Builder|Wo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereDepartementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereJenisBantuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo wherePrioritas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wo whereUserId($value)
 */
	class Wo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\bintikHitam
 *
 * @property int $id
 * @property string $tanggal
 * @property string $jam
 * @property int $produk_id_1
 * @property string|null $bintik_hitam_dd1
 * @property string|null $partikel_hitam_dd1
 * @property string|null $benda_asing_dd1
 * @property string|null $catatan_dd1
 * @property float|null $gumpalan_dd1
 * @property float|null $dd1
 * @property int $produk_id_2
 * @property string|null $bintik_hitam_dd2
 * @property string|null $partikel_hitam_dd2
 * @property string|null $benda_asing_dd2
 * @property string|null $catatan_dd2
 * @property float|null $gumpalan_dd2
 * @property float|null $dd2
 * @property int $produk_id_3
 * @property string|null $bintik_hitam_dd3
 * @property string|null $partikel_hitam_dd3
 * @property string|null $benda_asing_dd3
 * @property string|null $catatan_dd3
 * @property float|null $gumpalan_dd3
 * @property float|null $dd3
 * @property int $produk_id_4
 * @property string|null $bintik_hitam_dd4
 * @property string|null $partikel_hitam_dd4
 * @property string|null $benda_asing_dd4
 * @property string|null $catatan_dd4
 * @property float|null $gumpalan_dd4
 * @property float|null $dd4
 * @property string|null $bulan
 * @property int|null $tahun
 * @property string|null $op
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\NamaProduk $produk1
 * @property-read \App\Models\NamaProduk $produk2
 * @property-read \App\Models\NamaProduk $produk3
 * @property-read \App\Models\NamaProduk $produk4
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam query()
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereBendaAsingDd1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereBendaAsingDd2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereBendaAsingDd3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereBendaAsingDd4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereBintikHitamDd1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereBintikHitamDd2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereBintikHitamDd3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereBintikHitamDd4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereBulan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereCatatanDd1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereCatatanDd2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereCatatanDd3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereCatatanDd4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereDd1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereDd2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereDd3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereDd4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereGumpalanDd1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereGumpalanDd2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereGumpalanDd3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereGumpalanDd4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereJam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereOp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam wherePartikelHitamDd1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam wherePartikelHitamDd2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam wherePartikelHitamDd3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam wherePartikelHitamDd4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereProdukId1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereProdukId2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereProdukId3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereProdukId4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bintikHitam whereUpdatedAt($value)
 */
	class bintikHitam extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\dd_ccpdry
 *
 * @property int $id
 * @property string $tanggal
 * @property string $jam
 * @property float|null $dd1
 * @property string|null $foto1
 * @property float|null $dd2
 * @property string|null $foto2
 * @property float|null $dd3
 * @property string|null $foto3
 * @property float|null $dd4
 * @property string|null $foto4
 * @property string|null $catatan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry query()
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereDd1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereDd2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereDd3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereDd4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereFoto1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereFoto2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereFoto3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereFoto4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereJam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|dd_ccpdry whereUpdatedAt($value)
 */
	class dd_ccpdry extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\namaProduk_supplier
 *
 * @property int $id
 * @property int $supplier_id
 * @property int $produk_supplier_id
 * @property string $nama_produk
 * @property string $satuan
 * @property string $kemasan
 * @property int $berat
 * @property string|null $masa_halal
 * @property string|null $by_halal
 * @property string $kode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\produkSupplier $produk_supplier
 * @property-read \App\Models\Ujirm|null $rm
 * @property-read \App\Models\supplier $supplier
 * @method static \Database\Factories\NamaProdukSupplierFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereBerat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereByHalal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereKemasan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereMasaHalal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereNamaProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereProdukSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|namaProduk_supplier whereUpdatedAt($value)
 */
	class namaProduk_supplier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\produkSupplier
 *
 * @property int $id
 * @property string $kode_jenis
 * @property string $jenis_produk
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\namaProduk_supplier|null $namaProduk_supplier
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ujirm> $supplier
 * @property-read int|null $supplier_count
 * @method static \Database\Factories\ProdukSupplierFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|produkSupplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|produkSupplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|produkSupplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|produkSupplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|produkSupplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|produkSupplier whereJenisProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|produkSupplier whereKodeJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|produkSupplier whereUpdatedAt($value)
 */
	class produkSupplier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\shift
 *
 * @property int $id
 * @property int $shift
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hold_reject_wip> $hold
 * @property-read int|null $hold_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, shift> $pengujian
 * @property-read int|null $pengujian_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Perintah> $perintah
 * @property-read int|null $perintah_count
 * @method static \Illuminate\Database\Eloquent\Builder|shift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|shift newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|shift query()
 * @method static \Illuminate\Database\Eloquent\Builder|shift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|shift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|shift whereShift($value)
 * @method static \Illuminate\Database\Eloquent\Builder|shift whereUpdatedAt($value)
 */
	class shift extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\supplier
 *
 * @property int $id
 * @property string|null $nama_supplier
 * @property string|null $asal_supplier
 * @property string $nama_produsen
 * @property string $asal_produsen
 * @property string $alamat1
 * @property string|null $alamat2
 * @property string|null $no_tlp
 * @property string $nama_pic
 * @property string $jabatan
 * @property string $email
 * @property string $no_hp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\namaProduk_supplier> $namaProduk_supplier
 * @property-read int|null $nama_produk_supplier_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ujirm> $ujirm
 * @property-read int|null $ujirm_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ujirm> $ujirm_supplier
 * @property-read int|null $ujirm_supplier_count
 * @method static \Database\Factories\ProdusenFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereAlamat1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereAlamat2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereAsalProdusen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereAsalSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereNamaPic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereNamaProdusen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereNamaSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereNoTlp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|supplier whereUpdatedAt($value)
 */
	class supplier extends \Eloquent {}
}

