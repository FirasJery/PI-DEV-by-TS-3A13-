package tests;

import entities.Admin;
import entities.Entreprise;
import entities.Freelancer;
import entities.Utilisateur;
import java.util.ArrayList;
import java.util.List;
import sevices.ServiceUser;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Firas
 */
public class MainClass {
    
     public static void main(String[] args) {

        ServiceUser sa = new ServiceUser();
        
        Admin a = new Admin("3ezzdin", "moudir", "password", "Admin");
        Entreprise e = new Entreprise("e","e","e", 1, "e", "e", "e", "Entreprise");
        Freelancer f = new Freelancer("f", "f", "f", 15, "f", "f", "f", "Freelancer");
        
        Admin am = new Admin(1,"3ezzdinmodiif", "moudir", "password", "Admin");
        Entreprise em = new Entreprise("modddif","e","e", 1,2, "e", "e", "e", "Entreprise");
        Freelancer fm = new Freelancer("modiif", "f", "f", 15, 3,"f", "f", "f", "Freelancer");
      
        
        List <Utilisateur> lu = sa.getAll();
         lu.stream().forEach(System.out::println);
         

        
        
        
        
        
        
        
     
     }
}
