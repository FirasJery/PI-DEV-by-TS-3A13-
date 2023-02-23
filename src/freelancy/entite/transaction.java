/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.entite;

import java.util.Date;

/**
 *
 * @author Ghass
 */
public class transaction {
    private long id;
    private Date date;
    private float montant;
    private long s_wallet;
    private long r_wallet;
    private boolean etat;

    public transaction() {
    }

    public transaction(long id, Date date, float montant, long s_wallet, long r_wallet, boolean etat) {
        this.id = id;
        this.date = date;
        this.montant = montant;
        this.s_wallet = s_wallet;
        this.r_wallet = r_wallet;
        this.etat = etat;
    }

    public transaction(Date date, float montant, long s_wallet, long r_wallet, boolean etat) {
        this.date = date;
        this.montant = montant;
        this.s_wallet = s_wallet;
        this.r_wallet = r_wallet;
        this.etat = etat;
    }

    public long getId() {
        return id;
    }

    public Date getDate() {
        return date;
    }

    public float getMontant() {
        return montant;
    }

    public long getS_wallet() {
        return s_wallet;
    }

    public long getR_wallet() {
        return r_wallet;
    }

    public boolean isEtat() {
        return etat;
    }

    public void setId(long id) {
        this.id = id;
    }

    public void setDate(Date date) {
        this.date = date;
    }

    public void setMontant(float montant) {
        this.montant = montant;
    }

    public void setS_wallet(long s_wallet) {
        this.s_wallet = s_wallet;
    }

    public void setR_wallet(long r_wallet) {
        this.r_wallet = r_wallet;
    }

    public void setEtat(boolean etat) {
        this.etat = etat;
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
        final transaction other = (transaction) obj;
        if (this.id != other.id) {
            return false;
        }
        return true;
    }
    
    
}
