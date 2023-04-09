/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Services;

import atelierjdbc.DataSource;
import Entities.Personne;
import java.util.List;
import java.sql.*;
import java.util.ArrayList;

/**
 *
    
 * @author ASUS
 */
public class ServicePersonne implements IService<Personne>{
    private static ServicePersonne instance = null;
    private final Connection cnx;
    private List<Personne> p = new ArrayList<>();
    
    public ServicePersonne(){
        cnx = DataSource.getInstance().getCnx();
    }
    
    public static ServicePersonne getInstance(){
        if(instance == null){
            instance = new ServicePersonne();
            instance.setList(instance.readAll());
        }
        return instance;
    }
    
    private void setList(List<Personne> p){
        this.p = p;
    }
    
    @Override
    public void create(Personne t) throws SQLException {
        PreparedStatement ps;
        ps = cnx.prepareStatement("INSERT INTO PERSONNE(nom, prenom) VALUES(?, ?)");
        ps.setString(1, t.getNom());
        ps.setString(2, t.getPrenom());
        ps.executeUpdate();
        p.add(t);
    }

    @Override
    public List readAll() {
        Statement st;
        List<Personne> l = new ArrayList();
        int i = 0;
        try {
            st = cnx.createStatement();
            ResultSet rs = st.executeQuery("SELECT * FROM PERSONNE");
            while(rs.next()){
                Personne p = new Personne(rs.getInt(1), rs.getString("nom"), rs.getString(3));
                l.add(p);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return l;
    }

    @Override
    public Personne readId(int id) {
        PreparedStatement ps;
        Personne p = null;
        try {
            ps = cnx.prepareStatement("SELECT * FROM PERSONNE WHERE(ID = ?)");
            ps.setString(1, Integer.toString(id));
            ResultSet rs = ps.executeQuery();
            while(rs.next()){
                p = new Personne(rs.getInt(1), rs.getString("nom"), rs.getString("prenom"));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return p;
    }
    
    public Personne readUser(String username){
        PreparedStatement ps;
        Personne p = null;
        try {
            ps = cnx.prepareStatement("SELECT * FROM PERSONNE WHERE(ID = ?)");
            ps.setString(1, username);
            ResultSet rs = ps.executeQuery();
            while(rs.next()){
                p = new Personne(rs.getInt(1), rs.getString("nom"), rs.getString("prenom"));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return p;
    }

    @Override
    public void update(Personne t) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public void delete(int d) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

}
