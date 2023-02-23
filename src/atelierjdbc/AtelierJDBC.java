/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package atelierjdbc;

import Entities.Personne;
import Services.ServicePersonne;

/**
 *
 * @author ASUS
 */
public class AtelierJDBC {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        DataSource c = DataSource.getInstance();
        ServicePersonne sp = new ServicePersonne();
        Personne p = sp.readId(1);
         System.out.println("oops");
        if(p != null)
            System.out.println(p.getNom());
        else
            System.out.println("oops");
    }
    
}
