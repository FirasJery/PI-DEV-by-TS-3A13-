package freelancy.service;
import freelancy.entite.wallet;
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

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Ghass
 */
public class wallet_service implements Iservice<wallet> {
    Connection cnx = DataSource.getInstance().getCnx();
     @Override
    public void ajouter(wallet w) {
        try {
            String req = "INSERT INTO wallet (num_carte, solde,bonus,id_user) VALUES ('" + w.getNum_carte() + "', '" + w.getSolde() + "','" + w.getBonus() + "','" +w.getIduser()+"')";
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Wallet created !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @Override
    public void supprimer(long id) {
        try {
            String req = "DELETE FROM wallet  WHERE id = " + id;
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Wallet deleted !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    @Override
    public void modifier(wallet w) {
        try {
            String req = "UPDATE wallet SET num_carte = '" + w.getNum_carte() + "', solde = '" + w.getSolde() + "',bonus = '" + w.getBonus() + "',id_user ='"+w.getIduser()+"' WHERE wallet.id = " + w.getId();
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Wallet updated !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    @Override
    public List<wallet> getAll() {
        List<wallet> list = new ArrayList<>();
        try {
            String req = "Select * from wallet";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                wallet w = new wallet(rs.getLong(1), rs.getLong(2), rs.getFloat(3),rs.getFloat(4),rs.getLong(5));
                list.add(w);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }
    @Override
    public wallet getOneById(long id) {
        wallet w = null;
        try {
            String req = "Select * from wallet WHERE wallet.id = "+id;
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                w = new wallet(rs.getLong(1), rs.getLong(2), rs.getFloat(3),rs.getFloat(4),rs.getLong(5));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return w;
    }

    
}
