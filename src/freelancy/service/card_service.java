/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.service;

import freelancy.entite.card;
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
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;

/**
 *
 * @author Ghass
 */
public class card_service implements Iservice<card> {
    
    Connection cnx = DataSource.getInstance().getCnx();
     @Override
    public void ajouter(card c) {
        try {
            String req = "INSERT INTO credit_card (nom, prenom,date_expiration,cvc,zipcode,ville,num) VALUES ('" + c.getNom() + "', '" + c.getPrenom() + "','" + c.getDate() + "','" + c.getCvc() + "','" + c.getZipcode() + "','" + c.getVille() + "','" + c.getNum() + "')";
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("card created !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
     @Override
    public void supprimer(long id) {
        try {
            String req = "DELETE FROM credit_card WHERE id = " + id;
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("card deleted !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    @Override
    public void modifier(card c) {
        try {
            String req = "UPDATE credit_card SET nom = '" + c.getNom() + "', prenom = '" + c.getPrenom() + "', date_expiration = '" + c.getDate() + "',cvc = '" + c.getCvc() + "',zipcode = '" + c.getZipcode() + "',ville = '" + c.getVille() + "',num = '" + c.getNum() + "' WHERE credit_card.id = " + c.getId();
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("card updated !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
     @Override
    public List<card> getAll() {
        List<card> list = new ArrayList<>();
        try {
            String req = "Select * from credit_card";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                card c = new card(rs.getLong(1), rs.getString("nom"), rs.getString(3),rs.getString("date_expiration"),rs.getInt("cvc"),rs.getInt("zipcode"),rs.getString("ville"),rs.getLong("num"));
                list.add(c);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }
     @Override
    public card getOneById(long id) {
        card c = null;
        try {
            String req = "Select * from personne";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                 c = new card(rs.getLong(1), rs.getString("nom"), rs.getString(3),rs.getString("date_expiration"),rs.getInt("cvc"),rs.getInt("zipcode"),rs.getString("ville"),rs.getLong("num"));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return c;
    }
    
       public ObservableList<card> find() {
        ObservableList<card> l = FXCollections.observableArrayList(); 
        card_service us = new card_service();
        try {
       String query2="SELECT * FROM credit_card ";
                PreparedStatement smt = cnx.prepareStatement(query2);
                // smt.setInt(1, s);
                card c;
                ResultSet rs= smt.executeQuery(query2);
                while(rs.next()){
                    
                  c=new card(rs.getString("nom"),rs.getString("prenom"),rs.getString("Date_expiration"),rs.getInt("cvc"),rs.getInt("zipcode"),rs.getString("ville"),rs.getLong("num"));
                   l.add(c);
                }
                System.out.println(l);
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
    }
         return l;
}
}