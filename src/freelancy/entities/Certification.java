/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.entities;

import java.util.Objects;
import java.sql.Time;
/**
 *
 * @author hichem
 */
public class Certification {
    
    private long idCertif;
    private String nom;
    private String description;
    private String badge;
    private int score;
    private Time duree;
    private boolean etat;
    private int nbrTentative;
    private Categorie categorie;
    private Test test;
    private Freelancer freelancer;

    public  Certification() {}

    public Certification(String nom, String description, String badge, int score, Time duree, boolean etat, int nbrTentative, Categorie categorie, Test test, Freelancer freelancer) {
        this.nom = nom;
        this.description = description;
        this.badge = badge;
        this.score = score;
        this.duree = duree;
        this.etat = etat;
        this.nbrTentative = nbrTentative;
        this.categorie = categorie;
        this.test = test;
        this.freelancer = freelancer;
    }

    public Certification(long idCertif, String nom, String description, String badge, int score, Time duree, boolean etat, int nbrTentative, Categorie categorie, Test test, Freelancer freelancer) {
        this.idCertif = idCertif;
        this.nom = nom;
        this.description = description;
        this.badge = badge;
        this.score = score;
        this.duree = duree;
        this.etat = etat;
        this.nbrTentative = nbrTentative;
        this.categorie = categorie;
        this.test = test;
        this.freelancer = freelancer;
    }

    public long getIdCertif() {
        return idCertif;
    }

    public void setIdCertif(long idCertif) {
        this.idCertif = idCertif;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getBadge() {
        return badge;
    }

    public void setBadge(String badge) {
        this.badge = badge;
    }

    public int getScore() {
        return score;
    }

    public void setScore(int score) {
        this.score = score;
    }

    public Time getDuree() {
        return duree;
    }

    public void setDuree(Time duree) {
        this.duree = duree;
    }

    public boolean isEtat() {
        return etat;
    }

    public void setEtat(boolean etat) {
        this.etat = etat;
    }

    public int getNbrTentative() {
        return nbrTentative;
    }

    public void setNbrTentative(int nbrTentative) {
        this.nbrTentative = nbrTentative;
    }

    public Categorie getCategorie() {
        return categorie;
    }

    public void setCategorie(Categorie categorie) {
        this.categorie = categorie;
    }

    public Test getTest() {
        return test;
    }

    public void setTest(Test test) {
        this.test = test;
    }

    public Freelancer getFreelancer() {
        return freelancer;
    }

    public void setFreelancer(Freelancer freelancer) {
        this.freelancer = freelancer;
    }

    @Override
    public String toString() {
        return "Certification{" + "nom=" + nom + ", description=" + description + ", badge=" + badge + ", score=" + score + ", duree=" + duree + ", etat=" + etat + ", nbrTentative=" + nbrTentative + ", categorie=" + categorie + ", test=" + test + ", freelancer=" + freelancer + '}';
    }

    

    

    

    

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 89 * hash + (int) (this.idCertif ^ (this.idCertif >>> 32));
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Certification other = (Certification) obj;
        if (this.idCertif != other.idCertif) {
            return false;
        }
        return true;
    }
    
    
    
    
    
}
