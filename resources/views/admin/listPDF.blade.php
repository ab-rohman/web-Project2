<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>STATUS</th>
                                        <th>DOCUMENT</th>
                                        <th>TANGGAL</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($terima as $usr)
                                        <tr class="text-center">
                                            <td>{{$usr->nik}}</td>
                                            <td>{{$usr->name}}</td>
                                            <td>
                                                @if ($usr->document)
                                                    <div class="text-success">
                                                        Data Sudah Tervalidasi
                                                    </div>
                                                @else
                                                    <div class="text-danger">
                                                        Data Belum Tervalidasi
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($usr->document)
                                                    <div class="text-success">
                                                        Sudah Melengkapi Dokumen
                                                    </div>
                                                @else
                                                    <div class="text-danger">
                                                        Belum Melengkapi Dokumen
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                {{Date('d, D M Y', strtotime($usr->tanggal_validasi)) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
</body>
</html>