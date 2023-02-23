/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.test;
import freelancy.entite.card;
import freelancy.entite.wallet;
import freelancy.entite.transaction;
import freelancy.service.card_service;
import freelancy.service.transaction_service;
import freelancy.service.wallet_service;
import freelancy.utils.DataSource;
/**
 *
 * @author Ghass
 */
public class main {
    public static void main(String[] args) {
        
        card c = new card ("ghassen","sahnoun","12/23",252,5000,"Arianna",54690500);
        card_service cs = new card_service();

        wallet_service ws = new wallet_service();
       
        cs.ajouter(c);
        ws.supprimer(1);
        cs.getAll().stream().forEach(System.out::println);
}
}