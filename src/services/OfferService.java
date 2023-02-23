/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

import connector.SQLConnection;
import entities.offre;
import interfaces.IOffer;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author solta
 */
public class OfferService implements IOffer {
    private final SQLConnection sqlConnection = SQLConnection.getInstance();
    @Override
    public int createOffer(offre offre) throws SQLException {//tajouti 
        String query = "INSERT INTO offer (id_offre, title, description, category,type,checkpoint,duree) VALUES (?, ?, ?, ?, ?, ?, ?)";
        PreparedStatement statement = sqlConnection.getConnection().prepareStatement(query);
        statement.setInt(1, offre.getId_offre());
        statement.setString(2, offre.getTitle());
        statement.setString(3, offre.getDescription());
        statement.setString(4, offre.getCategory());
        statement.setString(5, offre.getType());
        statement.setString(6, offre.getCheckpoint());
        statement.setString(7, offre.getDuree());

        return statement.executeUpdate();
    }
    @Override
    public int updateOffre(int id, offre offre) throws SQLException {
        String query = "UPDATE offer SET id_offre = ?, title = ?, description = ?, category = ?, type = ?, checkpoint = ?, duree = ? WHERE id_offre = ?";
        PreparedStatement statement = sqlConnection.getConnection().prepareStatement(query);
        statement.setInt(1, offre.getId_offre());
        statement.setString(2, offre.getTitle());
        statement.setString(3, offre.getDescription());
        statement.setString(4, offre.getCategory());
        statement.setString(5, offre.getType());
         statement.setString(6, offre.getCheckpoint());
          statement.setString(7, offre.getDuree());
        statement.setInt(8, id);
        return statement.executeUpdate();
    }

    @Override
    public int deleteOffre(int id) throws SQLException {
        String query = "DELETE FROM offer WHERE id_offre = ?";
        PreparedStatement statement = sqlConnection.getConnection().prepareStatement(query);
        statement.setInt(1, id);
        return statement.executeUpdate();

    }

   

    @Override
    public List<offre> getAlloffres() throws SQLException {
        List<offre> Offres = new ArrayList<>();
        String query = "SELECT id_offre, title, description, category, type,checkpoint,duree FROM offer";
        PreparedStatement statement = sqlConnection.getConnection().prepareStatement(query);
        ResultSet result = statement.executeQuery();
        while (result.next()) {
            int id_offre = result.getInt("id_offre");
            String title = result.getString("title");
            String description = result.getString("description");
            String category = result.getString("category");
            String type = result.getString("type");
              String checkpoint = result.getString("checkpoint");
                String duree = result.getString("duree");
            offre offre = new offre(id_offre, title, description, category, type,checkpoint,duree);
            Offres.add(offre);
        }
        return Offres;
    }
}