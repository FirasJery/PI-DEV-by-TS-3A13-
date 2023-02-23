/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.service;
import freelancy.entite.transaction;
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
 * @author Ghass
 */
public class transaction_service implements Iservice<transaction>{
    Connection cnx = DataSource.getInstance().getCnx();
     @Override
    public void ajouter(transaction t) {
        try {
            String req = "INSERT INTO `transaction (date, montant,sending_wallet,rec_wallet,etat) VALUES ('" + t.getDate() + "', '" + t.getMontant() + "','" + t.getS_wallet() + "','" + t.getR_wallet() + "','" + t.isEtat() + "')";
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("transaction added !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
     @Override
    public void supprimer(long id) {
        try {
            String req = "DELETE FROM `transaction` WHERE id = " + id;
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("transaction deleted !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
   
    @Override
    public void modifier(transaction t) {
        try {
            String req = "UPDATE transaction SET date = '" + t.getDate() + "', montant = '" + t.getMontant() + "',sending_wallet ='"+t.getS_wallet() +"',rec_wallet='"+t.getR_wallet() +"',etat= '"+t.isEtat()+"' WHERE `personne`.`id` = " + t.getId();
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("transaction updated !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    } 
    
     @Override
    public List<transaction> getAll() {
        List<transaction> list = new ArrayList<>();
        try {
            String req = "Select * from transaction";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                transaction t = new transaction(rs.getLong(1), rs.getDate(2), rs.getFloat(3),rs.getLong(4),rs.getLong(5),rs.getBoolean(6));
                list.add(t);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }
    @Override
    public transaction getOneById(long id) {
        transaction t = null;
        try {
            String req = "Select * from personne";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                t =  new transaction(rs.getLong(1), rs.getDate(2), rs.getFloat(3),rs.getLong(4),rs.getLong(5),rs.getBoolean(6));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return t;
    }
}
