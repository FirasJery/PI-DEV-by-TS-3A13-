/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.services;

import freelancy.entities.Certification;
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
public class ServiceCertification implements Iservice<Certification>{
    Connection cnx = DataSource.getInstance().getCnx();
    ServiceCategorie sc = new ServiceCategorie();
    ServiceTest ss = new ServiceTest();
    ServiceFreelancer sf = new ServiceFreelancer();
    
    @Override
    public void ajouter(Certification p) {
        try {
            int etat  = 0; 
            if (p.isEtat() == true)
            {
                etat = 1 ;
            }
            else {
                etat = 0 ; 
            }
            String req = "INSERT INTO `certification` (`nom`, `description`, `badge` ,`score`, `duree`, `etat`,`nbrTentative`,`idCategorie`,`idTest`,`idFreelancer`) VALUES ('" + p.getNom() + "', '" + p.getDescription() + "', '" + p.getBadge() + "', '" + p.getScore() + "', '" + p.getDuree() + "', '" + etat + "', '" + p.getNbrTentative() + "', '" + p.getCategorie().getIdCategorie()+ "', '" + p.getTest().getIdTest()+ "', '" + p.getFreelancer().getIdFreelancer()+ "')";
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Certification created !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    /*@Override
    public void ajouter(Certification p) {
        try {
    int etat  = 0; 
            if (p.isEtat() == true)
            {
                etat = 1 ;
            }
            else {
                etat = 0 ; 
            }
            String req = "INSERT INTO `certification` (`nom`, `description`, `badge` ,`score`, `duree`, `etat`,`nbrTentative`,idCategorie`,`idTest`,`idFreelancer` ) VALUES (?,?,?,?,?,?,?,?,?,?)";
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setString(2, p.getNom());
            ps.setString(3, p.getDescription());
            ps.setString(4, p.getBadge());
            ps.setInt(5, p.getScore());
            ps.setTime(6, p.getDuree());
            ps.setBoolean(7, true);
            ps.setInt(8, p.getNbrTentative());
            ps.setLong(9, p.getIdCategorie());
            ps.setLong(10, p.getIdTest());
            ps.setLong(11, p.getIdFreelancer());
            ps.executeUpdate();
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }*/
    
    @Override
    public void supprimer(long id) {
        try {
            String req = "DELETE FROM `certification` WHERE idCertif = " + id;
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Certification deleted !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @Override
    public void modifier(Certification p) {
        try {
            String req = "UPDATE `certification` SET `nom` = '" + p.getNom() + "', `description` = '" + p.getDescription() + "', `badge` = '" + p.getBadge() + "', `score` = '" + p.getScore() + "', `duree` = '" + p.getDuree() + "', `etat` = '" + p.isEtat() + "', `nbrTentative` = '" + p.getNbrTentative() + "' WHERE `certification`.`idCertif` = " + p.getIdCertif();
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Certification updated !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @Override
    public List<Certification> getAll() {
        List<Certification> list = new ArrayList<>();
        try {
            String req = "SELECT * FROM certification";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                Certification p = new Certification(rs.getLong(1),rs.getString(2),rs.getString(3),rs.getString(4),rs.getInt(5),rs.getTime(6),rs.getBoolean(7),rs.getInt(8),sc.getOneById(rs.getLong(9)) ,ss.getOneById(rs.getLong(10)),sf.getOneById(rs.getLong(10)));
                list.add(p);
                
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }
    
    @Override
    public Certification getOneById(long id) {
        Certification p = null;
        try {
            String req = "SELECT * FROM certification";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                p = new Certification(rs.getLong(1),rs.getString(2),rs.getString(3),rs.getString(4),rs.getInt(5),rs.getTime(6),rs.getBoolean(7),rs.getInt(8),sc.getOneById(rs.getLong(9)) ,ss.getOneById(rs.getLong(10)),sf.getOneById(rs.getLong(10)));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return p;
    }
    
}
