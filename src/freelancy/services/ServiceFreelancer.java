/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.services;

import freelancy.entities.Freelancer;
import java.sql.Statement;
import freelancy.utils.DataSource;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author hichem
 */
public class ServiceFreelancer  {
    Connection cnx = DataSource.getInstance().getCnx();
    
    
    public List<Freelancer> getAll() {
        List<Freelancer> list = new ArrayList<>();
        try {
            String req = "SELECT * FROM test";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                Freelancer p = new Freelancer( rs.getLong(1), rs.getString(2), rs.getString(3));
                 list.add(p);
                
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }
    
    
    public Freelancer getOneById(long id) {
        Freelancer p = null;
        try {
            String req = "SELECT * FROM freelancer";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                p = new Freelancer(rs.getLong(1), rs.getString(2), rs.getString(3));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return p;
    }
}
