/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package interfaces;

import entities.postulation;
import java.sql.SQLException;
import java.util.List;

/**
 *
 * @author solta
 */
public interface IPostulation {
    public int createPostulation(postulation postulation) throws SQLException;
     public int updatePostulation(int id, postulation postulation) throws SQLException;
       public int deletePostulation(int id) throws SQLException;
       public List<postulation> getAllPostulations() throws SQLException ;
}
