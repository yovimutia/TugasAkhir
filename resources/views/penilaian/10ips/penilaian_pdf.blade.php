<!DOCTYPE html>
<html lang="en">
<head>
	<title>Laporan Penilaian</title>
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
							<center><font size="3"><b>Laporan Nilai Siswa</b></font></center><br><br>
                            <table style="width: 180px;">
                            <tr>
                                <td style="width: 40%;">No Induk</td>
                                <td style="width: 5%;">:</td>
                                <td style="width: 55%;">23412</td>
                            </tr>
                            <tr>
                                <td style="width: 40%;">Nama</td>
                                <td style="width: 5%;">:</td>
                                <td style="width: 55%;"><b>Yovi</b></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;">Kelas</td>
                                <td style="width: 5%;">:</td>
                                <td style="width: 65%;">X Mipa</td>
                            </tr>
                            </table><br><br>

                            <center><font size="3"><b>Laporan Nilai Uji Coba Akhir Semester 2</b></font></center><br>
							<table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">No</th>
                                        <th class="border-top-0">Mata Pelajaran</th>
                                        <th class="border-top-0">Indeks Nilai</th>
                                        <th class="border-top-0">Bobot Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no =1; @endphp
                                @foreach ($siswaku as $s)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $s->NAMA_MAPEL }}</td>
                                        <td>{{ $s->KODE_NILAI }}</td>
                                        <td>{{ $s->JUMLAH_NILAI }}</td>
                                        
                                    </tr>

                                    @endforeach
                                </tbody>
                                    </table>
                                    <br><br><br><br><br><br><br><br><br><br><br><br>
                                    <table>
                                        <tr>
                                        <td style="width: 380px;" align="center"><p style="font-weight: bold; font-size:16px"></p></td>
                                        <td style="width: 200px;" align="left"><font size="3">Manager Cabang,</font></td>  
                                        </tr>
                                    </table>
                                        <p></p>
                                        <p></p>
                                        <p></p><br><br><br>
                                    <table>
                                        <tr>
                                        <td style="width: 380px;" align="center"><p style="font-weight: bold; font-size:16px"></p></td>
                                        <td style="width: 190px;" align="left"><font size="3">Wenny Rosita WR, </font></td>   
                                        </tr>
                                    </table>
                                </div>
                            </div>

            
            </tbody>
</body>


</html>