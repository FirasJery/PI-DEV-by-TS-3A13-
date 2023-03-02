/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

import entities.Utilisateur;
import entities.Wallet;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import utils.DataSource;

/**
 *
 * @author Ghass
 */
public class ServiceWallet implements IService<Wallet> {
    
    Connection cnx = DataSource.getInstance().getCnx();
     @Override
    public void ajouter(Wallet w) {
        try {
            String req = "INSERT INTO wallet (Nom_wallet, solde,bonus,id_user) VALUES ('" + w.getNum_carte() + "', '" + w.getSolde() + "','" + w.getBonus() + "','" +w.getIduser().getId()+"')";
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Wallet created !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @Override
    public void supprimer(int id) {
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
    public void modifier(Wallet w) {
        try {
            String req = "UPDATE wallet SET Nom_wallet = '" + w.getNum_carte() + "', solde = '" + w.getSolde() + "',bonus = '" + w.getBonus() + "',id_user ='"+w.getIduser().getId()+"' WHERE wallet.id = " + w.getId();
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Wallet updated !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
        public void modifierSolde(Wallet w, float solde) {
             float bonus = (float) (solde * 0.2);
             bonus +=w.getBonus();
        
        try {
            String req = "UPDATE wallet SET  solde = '" +solde + "',bonus = '" + bonus + "' WHERE wallet.id = " + w.getId();
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Wallet updated !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    @Override
    public List<Wallet> getAll() {
        List<Wallet> list = new ArrayList<>();
        try {
            String req = "Select * from wallet";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                Utilisateur u;
                ServiceUser ss = new ServiceUser();
                u = ss.getOneById(rs.getInt(5));
                Wallet w = new Wallet(rs.getInt(1), rs.getString(2), rs.getFloat(3),rs.getFloat(4),u);
                list.add(w);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }
    @Override
    public Wallet getOneById(int id) {
        Wallet w = null;
        try {
            String req = "Select * from wallet WHERE wallet.id = "+id;
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                Utilisateur u;
                ServiceUser ss = new ServiceUser();
                u = ss.getOneById(rs.getInt(5));
                 w = new Wallet(rs.getInt(1), rs.getString(2), rs.getFloat(3),rs.getFloat(4),u);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return w;
    }
    public Wallet getOneByUserId(int id) {
        Wallet w = null;
        try {
            String req = "Select * from wallet WHERE wallet.id_user = "+id;
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                Utilisateur u;
                ServiceUser ss = new ServiceUser();
                u = ss.getOneById(id);
                 w = new Wallet(rs.getInt(1), rs.getString("Nom_wallet"), rs.getFloat(3),rs.getFloat(4),u);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return w;
    }
    
    public void AddSolde(Wallet c , int somme)
    {
     float a =c.getSolde();
     float b = a+somme;
    c.setSolde(b);
    modifierSolde(c,b);
    
    
    }
    

    
}
