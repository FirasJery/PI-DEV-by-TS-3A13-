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
public class wallet {
    
    private long id;
    private long num_carte;
    private float solde;
    private float bonus;
    private long iduser;

    public wallet() {
    }

    
    public wallet(long id, long num_carte, float solde, float bonus,long iduser) {
        this.id = id;
        this.num_carte = num_carte;
        this.solde = solde;
        this.bonus = bonus;
        this.iduser = iduser;
    }

    public wallet(long num_carte, float solde, float bonus,long iduser) {
        this.num_carte = num_carte;
        this.solde = solde;
        this.bonus = bonus;
        this.iduser = iduser;
    }

    public long getId() {
        return id;
    }

    public long getNum_carte() {
        return num_carte;
    }

    public float getSolde() {
        return solde;
    }

    public float getBonus() {
        return bonus;
    }

    public void setId(long id) {
        this.id = id;
    }

    public void setNum_carte(long num_carte) {
        this.num_carte = num_carte;
    }

    public void setSolde(float solde) {
        this.solde = solde;
    }

    @Override
    public String toString() {
        return "wallet{" + "id=" + id + ", num_carte=" + num_carte + ", solde=" + solde + ", bonus=" + bonus + ", iduser=" + iduser + '}';
    }

    public long getIduser() {
        return iduser;
    }

    public void setIduser(long iduser) {
        this.iduser = iduser;
    }

    public void setBonus(float bonus) {
        this.bonus = bonus;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 67 * hash + (int) (this.id ^ (this.id >>> 32));
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
        final wallet other = (wallet) obj;
        if (this.id != other.id) {
            return false;
        }
        return true;
    }
    
    
    
}
