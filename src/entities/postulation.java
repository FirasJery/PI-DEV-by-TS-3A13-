/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entities;

public class postulation {
       int id_postulation;
          int id_offre;
             int id_freelancer;
             String etat;

    public int getId_postulation() {
        return id_postulation;
    }

    public int getId_offre() {
        return id_offre;
    }

    public int getId_freelancer() {
        return id_freelancer;
    }

    public String getEtat() {
        return etat;
    }

    public void setId_postulation(int id_postulation) {
        this.id_postulation = id_postulation;
    }

    public void setId_offre(int id_offre) {
        this.id_offre = id_offre;
    }

    public void setId_freelancer(int id_freelancer) {
        this.id_freelancer = id_freelancer;
    }

    public void setEtat(String etat) {
        this.etat = etat;
    }

    public postulation() {
    }

    public postulation(int id_postulation, int id_offre, int id_freelancer, String etat) {
        this.id_postulation = id_postulation;
        this.id_offre = id_offre;
        this.id_freelancer = id_freelancer;
        this.etat = etat;
    }

    public postulation(int id_offre, int id_freelancer, String etat) {
        this.id_offre = id_offre;
        this.id_freelancer = id_freelancer;
        this.etat = etat;
    }

    @Override
    public String toString() {
        return "postulation{" + "id_postulation=" + id_postulation + ", id_offre=" + id_offre + ", id_freelancer=" + id_freelancer + ", etat=" + etat + '}';
    }
             
}
