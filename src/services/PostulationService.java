/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

import connector.SQLConnection;
import entities.offre;
import entities.postulation;
import interfaces.IOffer;
import interfaces.IPostulation;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author solta
 */
public class PostulationService implements IPostulation {
      private final SQLConnection sqlConnection = SQLConnection.getInstance();
    @Override
    public int createPostulation(postulation postulation) throws SQLException {
        String query = "INSERT INTO postulation (id_postulation, id_offre, id_freelancer, etat) VALUES (?, ?, ?, ?)";
        PreparedStatement statement = sqlConnection.getConnection().prepareStatement(query);
        statement.setInt(1, postulation.getId_postulation());
        statement.setInt(2, postulation.getId_offre());
        statement.setInt(3, postulation.getId_freelancer());
        statement.setString(4, postulation.getEtat());
     

        return statement.executeUpdate();
    }
    @Override
    public int updatePostulation(int id, postulation postulation) throws SQLException {
        String query = "UPDATE postulation SET id_postulation = ?, id_offre = ?, id_freelancer = ?, etat = ? WHERE id_postulation = ?";
        PreparedStatement statement = sqlConnection.getConnection().prepareStatement(query);
        statement.setInt(1, postulation.getId_postulation());
        statement.setInt(2, postulation.getId_offre());
        statement.setInt(3, postulation.getId_freelancer());
        statement.setString(4, postulation.getEtat());
 
        statement.setInt(5, id);
        return statement.executeUpdate();
    }

    @Override
    public int deletePostulation(int id) throws SQLException {
        String query = "DELETE FROM postulation WHERE id_postulation = ?";
        PreparedStatement statement = sqlConnection.getConnection().prepareStatement(query);
        statement.setInt(1, id);
        return statement.executeUpdate();

    }

   

    @Override
    public List<postulation> getAllPostulations() throws SQLException {
        List<postulation> postulations = new ArrayList<>();
        String query = "SELECT id_postulation, id_offre, id_freelancer, etat FROM postulation";
        PreparedStatement statement = sqlConnection.getConnection().prepareStatement(query);
        ResultSet result = statement.executeQuery();
        while (result.next()) {
            int id_postulation = result.getInt("id_postulation");
            int id_offre = result.getInt("id_offre");
            int id_freelancer = result.getInt("id_freelancer");
            String etat = result.getString("etat");
           
            postulation postulation = new postulation(id_postulation, id_offre, id_freelancer, etat);
            postulations.add(postulation);
        }
        return postulations;
    }
}
