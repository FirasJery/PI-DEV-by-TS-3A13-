/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

import entities.Admin;
import entities.Entreprise;
import entities.Freelancer;
import entities.Utilisateur;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import utils.DataSource;

/**
 *
 * @author Firas
 */
public class ServiceUser implements IService<Utilisateur> {

    Connection cnx = DataSource.getInstance().getCnx();

    @Override
    public void ajouter(Utilisateur p) {
        if (p instanceof Admin) {
            try {
                String req = "INSERT INTO `Utilisateur` (`name`, `email`, `password`, `role`) VALUES "
                        + "('" + p.getName() + "', '" + p.getEmail() + "' , '" + p.getPassword() + "' , 'Admin')";
                Statement st = cnx.createStatement();
                st.executeUpdate(req);
                System.out.println("Admin created !");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }
        } else if (p instanceof Entreprise) {
            try {
                Entreprise e;
                e = (Entreprise) p;
                String req = "INSERT INTO `Utilisateur` (`name`, `email`, `password`, `role`, `domaine`,`info`,`location`,`nbe`) VALUES "
                        + "('" + e.getName() + "', '" + e.getEmail() + "' , '" + e.getPassword() + "' , 'Entreprise', '" + e.getDomaine() + "', '" + e.getInfo() + "', '" + e.getLocation() + "', '" + e.getNumberOfEmployees() + "')";
                Statement st = cnx.createStatement();
                st.executeUpdate(req);
                System.out.println("Entreprise created !");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }
        } else if (p instanceof Freelancer) {
            try {
                Freelancer e;
                e = (Freelancer) p;
                String req = "INSERT INTO `Utilisateur` (`name`, `email`, `password`, `role`, `bio`, `experience`, `education`, `total_jobs`) VALUES "
                        + "('" + e.getName() + "', '" + e.getEmail() + "' , '" + e.getPassword() + "' , 'Freelancer', '" + e.getBio() + "', '" + e.getExperience() + "', '" + e.getEducation() + "', '" + e.getTotal_jobs() + "')";
                Statement st = cnx.createStatement();
                st.executeUpdate(req);
                System.out.println("Freelancer created !");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }
        }
    }

    @Override
    public void supprimer(int id) {
        try {
            String req = "DELETE FROM utilisateur WHERE id = " + id;
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("utilisateur deleted !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    @Override
    public void modifier(Utilisateur p) {

        if (p instanceof Admin) {
            try {

                String req = "UPDATE `utilisateur` SET `name` = '" + p.getName() + "', `email` = '" + p.getEmail()
                        + "',`password` = '" + p.getPassword() + "',`role` = '" + p.getRole() + "' WHERE `utilisateur`.`id` = " + p.getId();
                Statement st = cnx.createStatement();
                st.executeUpdate(req);
                System.out.println("Admin updated !");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }
        } else if (p instanceof Freelancer) {
            try {
                Freelancer e;
                e = (Freelancer) p;
                String req = "UPDATE `utilisateur` SET `name` = '" + e.getName() + "', `email` = '" + e.getEmail() + "',`password` = '" + e.getPassword() + "',`role` = '"
                        + e.getRole() + "',`bio` = '" + e.getBio() + "',`experience` = '" + e.getExperience() + "',`education` = '" + e.getEducation() + "',`total_jobs` = '" + e.getTotal_jobs() + "' WHERE `utilisateur`.`id` = " + e.getId();
                Statement st = cnx.createStatement();
                st.executeUpdate(req);
                System.out.println("Freelancer updated !");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }

        } else if (p instanceof Entreprise) {

            try {
                Entreprise e;
                e = (Entreprise) p;
                String req = "UPDATE `utilisateur` SET `name` = '" + e.getName() + "', `email` = '" + e.getEmail() + "',`password` = '" + e.getPassword() + "',`role` = '" + e.getRole()
                        + "',`domaine` = '" + e.getDomaine() + "',`info` = '" + e.getInfo() + "',`location` = '" + e.getLocation() + "',`nbe` = '" + e.getNumberOfEmployees() + "' WHERE `utilisateur`.`id` = " + e.getId();
                Statement st = cnx.createStatement();
                st.executeUpdate(req);
                System.out.println("Freelancer updated !");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }

        }
    }

    @Override
    public List<Utilisateur> getAll() {
        List<Utilisateur> list = new ArrayList<>();
        try {
            String req = "Select * from utilisateur";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                Admin p;
                Entreprise e;
                Freelancer f;
                switch (rs.getString("role")) {
                    case "Admin":
                        p = new Admin(rs.getInt(1), rs.getString(2), rs.getString(3), rs.getString(4), rs.getString(5));
                        list.add(p);
                        break;
                    case "Entreprise":
                        e = new Entreprise(rs.getString("domaine"), rs.getString("info"), rs.getString("location"), rs.getInt("nbe"), rs.getInt("id"), rs.getString("name"), rs.getString("email"), rs.getString("password"), rs.getString("role"));
                        list.add(e);
                        break;
                    case "Freelancer":
                        f = new Freelancer(rs.getString("bio"), rs.getString("experience"), rs.getString("education"), rs.getInt("total_jobs"), rs.getInt("id"), rs.getString("name"), rs.getString("email"), rs.getString("password"), rs.getString("role"));
                        list.add(f);
                        break;
                    default:
                        break;
                }
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }

    @Override
    public Utilisateur getOneById(int id) {
        Utilisateur p = null;
        try {
            String req = "Select * from utilisateur where id = '" + id + "'";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                switch (rs.getString("role")) {
                    case "Admin":
                        p = new Admin(rs.getInt(1), rs.getString(2), rs.getString(3), rs.getString(4), rs.getString(5));
                        break;
                    case "Entreprise":
                        p = new Entreprise(rs.getString("domaine"), rs.getString("info"), rs.getString("location"), rs.getInt("nbe"), rs.getInt("id"), rs.getString("name"), rs.getString("email"), rs.getString("password"), rs.getString("role"));
                        break;
                    case "Freelancer":
                        p = new Freelancer(rs.getString("bio"), rs.getString("experience"), rs.getString("education"), rs.getInt("total_jobs"), rs.getInt("id"), rs.getString("name"), rs.getString("email"), rs.getString("password"), rs.getString("role"));
                        break;
                    default:
                        break;
                }
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return p;
    }

    public int authentification(String email, String password) {

        int id = -1;

        try {
            String req = "SELECT * from `utilisateur` WHERE `utilisateur`.`email` ='" + email + "' && `utilisateur`.`password` = '" + password + "' ";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) { 
               id = rs.getInt("id");      
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return id;

    }

}
