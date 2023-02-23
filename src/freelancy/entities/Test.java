/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.entities;

import java.util.Objects;
import java.util.logging.Logger;

/**
 *
 * @author hichem
 */
public class Test {
    private long idTest;
    private String nom;
    private String description;

    public Test() {
    }

    public Test(long idTest) {
        this.idTest = idTest;
    }
    
    

    public Test(String nom, String description) {
        this.nom = nom;
        this.description = description;
        
    }

    public Test(long idTest, String nom, String description) {
        this.idTest = idTest;
        this.nom = nom;
        this.description = description;
        
    }

    public long getIdTest() {
        return idTest;
    }

    public void setIdTest(long idTest) {
        this.idTest = idTest;
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

    

    

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 43 * hash + (int) (this.idTest ^ (this.idTest >>> 32));
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
        final Test other = (Test) obj;
        if (this.idTest != other.idTest) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "un "  + nom + "\n" + description +  " ";
    }
    
    
    
    
}
