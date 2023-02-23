/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package safa;

import connector.SQLConnection;
import entities.offre;
import entities.postulation;
import java.sql.Connection;
import java.sql.SQLException;
import services.OfferService;
import services.PostulationService;


public class Safa {

    public static void main(String[] args) {
        
        OfferService o = new OfferService(); //instance mn services bsh n3ayto ll crud method
        PostulationService p = new PostulationService ();
        
  try{
            Connection con = SQLConnection.getInstance().getConnection();//conectina aal base
            System.out.println("successfully connected ");
            
      // o.createOffer(new offre("aa", "description", "category", "type", "checkpoint", "duree"));
      //  o.updateOffre(9, new offre("waaaaaaaaaaaaa", "description", "category", "type", "checkpoint", "duree"));
     // System.out.println(o.getAlloffres());
          //  o.deleteOffre(0);
         //p.createPostulation(new postulation(10,1, "etat"));
      // p.updatePostulation(6, new postulation(10, 6, "etatsssssssss"));
     //System.out.println(p.getAllPostulations());
    // p.deletePostulation(0);
          
              }catch(SQLException e){
            System.err.println(e.fillInStackTrace());
             System.out.println("connection failed ");
        }
    }
    
}
