/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.entities;

import java.util.Objects;
/**
 *
 * @author hichem
 */
public class Categorie {
    private long idCategorie;
    private String nom;

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 67 * hash + (int) (this.idCategorie ^ (this.idCategorie >>> 32));
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
        final Categorie other = (Categorie) obj;
        if (this.idCategorie != other.idCategorie) {
            return false;
        }
        return true;
    }
    
    
    public Categorie(){}
    
    public Categorie(String nom){
        this.nom=nom;
    }

    public Categorie(long idCategorie, String nom) {
        this.idCategorie = idCategorie;
        this.nom = nom;
    }
    
    

    public long getIdCategorie() {
        return idCategorie;
    }

    public String getNom() {
        return nom;
    }

    public void setIdCategorie(long idCategorie) {
        this.idCategorie = idCategorie;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    @Override
    public String toString() {
        return "Categorie{" + "nom=" + nom + '}';
    }

    
    
    
}
