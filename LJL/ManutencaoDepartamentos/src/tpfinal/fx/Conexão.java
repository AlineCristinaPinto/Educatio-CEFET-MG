package tpfinal.fx;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;


public class Conexão {
    
    public Connection getConnection() {
	try {
	    return DriverManager.getConnection(
            "jdbc:mysql://localhost/educatio", "LeoGomide", "");
	} catch (SQLException e) {
	    throw new RuntimeException(e);
	}
    }
    
}

