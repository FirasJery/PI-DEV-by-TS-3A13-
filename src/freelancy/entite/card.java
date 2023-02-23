/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.entite;


/**
 *
 * @author Ghass
 */
public class card {
    private long id;
    private String nom;
    private String prenom;
    private String date;
    private int cvc;
    private int zipcode;
    private String ville;
    private long num;
     
public card(){
}

    public card(String nom, String prenom, String date, int cvc, int zipcode, String ville, long num) {
        this.nom = nom;
        this.prenom = prenom;
        this.date = date;
        this.cvc = cvc;
        this.zipcode = zipcode;
        this.ville = ville;
        this.num = num;
    }

    public card(long id, String nom, String prenom, String date, int cvc, int zipcode, String ville, long num) {
        this.id = id;
        this.nom = nom;
        this.prenom = prenom;
        this.date = date;
        this.cvc = cvc;
        this.zipcode = zipcode;
        this.ville = ville;
        this.num = num;
    }

    public long getId() {
        return id;
    }

    public String getNom() {
        return nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public String getDate() {
        return date;
    }

    public int getCvc() {
        return cvc;
    }

    public int getZipcode() {
        return zipcode;
    }

    public String getVille() {
        return ville;
    }

    public long getNum() {
        return num;
    }

    public void setId(long id) {
        this.id = id;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public void setCvc(int cvc) {
        this.cvc = cvc;
    }

    public void setSipcode(int zipcode) {
        this.zipcode = zipcode;
    }

    public void setVille(String ville) {
        this.ville = ville;
    }

    public void setNum(long num) {
        this.num = num;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 59 * hash + (int) (this.id ^ (this.id >>> 32));
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
        final card other = (card) obj;
        if (this.id != other.id) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "card{ nom=" + nom + ", prenom=" + prenom + ", date=" + date + ", cvc=" + cvc + ", zipcode=" + zipcode + ", ville=" + ville + ", num=" + num + '}';
    }

    
}

