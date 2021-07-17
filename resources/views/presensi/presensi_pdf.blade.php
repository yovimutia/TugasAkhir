<!DOCTYPE html>
<html lang="en">
<head>
	<title>Laporan Presensi siswa</title>
	<style type="text/css">
	/*
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		*/
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}
		h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
		text-align: center;
    }
  
    .text-center {
        text-align: center;
    }

	</style>

<center>
		<table>
			<tr>
				<td>
				<td><img src="logo1.png" align="left" width="125" height="60"></td>
				<center>
					<font size="4">LEMBAGA BIMBINGAN BELAJAR</font><br>
					<font size="5"><b>PRIMAGAMA NGAWI</b></font><br>
					<font size="2"><i>Jln. Kartini No. 22 Kode Pos : 68173 Telp./Fax (0331)758005 Ngawi Jawa Timur</i></font>
					<br>
					<hr />
				</center>
				</td>
			</tr>
		</table>
</center>
			
</head>

<body>

							<br>
							<center><font size="3"><b>Laporan Presensi Siswa</b></font></center><br>	
							<table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">No</th>
                                                
                                                <th class="border-top-0">No Induk</th>
                                                <th class="border-top-0">Nama Siswa</th>
                                                <th class="border-top-0">Kelas</th>
                                                <th class="border-top-0">Total Kehadiran</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no =1; @endphp
                                        @foreach ($jumlah_hadir as $presensi)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                
                                                <td>{{ $presensi->NO_INDUK }}</td>
                                                @foreach ($siswa as $s)
                                                @if ($presensi->NO_INDUK == $s->NO_INDUK)
                                                <td>{{ $s->NAMA_SISWA }}</td>
                                                  @foreach ($kelas as $k)
                                                  @if ($s->ID_KELAS == $k->ID_KELAS)
                                                <td>{{ $k->NAMA_KELAS }}</td>
                                                  @endif
                                                  @endforeach
                                                @endif
                                                @endforeach
          
                                                <td>{{ $presensi->total_hadir }}</td>   
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

            
            </tbody>
</body>


</html>