import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class App {
    public static void main(String[] args) {
        String url = "jdbc:mysql://localhost:3306/akademik";
        String username = "root";
        String password = "";
        
        try {
            Connection conn = DriverManager.getConnection(url,
            username, password);
            System.out.println("Koneksi Berhasil!");
            conn.close();
            } catch (SQLException e) {
            System.out.println("Koneksi Gagal: " +
            e.getMessage());
        }

        try {
            Connection conn = DriverManager.getConnection(url,
            username, password);
            System.out.println("Koneksi Berhasil!");

            Statement stmt = conn.createStatement();
            String query = "SELECT * FROM mahasiswa";
            ResultSet rs = stmt.executeQuery(query);

            while (rs.next()) {
            System.out.println("Result: ");
            System.out.println("NIM: " +
            rs.getString("NIM"));
            System.out.println("ID_Seleksi_Masuk: " +
            rs.getInt("ID_Seleksi_Masuk"));
            System.out.println("ID_Program_Studi: " +
            rs.getInt("ID_Program_Studi"));
            System.out.println("Nama: " +
            rs.getString("nama"));
            System.out.println("Angkatan: " +
            rs.getInt("angkatan"));
            System.out.println("Tanggal Lahir: " +
            rs.getDate("tgl_lahir"));
            System.out.println("Kota Lahir: " +
            rs.getString("kota_lahir"));
            System.out.println("IPK:" + rs.getDouble("ipk"));
            System.out.println("Jenis Kelamin: " +
            rs.getString("jenis_kelamin"));
            System.out.println("---------------------------------------------------------");
            }
            } catch (SQLException e) {
            System.out.println("Koneksi Gagal: " +
            e.getMessage());
            }
    }
}