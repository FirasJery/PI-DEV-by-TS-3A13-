/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sevices;

import entities.Admin;
import entities.Entreprise;
import entities.Freelancer;
import entities.Utilisateur;
import java.sql.Connection;
import java.sql.PreparedStatement;
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
                String req = "INSERT INTO `Utilisateur` (`name`,`LastName`,`UserName`, `email`, `password`, `role`, `ImagePAth` ) VALUES (?,?,?,?,?,?,?)";
                PreparedStatement ps = cnx.prepareStatement(req);
                ps.setString(1, p.getName());
                ps.setString(2, p.getLastName());
                ps.setString(3, p.getUserName());
                ps.setString(4, p.getEmail());
                ps.setString(5, p.getPassword());
                ps.setString(6, "Admin");
                ps.setString(7, p.getImagePath());

                ps.executeUpdate();
                System.out.println("Admin created !");

            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }
        } else if (p instanceof Entreprise) {

            try {
                Entreprise e = (Entreprise) p;
                String req = "INSERT INTO `Utilisateur` (`name`,`LastName`,`UserName`, `email`, `password`, `role`, `ImagePath` ,`domaine`,`info`,`location`,`nbe`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                PreparedStatement ps = cnx.prepareStatement(req);
                ps.setString(1, e.getName());
                ps.setString(2, e.getLastName());
                ps.setString(3, e.getUserName());
                ps.setString(4, e.getEmail());
                ps.setString(5, e.getPassword());
                ps.setString(6, "Entreprise");
                ps.setString(7, e.getImagePath());
                ps.setString(8, e.getDomaine());
                ps.setString(9, e.getInfo());
                ps.setString(10, e.getLocation());
                ps.setInt(11, e.getNumberOfEmployees());

                ps.executeUpdate();
                System.out.println("Entreprise created !");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }

        } else if (p instanceof Freelancer) {

            try {
                Freelancer e = (Freelancer) p;
                String req = "INSERT INTO `Utilisateur` (`name`,`LastName`,`UserName`, `email`, `password`, `role`, `ImagePath` ,`bio`, `experience`, `education`, `total_jobs`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                PreparedStatement ps = cnx.prepareStatement(req);
                ps.setString(1, e.getName());
                ps.setString(2, e.getLastName());
                ps.setString(3, e.getUserName());
                ps.setString(4, e.getEmail());
                ps.setString(5, e.getPassword());
                ps.setString(6, "Freelancer");
                ps.setString(7, e.getImagePath());
                ps.setString(8, e.getBio());
                ps.setString(9, e.getExperience());
                ps.setString(10, e.getEducation());
                ps.setInt(11, e.getTotal_jobs());
                ps.setFloat(12, e.getRating());

                ps.executeUpdate();

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

                String req = "UPDATE Utilisateur SET name = ?, LastName = ? ,UserName = ? , email = ?, password = ?, role = ?, ImagePath = ? WHERE id = ?";
                PreparedStatement ps = cnx.prepareStatement(req);
                ps.setString(1, p.getName());
                ps.setString(2, p.getName());
                ps.setString(3, p.getName());
                ps.setString(4, p.getEmail());
                ps.setString(5, p.getPassword());
                ps.setString(6, p.getRole());
                ps.setString(7, p.getImagePath());
                ps.setInt(8, p.getId());

                ps.executeUpdate();
                System.out.println("Admin updated !");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }
        } else if (p instanceof Freelancer) {

            try {
                Freelancer e = (Freelancer) p;
                String req = "UPDATE Utilisateur SET name = ?, LastName = ? ,UserName = ?, email = ?, password = ?, role = ?, ImagePath = ? , bio = ?, experience = ?, education = ?, total_jobs = ?, rating = ?  WHERE id = ?";
                PreparedStatement ps = cnx.prepareStatement(req);
                ps.setString(1, e.getName());
                ps.setString(2, e.getName());
                ps.setString(3, e.getName());
                ps.setString(4, e.getEmail());
                ps.setString(5, e.getPassword());
                ps.setString(6, e.getRole());
                ps.setString(7, e.getImagePath());
                ps.setString(8, e.getBio());
                ps.setString(9, e.getExperience());
                ps.setString(10, e.getEducation());
                ps.setInt(11, e.getTotal_jobs());
                ps.setFloat(12, e.getRating());
                ps.setInt(13, e.getId());

                ps.executeUpdate();
                System.out.println("Freelancer updated !");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }

        } else if (p instanceof Entreprise) {

            try {
                Entreprise e = (Entreprise) p;
                String req = "UPDATE Utilisateur SET name = ?, email = ?, password = ?, role = ?, ImagePath = ? , domaine = ?, info = ?, location = ?, nbe = ? WHERE id = ?";
                PreparedStatement ps = cnx.prepareStatement(req);
                ps.setString(1, e.getName());
                ps.setString(2, e.getName());
                ps.setString(3, e.getName());
                ps.setString(4, e.getEmail());
                ps.setString(5, e.getPassword());
                ps.setString(6, e.getRole());
                ps.setString(7, e.getImagePath());
                ps.setString(8, e.getDomaine());
                ps.setString(9, e.getInfo());
                ps.setString(10, e.getLocation());
                ps.setInt(11, e.getNumberOfEmployees());
                ps.setInt(12, e.getId());
                ps.executeUpdate(req);
                System.out.println("Entreprise updated !");
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
                        p = new Admin(rs.getInt(1), rs.getString(2), rs.getString(3), rs.getString(4), rs.getString(5), rs.getString(6), rs.getString(7), rs.getString(8));
                        list.add(p);
                        break;
                    case "Entreprise":
                        e = new Entreprise(rs.getString("domaine"), rs.getString("info"), rs.getString("location"), rs.getInt("nbe"), rs.getInt("id"), rs.getString("name"), rs.getString("Lastname"), rs.getString("Username"), rs.getString("email"), rs.getString("password"), rs.getString("role"), rs.getString("ImagePath"));
                        list.add(e);
                        break;
                    case "Freelancer":
                        f = new Freelancer(rs.getString("bio"), rs.getString("experience"), rs.getString("education"), rs.getInt("total_jobs"), rs.getFloat("rating"), rs.getInt("id"), rs.getString("name"), rs.getString("Lastname"), rs.getString("Username"), rs.getString("email"), rs.getString("password"), rs.getString("role"), rs.getString("ImagePath"));
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
                        p = new Admin(rs.getInt(1), rs.getString(2), rs.getString(3), rs.getString(4), rs.getString(5), rs.getString(6), rs.getString(7), rs.getString(8));
                        break;
                    case "Entreprise":
                        p = new Entreprise(rs.getString("domaine"), rs.getString("info"), rs.getString("location"), rs.getInt("nbe"), rs.getInt("id"), rs.getString("name"), rs.getString("Lastname"), rs.getString("Username"), rs.getString("email"), rs.getString("password"), rs.getString("role"), rs.getString("ImagePath"));
                        break;
                    case "Freelancer":
                        p = new Freelancer(rs.getString("bio"), rs.getString("experience"), rs.getString("education"), rs.getInt("total_jobs"), rs.getFloat("rating"), rs.getInt("id"), rs.getString("name"), rs.getString("Lastname"), rs.getString("Username"), rs.getString("email"), rs.getString("password"), rs.getString("role"), rs.getString("ImagePath"));
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

    public int ChercherMail(String email) {

        try {
            String req = "SELECT * from `utilisateur` WHERE `utilisateur`.`email` ='" + email + "'  ";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                if (rs.getString("email").equals(email)) {
                    System.out.println("mail trouvé ! ");
                    return 1;
                }
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return -1;
    }

}
