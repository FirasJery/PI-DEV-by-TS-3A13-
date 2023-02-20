/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.entities;

/**
 *
 * @author hichem
 */
public class Freelancer {
    private long idFreelancer;
    private String nom;
    private String photo;

    public Freelancer() {
    }

    public Freelancer(String nom, String photo) {
        this.nom = nom;
        this.photo = photo;
    }

    public Freelancer(long idFreelancer, String nom, String photo) {
        this.idFreelancer = idFreelancer;
        this.nom = nom;
        this.photo = photo;
    }
    
    

    public long getIdFreelancer() {
        return idFreelancer;
    }

    public void setIdFreelancer(long idFreelancer) {
        this.idFreelancer = idFreelancer;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPhoto() {
        return photo;
    }

    public void setPhoto(String photo) {
        this.photo = photo;
    }

    @Override
    public String toString() {
        return "Freelancer{" + "nom=" + nom + ", photo=" + photo + '}';
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 89 * hash + (int) (this.idFreelancer ^ (this.idFreelancer >>> 32));
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
        final Freelancer other = (Freelancer) obj;
        if (this.idFreelancer != other.idFreelancer) {
            return false;
        }
        return true;
    }
    
    
    
    
    
}
