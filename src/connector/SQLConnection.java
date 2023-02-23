/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package connector;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
public class SQLConnection {
    
    private static SQLConnection instance;
    private Connection connection;
    private final String host="localhost:3306";
    private final String user="root";
    private final String password="";
    private final String database="safa";

    private SQLConnection() {
    }

    public static SQLConnection getInstance() {
        if (instance == null) {
            instance = new SQLConnection();
        }
        return instance;
    }

    public Connection getConnection() throws SQLException {
        connection = DriverManager.getConnection("jdbc:mysql://" + host + "/" + database, user, password);
        return connection;
    }

}

