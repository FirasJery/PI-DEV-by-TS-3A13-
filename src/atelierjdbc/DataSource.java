/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package atelierjdbc;

import java.sql.*;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
/**
 *
 * @author ASUS
 */
public class DataSource {
    private Connection cnx;
    private static DataSource instance;
    
    private final String URL = "jdbc:mysql://localhost:3306/esprit3a13";
    private final String USER = "root";
    private final String PASSWORD = "2013";
    
    Statement ste;

    private DataSource() {
        try {
            cnx = DriverManager.getConnection(URL, USER, PASSWORD);
            System.out.println("Connected to db");
            //ste = cnx.createStatement();
            //ResultSet set = ste.executeQuery("SELECT * FROM PERSONNE");
            
            /*while(set.next()){
                System.out.println(set.getString(1));
            }*/
            
        } catch (SQLException ex) {
            Logger.getLogger(DataSource.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public static DataSource getInstance(){
        if(instance == null)
            instance = new DataSource();
        return instance;
    }
    
    public Connection getCnx() {
        return cnx;
    }
}
