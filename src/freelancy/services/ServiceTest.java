/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.services;

import freelancy.entities.Test;
import freelancy.entities.Question;
import freelancy.utils.DataSource;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
/**
 *
 * @author hichem
 */
public class ServiceTest implements Iservice<Test> {
    Connection cnx = DataSource.getInstance().getCnx();
    
    @Override
    public void ajouter(Test p) {
        try {
            String req = "INSERT INTO `test` (`nom`, `description`) VALUES ('" + p.getNom() + "', '" + p.getDescription() +  "')";
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("test created !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    /*public void ajouter2(Test p) {
        try {
            String req = "INSERT INTO `test` (`nom`, `description`, `score`, `answer`, `lien`,`reponse` ) VALUES (?,?,?,?,?,?)";
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setString(2, p.getNom());
            ps.setString(3, p.getDescription());
            ps.setString(4, p.getAnswer());
            ps.setString(5, p.getLien());
            ps.setInt(6, p.getScore());
            ps.setBoolean(7, p.isReponse());
            ps.executeUpdate();
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }*/
    
    @Override
    public void supprimer(long id) {
        try {
            String req = "DELETE FROM `test` WHERE idTest = " + id;
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Test deleted !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @Override
    public void modifier(Test p) {
        try {
            String req = "UPDATE `test` SET `nom` = '" + p.getNom() + "', `description` = '" + p.getDescription() +   "' WHERE `test`.`idTest` = " + p.getIdTest();
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Test updated !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @Override
    public List<Test> getAll() {
        List<Test> list = new ArrayList<>();
        try {
            String req = "SELECT * FROM test";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                Test p = new Test( rs.getLong(1),rs.getString(2), rs.getString(3));
                 list.add(p);
                
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }
    
    
    
    
    @Override
    public Test getOneById(long id) {
        Test p = null;
        try {
            String req = "SELECT * FROM test";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                p = new Test(rs.getLong(1), rs.getString(2), rs.getString(3));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return p;
    }
    
    
        
    
}
