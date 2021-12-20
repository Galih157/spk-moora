<div class="card">
    <div class="card-header">Data Pegawai</div>

    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3"><strong>Nama</strong></div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-8">{{ $hasil->pegawai->nama }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-3"><strong>Usia</strong></div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-8">{{ $hasil->pegawai->usia }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-3"><strong>Tinggi Badan</strong></div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-8">{{ $hasil->pegawai->tinggi_badan }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-3"><strong>Berat Badan</strong></div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-8">{{ $hasil->pegawai->berat_badan }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-12">Asuransi yang direkomendasikan adalah <strong>{{ $hasil->matriksY->values()->all()[0]['alternatif'] }}</strong></div>
                </div>
            </div>
        </div>
    </div>
</div>
