<?php
echo "<h2>Biodata Siswa</h2>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['submit_biodata'])) {
        $jumlahsiswa = $_POST['jumlahsiswa'];
        $dataSiswa = [];

        for ($i = 1; $i <= $jumlahsiswa; $i++) {
            $dataSiswa[] = [
                "nama" => $_POST["nama$i"],
                "panggilan" => $_POST["panggilan$i"],
                "umur" => $_POST["umur$i"]
            ];
        }

        echo "<h3>Biodata Siswa</h3>";
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><th>No</th><th>Nama Lengkap</th><th>Nama Panggilan</th><th>Umur</th></tr>";

        foreach ($dataSiswa as $index => $siswa) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . htmlspecialchars($siswa['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($siswa['panggilan']) . "</td>";
            echo "<td>" . htmlspecialchars($siswa['umur']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } 

    else {
        $jumlahsiswa = $_POST['jumlahsiswa'];

        echo "<form method='post'>";
        echo "<input type='hidden' name='jumlahsiswa' value='$jumlahsiswa'>";
        
        for ($i = 1; $i <= $jumlahsiswa; $i++) {
            echo "<h3>Biodata Siswa ke-$i</h3>";
            echo "<label>Nama Lengkap:</label><br>";
            echo "<input type='text' name='nama$i' required><br><br>";
            
            echo "<label>Nama Panggilan:</label><br>";
            echo "<input type='text' name='panggilan$i' required><br><br>";
            
            echo "<label>Umur:</label><br>";
            echo "<input type='number' name='umur$i' required><br><br>";
        }

        echo "<button type='submit' name='submit_biodata'>Simpan</button>";
        echo "</form>";
    }
} else {

    echo '<form method="post">';
    echo '<label>Jumlah Siswa:</label>';
    echo '<input type="number" name="jumlahsiswa" required min="1"><br><br>';
    echo '<button type="submit">Submit</button>';
    echo '</form>';
}
?>
