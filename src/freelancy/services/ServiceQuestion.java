/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.services;

import freelancy.entities.Question;
import freelancy.entities.Test;
import freelancy.utils.DataSource;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
/**
 *
 * @author hichem
 */
public class ServiceQuestion implements Iservice<Question> {
    Connection cnx = DataSource.getInstance().getCnx();
    
    @Override
    public void ajouter(Question p) {
        try {
            String req = "INSERT INTO `question` (`question`,`reponse`,`note`,`idTest`) VALUES ('" + p.getQuestion() + "', '"  + p.getReponse() + "', '" +  p.getNote() + "', '" +  p.getIdTest() + "')";
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Question created !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    
    
    @Override
    public void supprimer(long id) {
        try {
            String req = "DELETE FROM `question` WHERE idQuest = " + id;
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Question deleted !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @Override
    public void modifier(Question p) {
        try {
            String req = "UPDATE `question` SET `question` = '" + p.getQuestion() + "', `reponse` = '" + p.getReponse() + "', `note` = '" + p.getNote() +  "' WHERE `question`.`idQuest` = " + p.getIdQuest();
            Statement st = cnx.createStatement();
            st.executeUpdate(req);
            System.out.println("Question updated !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    @Override
    public List<Question> getAll() {
        List<Question> list = new ArrayList<>();
        try {
            String req = "SELECT * FROM question";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                Question p = new Question(rs.getLong(1), rs.getString(2), rs.getString(3), rs.getInt(4),rs.getLong(5));
                list.add(p);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }
    
    public List<Question> getQuestions(long id) {
        List<Question> list = new ArrayList<>();
        
        try {
            String req = "SELECT question.question,question.reponse,question.note FROM question WHERE question.idTest = '"+id+"'";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                Question p = new Question( rs.getString(1), rs.getString(2), rs.getInt(3));
                list.add(p);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }
    
    /*public List<String> getAllQuestions(long id) {
        List<String> list = new ArrayList<>();
        
        try {
            String req = "SELECT  FROM question WHERE question.idTest = '"+id+"'";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                String p = new String(rs.getLong(1), rs.getString(2), rs.getString(3), rs.getInt(4),rs.getLong(5));
                list.add(p);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return list;
    }*/
    
    @Override
    public Question getOneById(long id) {
        Question p = null;
        try {
            String req = "SELECT * FROM question";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                p = new Question(rs.getLong(1), rs.getString(2), rs.getString(3), rs.getInt(4),rs.getLong(5));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        return p;
    }
    
    public  long getLastId(Test p) {
    long lastId = 0;
    try {
            String req = "SELECT test.idTest FROM test ORDER BY idTest DESC LIMIT 1";
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                lastId = rs.getLong("idTest");
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    return lastId;
    }
    
}
