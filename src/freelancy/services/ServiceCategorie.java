/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.services;

import freelancy.entities.Categorie;
import freelancy.utils.DataSource;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author hichem
 */
public class ServiceCategorie implements Iservice<Categorie> {
    Connection cnx = DataSource.getInstance().getCnx();
    
    @Override
    public void ajouter(Categorie p) {
        try {
            String req = "INSERT INTO `categorie` (`nom`) VALUES ('" + p.getNom() + "')";
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Categorie created !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @Override
    public void supprimer(long id) {
        try {
            String req = "DELETE FROM `categorie` WHERE idCategorie = " + id;
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Test deleted !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @Override
    public void modifier(Categorie p) {
        try {
            String req = "UPDATE `categorie` SET `nom` = '" + p.getNom() +  "' WHERE `categorie`.`idCategorie` = " + p.getIdCategorie();
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Test updated !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @Override
    public List<Categorie> getAll() {
        List<Categorie> list = new ArrayList<>();
        try {
            String req = "SELECT * FROM categorie";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                Categorie p = new Categorie(rs.getLong(1), rs.getString(2));
                list.add(p);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }
    
    @Override
    public Categorie getOneById(long id) {
        Categorie p = null;
        try {
            String req = "SELECT * FROM categorie";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                p = new Categorie(rs.getLong(1), rs.getString(2));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return p;
    }
}
