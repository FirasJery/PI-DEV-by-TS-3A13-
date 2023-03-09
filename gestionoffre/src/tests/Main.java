/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tests;

import entities.Entreprise;
import entities.Freelancer;
import entities.Offre;
import entities.Postulation;
import java.time.LocalDate;
import javafx.util.converter.LocalDateStringConverter;
import services.ServiceOffre;
import services.ServicePostulation;
import java.sql.Connection;
import java.sql.DriverManager;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Firas
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        ServiceOffre so = new ServiceOffre();
        Entreprise e = new Entreprise();
        e.setId(30);

        LocalDate date_debut = LocalDate.of(2023, 7, 30);
        LocalDate date_fin = LocalDate.of(2023, 10, 30);
        Offre o = new Offre(6, "modif", "de", "ca", "ty", 19, 87, 1888, e, date_debut, date_fin);
        

   
           so.ajouter(o);
            System.out.println(so.getOneById(6));
                        

                        



//System.out.println(so.getOneById(2));

       //ServicePostulation sp = new ServicePostulation();
       // Freelancer f = new Freelancer();
        //f.setId(22); // Cureent online freelnacer 
        //Postulation p = new Postulation(1,o, f, 0);
        //sp.ajouter(p);
        //sp.modifier(p);
        //sp.supprimer(2);
        //System.out.println(sp.getAll());

    }

}
