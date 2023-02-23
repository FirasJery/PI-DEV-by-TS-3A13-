/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package interfaces;

import entities.offre;
import java.sql.SQLException;
import java.util.List;

/**
 *
 * @author solta
 */
public interface IOffer {
     public int createOffer(offre offre) throws SQLException;
        public int updateOffre(int id, offre offre) throws SQLException;
            public int deleteOffre(int id) throws SQLException;
               public List<offre> getAlloffres() throws SQLException ;
     
    
}
